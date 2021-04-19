<?php


// Get Selection for Types

function get_types() {
    global $db;
$query = 'SELECT * FROM types';
$statement = $db->prepare($query);
$statement->execute();
$results = $statement->fetchALL();
$statement->closeCursor();
return $results;

}



function get_types_by_id($type_id){

    if(!$type_id) {
        return "All Types";
    }
    global $db;
    $query = 'SELECT type.id, type FROM types 
    WHERE type_id = :type_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}





function add_type($type_name) {
    global $db;
    $query = 'INSERT INTO types (Type) VALUES (:type_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_name', $type_name);
    $statement->execute();
    $statement->closeCursor();
}

function delete_type($type_id) {
    global $db;
    $query = 'DELETE FROM types WHERE ID = :type_id';
            $statement = $db->prepare($query);
            $statement->bindValue(':type_id', $type_id);
            $statement->execute();
            $statement->closeCursor();
}



?>
