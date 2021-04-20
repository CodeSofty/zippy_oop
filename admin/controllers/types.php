<?php 



switch($action) {

    case "list_types":
        $types = TypesDB::get_types();
        include('view/type_list.php');
        break;

    case "add_type": 
        try {
            TypesDB::add_type($type_name);

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
                TypesDB::delete_type($type_id);
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
        $vehicles = VehiclesDB::get_vehicles_by_type($type_id);
        $makes = MakeDB::get_makes();
        $types = TypesDB::get_types();
        $classes = ClassesDB::get_classes();
        include('view/vehicle_list.php');
    break;
    

}


?>
