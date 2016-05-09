<?php
session_start();
require ("config.php");

function isLoggedIn() {
    global $dbconn;
    $sessid = mysqli_real_escape_string($dbconn,session_id());
    
    $sql = "SELECT user_id FROM active_users WHERE session_id = '" .$sessid ."' AND expires > " .time() . " LIMIT 1";
    $result = mysqli_query($dbconn,$sql);

    if (mysqli_num_rows($result) > 0) {
        $userData = mysqli_fetch_assoc($result);
        return $userData["user_id"];
    } else {
        return false;
    }
    
}

function getUserData($user_id) {
    
    global $dbconn;
    $sql = "SELECT * FROM users WHERE id = " .$user_id . " LIMIT 1";
    $result = mysqli_query($dbconn, $sql);
    
    if (mysqli_num_rows($result) > 0 ) {
        $userData = mysqli_fetch_assoc($result);
        return $userData;
    }
}
?>