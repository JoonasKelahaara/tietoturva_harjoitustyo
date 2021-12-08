<?php
require('headers.php');
require('functions.php');

$json = json_decode(file_get_contents('php://input'));

$fname = filter_var($json->fname, FILTER_SANITIZE_STRING);
$lname = filter_var($json->lname, FILTER_SANITIZE_STRING);
$user = filter_var($json->uname, FILTER_SANITIZE_STRING);
$passwd = filter_var($json->passwd, FILTER_SANITIZE_STRING);

try {
    $db = new PDO('mysql:host=localhost;dbname=tietoturvadb', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    createTable($db);

    $user = filter_var($user, FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM user WHERE uname = ?";

    $prepared = $db->prepare($sql);
    $prepared->bindParam(1 , $user);

    $prepared->execute();

    foreach($prepared as $row){
        echo $row['fname'];
    }

} catch(PDOException $e) {
    echo '<br>'.$e->getMessage();
}