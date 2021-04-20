<?php 
include('view/header.php');
?>

<h2>Register a new admin user</h2>
<!-- <div class="container"> -->
<?php if(!empty($errors)) { ?>
    <ul>
    <?php for($i=0; $i<count($errors); $i++) {
        echo "<li style='color:red; font-weight:bold; margin: 10px;'> {$errors} </li>";
    }?>
    </ul>

<?php } ?>

    <form action = "." method="post">
    <input type="hidden" name="action" value="register">
        <div class="form-group">

            <label for= "username">Username:</label>
            <input type="text" name="username" id="username" autofocus required> 
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="text" name="password" id="password" autofocus required> 
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirm Password:</label>
            <input type="text" name="confirm_password" id = "confirm_password" autofocus required> 
        </div>
        <input type="submit" value="register">
    </form>

</div> 


<?php

include('view/footer.php');

?>