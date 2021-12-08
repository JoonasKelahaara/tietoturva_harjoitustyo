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