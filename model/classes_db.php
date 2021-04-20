<?php 
// Get Selection for Classes

class ClassesDB {


    public static function get_classes() {
        $db = Database::getDB();

        $query = 'SELECT * FROM classes';

    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchALL();
    $statement->closeCursor();
    return $results;

    }


    public static function add_class($class_name) {
        $db = Database::getDB();
        $query = 'INSERT INTO classes (Class) VALUES (:class_name)';
        $statement = $db->prepare($query);
        $statement->bindValue(':class_name', $class_name);
        $statement->execute();
        $statement->closeCursor();
    }


    public static function delete_class($class_id) {
        $db = Database::getDB();
        $query = 'DELETE FROM classes WHERE ID = :class_id';
                $statement = $db->prepare($query);
                $statement->bindValue(':class_id', $class_id);
                $statement->execute();
                $statement->closeCursor();
    }


    
}

?>