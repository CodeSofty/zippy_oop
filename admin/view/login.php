<?php 

// Display $login_message if it exists (page 707)

if(!empty($login_message)) { ?>
    <h2><?= $login_message ?></h2>
<?php } else{ ?>
    <h2>Please fill in your credentials to login.</h2>
<?php } ?>

<form action = "." method="post">
<input type="hidden" name="action" value="login">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" autofocus required>

    <label for="password">Password:</label>
    <input type="text" name="password" id="password" autofocus required>

    <input type="submit" value="Sign In">
</form>