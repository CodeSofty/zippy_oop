<?php include('header.php'); ?>

<?php 
if(isset($firstname)) { ?>
    <h3>Thank you for registering,  <?php echo $_SESSION['userid'] ?> ! </h3>
    <a href=".?action=list_vehicles">View Our Vehicles</a>

<?php } else { ?>

<form action = "." method="get"  name="action" value="register">
<label>First Name:</label>
<input type="hidden" name="action" value="register">
<input type="text" name="firstname" maxlength 20 autofocus required> 
    <button type="submit">Register</button>
</form>

<?php } ?>


<?php include('footer.php'); ?>