<?php
require "header.php";

if (!isLoggedIn()) {
    header("Location: index.php");
}

$user_id = isLoggedIn();
$user = getUserData($user_id);
echo "Welcome " .$user['name'] . "(".$user['email']. ") to home page!";

?>
