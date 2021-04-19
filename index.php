<?php

// Start session management with persistent cookie

$lifetime = 60 * 60 * 24 * 14; // 2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();


//require models

require('model/database.php');
require('model/classes_db.php');
require('model/makes_db.php');
require('model/types_db.php');
require('model/vehicles_db.php');



// Data From Forms

$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
if(!$make_id) {
    $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT); 
}


$type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
if(!$type_id) {
    $type_id =  filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT); 
}



$class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
if(!$class_id) {
    $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT); 
}


// Setting Session Variable for Registeration

$firstname = filter_input(INPUT_GET, 'firstname', FILTER_SANITIZE_STRING);
if(isset($firstname)) {

    $_SESSION["userid"] = $firstname;
}


// Get action from forms if available

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

if(!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}


switch($action) {

// Actions

    case "list_vehicles":
        $vehicles = get_vehicles();
        $makes = get_makes();
        $types = get_types();
        $classes = get_classes();
        include('view/vehicle_list.php');
        break;

    case "get_make":
        $vehicles = get_vehicles_by_make($make_id);
        $makes = get_makes();
        $types = get_types();
        $classes = get_classes();
        include('view/vehicle_list.php');
        break;


        case "get_class":
        $vehicles = get_vehicles_by_class($class_id);
        $makes = get_makes();
        $types = get_types();
        $classes = get_classes();
        include('view/vehicle_list.php');
        break;


        case "get_type": 
        $vehicles = get_vehicles_by_type($type_id);
        $makes = get_makes();
        $types = get_types();
        $classes = get_classes();
        include('view/vehicle_list.php');
        break;

// Registration and Logout

        case "register":
            include('view/register.php');
        break;

        case "logout":
            include('view/logout.php');
        break;


// List All Vehicles if no Action is Sent
    default:
            $vehicles = get_vehicles();
            $makes = get_makes();
            $types = get_types();
            $classes = get_classes();
            include('view/vehicle_list.php');
}

?>