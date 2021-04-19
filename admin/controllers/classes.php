<?php 



switch($action) {

    case "list_classes":
        $classes = get_classes();
        include('view/class_list.php');
        break;



    case "get_class":
        $vehicles = get_vehicles_by_class($class_id);
        $makes = get_makes();
        $types = get_types();
        $classes = get_classes();
        include('view/vehicle_list.php');
        break;




case "add_class": 
    try {
    add_class($class_name);

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
            delete_class($class_id);
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
