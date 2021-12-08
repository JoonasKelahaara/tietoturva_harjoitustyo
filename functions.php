<?php

function createDbConnection(){
    try{
        $db = new PDO('mysql:host=localhost;dbname=tietoturvadb', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo '<br>'.$e->getMessage();
    }

    return $db;
}

function createTable($con){
    $sql = "CREATE TABLE IF NOT EXISTS user(
        fname VARCHAR(64) PRIMARY KEY,
        lname VARCHAR(64) NOT NULL,
        uname VARCHAR(32) NOT NULL,
        passw VARCHAR(64) NOT NULL
    )";

    $sql_add = "INSERT IGNORE INTO user VALUES('Joonas', 'Kelahaara', 'jonez', 'testi1234')";

    $con->exec($sql);
    $con->exec($sql_add);
}