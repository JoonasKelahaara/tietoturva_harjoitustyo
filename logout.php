<?php
session_start();
require('headers.php');
require('functions.php');

if(isset($_SESSION["user"])){
    session_unset();
    session_destroy();
    echo "Kirjauduit ulos!";
    exit;
} else {
    header('HTTP/1.0 401 Unauthorized');
    echo "Kirjaudu ensin sisään";
    exit;
}