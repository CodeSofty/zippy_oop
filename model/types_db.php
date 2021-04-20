<?php

class TypesDB {


    // Get Selection for Types

    public static function get_types() {
        $db = Database::getDB();
    $query = 'SELECT * FROM types';
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchALL();
    $statement->closeCursor();
    return $results;

    }



    public static function get_types_by_id($type_id){

        if(!$type_id) {
            return "All Types";
        }
        $db = Database::getDB();
        $query = 'SELECT type.id, type FROM types 
        WHERE type_id = :type_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':type_id', $type_id);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    }





    public static function add_type($type_name) {
        $db = Database::getDB();
        $query = 'INSERT INTO types (Type) VALUES (:type_name)';
        $statement = $db->prepare($query);
        $statement->bindValue(':type_name', $type_name);
        $statement->execute();
        $statement->closeCursor();
    }

   public static function delete_type($type_id) {
        $db = Database::getDB();
        $query = 'DELETE FROM types WHERE ID = :type_id';
                $statement = $db->prepare($query);
                $statement->bindValue(':type_id', $type_id);
                $statement->execute();
                $statement->closeCursor();
    }


}
?>
