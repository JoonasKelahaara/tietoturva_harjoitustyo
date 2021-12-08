<?php
session_start();
require('headers.php');
require('functions.php');

if(isset($_SERVER['PHP_AUTH_USER'])){
    if(checkUser(createDbConnection(), $_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW'])) {
        echo "Kirjauduit sisään!";
        exit;
    }
}

header('WWW-Authenticate: Basic');

echo "Peruuntui";

exit;