<?php
session_start();

if(isset($_SESSION) && $_SESSION['auth'] != 'loggedin') {
    echo "logged in";
} else {
    header('login.php')
}
echo "This is demo login";
?>