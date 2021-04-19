<?php include('header.php')?>

<h3>Thank you for logging out, <?php echo $_SESSION['userid'] ?></h3>
<a href=".?action=list_vehicles">View Our Vehicles</a>

<?php 

$name = session_name();
$expire = strtotime('-1 year');


//unset the session variable
unset($_SESSION['userid']);


//destroy the session

$session_destroy();

// delete the session cookie

setcookie($name, '', $expire, '/');



?>

<?php include('footer.php')?>