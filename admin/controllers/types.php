<?php 



switch($action) {

    case "list_types":
        $types = get_types();
        include('view/type_list.php');
        break;

    case "add_type": 
        try {
        add_type($type_name);

        }catch(PDOexception $e) {
            $e.showMessage();
            $message = "Please enter a type name";
            include('view/error.php');
        }

        header('Location: .?action=list_types');
        break;

    case "delete_type":
        if($type_id) {
            try{
                delete_type($type_id);
            }catch(PDOexception $e) {
                $e.showMessage();
                $message = "type_id is not valid, cannot delete without a valid type_id";
                include('view/error.php');
                exit();
            }
            header('Location: .?action=list_types');

        }
        break;

    case "get_type": 
        $vehicles = get_vehicles_by_type($type_id);
        $makes = get_makes();
        $types = get_types();
        $classes = get_classes();
        include('view/vehicle_list.php');
    break;
    

}


?>
