<?php 



switch($action) {

    case "list_classes":
        $classes = ClassesDB::get_classes();
        include('view/class_list.php');
        break;



    case "get_class":
        $vehicles = VehiclesDB::get_vehicles_by_class($class_id);
        $makes = MakeDB::get_makes();
        $types = TypesDB::get_types();
        $classes = ClassesDB::get_classes();
        include('view/vehicle_list.php');
        break;




case "add_class": 
    try {
        ClassesDB::add_class($class_name);

    }catch(PDOexception $e) {
        $e.showMessage();
        $message = "Please enter a class name";
        include('view/error.php');
    }

    header('Location: .?action=list_classes');
    break;

case "delete_class":
    if($class_id) {
        try{
            ClassesDB::delete_class($class_id);
        }catch(PDOexception $e) {
            $e.showMessage();
            $message = "class_id is not valid, cannot delete without a valid class_id";
            include('view/error.php');
            exit();
        }
        header('Location: .?action=list_classes');

    }
    break;
}

?>
