<?php 
// Get Selection for Classes

function get_classes() {
    global $db;

    $query = 'SELECT * FROM classes';

$statement = $db->prepare($query);
$statement->execute();
$results = $statement->fetchALL();
$statement->closeCursor();
return $results;

}


function add_class($class_name) {
    global $db;
    $query = 'INSERT INTO classes (Class) VALUES (:class_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_name', $class_name);
    $statement->execute();
    $statement->closeCursor();
}


function delete_class($class_id) {
    global $db;
    $query = 'DELETE FROM classes WHERE ID = :class_id';
            $statement = $db->prepare($query);
            $statement->bindValue(':class_id', $class_id);
            $statement->execute();
            $statement->closeCursor();
}




?>