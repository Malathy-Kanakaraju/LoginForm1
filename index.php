<!DOCTYPE>
    <head></HEAD>
    <body>
<?php
    require("header.php");

?>
        <form method="post" action="login.php" id="loginForm"><br />
            Name:* <input type="text" name="user" id="user" required="required" autofocus="autofocus"><br /><br />
            Email:* <input type="text" name="email" id="email" placeholder="someone@abc.com" required="required"><br /><br />
            Password:* <input type="text" name="password" id="password" placeholder="Atleast 6 characters" required="required" minlength="6"><br /><br />
            <input type="submit" name="submitButton" value="Login"><br />
            <?php 
                if (isset($_SESSION['errmsg'])) {
                    echo $_SESSION['errmsg'];
                }
                $_SESSION['errmsg'] = "";
            ?>
        </form>
</body>

