<?php 



switch($action) {

    case "list_makes":
        $makes = MakeDB::get_makes();
        include('view/make_list.php');
        break;


    case "get_make":
        // Write function to grab the data based on the ID
        $vehicles = VehiclesDB::get_vehicles_by_make($make_id);
        $makes = MakeDB::get_makes();
        $types = TypesDB::get_types();
        $classes = ClassesDB::get_classes();
        include('view/vehicle_list.php');
        break;




    case "add_make": 
        try {
            MakeDB::add_make($make_name);

        }catch(PDOexception $e) {
            $e.showMessage();
            $message = "Please enter a make name";
            include('view/error.php');
        }

        header('Location: .?action=list_makes');
        break;
    
    case "delete_make":
        if($make_id) {
            try{
                MakeDB::delete_make($make_id);
            }catch(PDOexception $e) {
                $e.showMessage();
                $message = "make_id is not valid, cannot delete without a valid make_id";
                include('view/error.php');
                exit();
            }
            header('Location: .?action=list_makes');

        }
        break;

}


?>