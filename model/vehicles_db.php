<?php

class VehiclesDB {




    // If option sort by price  vehicles.price DESC else if option sort by year vehicles.year DESC
    public static function get_vehicles(){
        $db = Database::getDB();

        $query = 'SELECT vehicles.vehicle_ID, vehicles.year, vehicles.model, vehicles.price, types.type, classes.class, makes.make FROM vehicles 
        INNER JOIN types
        ON vehicles.type_id = types.id
        INNER JOIN classes
        ON vehicles.class_id = classes.id
        INNER JOIN makes
        ON vehicles.make_id = makes.id
        ORDER BY vehicles.price DESC';

        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchALL();
        $statement->closeCursor();
        return $results;
    }




    // Vehicles By Class


    public static function get_vehicles_by_class($class_id) {
        if(!$class_id) {
            return "All Classes";
        }
        $db = Database::getDB();
        $query = 'SELECT vehicles.year, vehicles.model, vehicles.price, types.type, classes.class, makes.make, makes.ID FROM vehicles 
        INNER JOIN types
        ON vehicles.type_id = types.id
        INNER JOIN classes
        ON vehicles.class_id = classes.id
        INNER JOIN makes
        ON vehicles.make_id = makes.ID
        WHERE class_id = :class_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':class_id', $class_id);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;


    }

    // List vehicles matching the selected Make

    public static function get_vehicles_by_make($make_id){

        if(!$make_id) {
            return "All Makes";
        }
        $db = Database::getDB();
        $query = 'SELECT vehicles.year, vehicles.model, vehicles.price, types.type, classes.class, makes.make, makes.ID FROM vehicles 
        INNER JOIN types
        ON vehicles.type_id = types.id
        INNER JOIN classes
        ON vehicles.class_id = classes.id
        INNER JOIN makes
        ON vehicles.make_id = makes.ID
        WHERE make_id = :make_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':make_id', $make_id);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    }



    //Vehicles by Type

    public static function get_vehicles_by_type($type_id){

        if(!$type_id) {
            return "All Types";
        }
        $db = Database::getDB();
        $query = 'SELECT vehicles.year, vehicles.model, vehicles.price, types.type, classes.class, makes.make, makes.ID FROM vehicles 
        INNER JOIN types
        ON vehicles.type_id = types.id
        INNER JOIN classes
        ON vehicles.class_id = classes.id
        INNER JOIN makes
        ON vehicles.make_id = makes.ID
        WHERE type_id = :type_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':type_id', $type_id);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    }


    public static function add_vehicle($year, $price, $type_id, $class_id, $make_id, $model)
    {
        $db = Database::getDB();
        $query = 'INSERT INTO vehicles
                    (year, model, price, type_id, class_id, make_id)
                    VALUES (:year, :model, :price, :type_id, :class_id, :make_id)';
        $statement = $db->prepare($query);
        $statement->bindValue(':year', $year);
        $statement->bindValue(':model', $model);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':type_id', $type_id);
        $statement->bindValue(':class_id', $class_id);
        $statement->bindValue(':make_id', $make_id);
        $statement->execute();
        $statement->closeCursor();
    }



    public static function delete_vehicle($vehicle_id) {
        $db = Database::getDB();;
        $query = 'DELETE FROM vehicles
        WHERE vehicle_id = :vehicle_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':vehicle_id', $vehicle_id);
        $statement->execute();
        $statement->closeCursor();
    }


}

?>