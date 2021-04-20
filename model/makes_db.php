<?php 

class MakeDB {



    // Get selection list for Makes


    public static function get_makes() {
        $db = Database::getDB();
        $query = 'SELECT * FROM makes';
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchALL();
    $statement->closeCursor();
    return $results;

    }


    public static function add_make($make_name) {
        $db = Database::getDB();
            $query = 'INSERT INTO makes (Make) VALUES (:make_name)';
            $statement = $db->prepare($query);
            $statement->bindValue(':make_name', $make_name);
            $statement->execute();
            $statement->closeCursor();
    }


    public static function delete_make($make_id) {
        $db = Database::getDB();
        $query = 'DELETE FROM makes WHERE ID = :make_id';
                $statement = $db->prepare($query);
                $statement->bindValue(':make_id', $make_id);
                $statement->execute();
                $statement->closeCursor();
    }

    
}

?>