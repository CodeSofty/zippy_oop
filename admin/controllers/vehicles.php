<?php 


switch($action) {
    case "get_make":
        // Write function to grab the data based on the ID
        $vehicles = get_vehicles_by_make($make_id);
        $makes = get_makes();
        $types = get_types();
        $classes = get_classes();
        include('view/vehicle_list.php');
        break;


        case "list_vehicles":
            $vehicles = get_vehicles();
            $makes = get_makes();
            $types = get_types();
            $classes = get_classes();
            include('view/vehicle_list.php');
            break;

        case "add_vehicle": 
            $makes = get_makes();
            $types = get_types();
            $classes = get_classes();
            include('view/add_vehicle.php');
            if($year && $price && $model) {
                try{
                    add_vehicle($year, $price, $type_id, $class_id, $make_id, $model);
                }catch(PDOexception $e) {
                    $e.showMessage();
                    $message = "Please check all fields";
                    include('view/error.php');
                    exit();
                }
                header('Location: .?action=list_vehicles');
            }
            break;


    

    
        case "delete_vehicle":
            if($vehicle_id) {
                try{
                    delete_vehicle($vehicle_id);
                }catch(PDOexception $e) {
                    $e.showMessage();
                    $message = "vehicle_id is not valid, cannot delete without a valid vehicle_id";
                    include('view/error.php');
                    exit();
                }
                header('Location: .?action=list_vehicles');
    
            }
            break;
}




?>