<?php
session_start();
require('headers.php');
require('functions.php');

if(isset($_SERVER['PHP_AUTH_USER'])){
    if(checkUser(createDbConnection(), $_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW'])) {
        $_SESSION["user"] = $_SERVER['PHP_AUTH_USER'];
        echo "Kirjauduit sisään" .' ' .$_SESSION["user"]. '!';
        exit;
    }
}

header('WWW-Authenticate: Basic');

echo "Peruuntui";

exit;