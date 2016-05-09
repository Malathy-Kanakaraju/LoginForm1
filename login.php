<?php

require "header.php";

$name = $email = $password = "";

if (isset($_POST["submitButton"])) {

    function valida($a) {
        $a = trim($a);
        $a = stripslashes($a);
        $a = htmlspecialchars($a);
        return $a;
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = valida($_POST["user"]);
        $email = valida($_POST["email"]);
        $password = valida($_POST["password"]);
    }


    $pass = hash("sha512",$password);
    
    $query = "SELECT * FROM users WHERE name = '" .$name. "' and password = '" .$pass. "'";
    $result = mysqli_query($dbconn, $query);
    
    if (mysqli_num_rows($result) > 0 ) {
        $userData = mysqli_fetch_assoc($result);
        $expires = time() + (60 * 30); // Logged in session expires in 30 minutes
        $sessid = mysqli_real_escape_string($dbconn,session_id());
        $insql = "INSERT INTO active_users (user_id,session_id,expires) VALUES (" . $userData['id']. ",'" .$sessid. "'," .$expires. ")";
        
        if (mysqli_query($dbconn, $insql)) {
            header("Location: home.php");
        } else {
            echo "Insert table error<br />" . $insql. "<br />" . mysqli_error($dbconn);
        }
                
    } else {
        die ("<h2>Invalid login credentials</h2>");
    }

}
mysqli_close($dbconn);
?>