<?php

function createDbConnection(){
    try{
        $db = new PDO('mysql:host=localhost;dbname=n0kejo00', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo '<br>'.$e->getMessage();
    }

    return $db;
}

function createTable($con){
    $sql = "CREATE TABLE IF NOT EXISTS user(
        uid INT PRIMARY KEY AUTO_INCREMENT,
        fname VARCHAR(64) NOT NULL,
        lname VARCHAR(64) NOT NULL,
        uname VARCHAR(32) NOT NULL,
        passw VARCHAR(64) NOT NULL
    )";

    $con->exec($sql);
}

function createUser($con, $fname, $lname, $uname, $passwd){
    try{
        $hash_pw = password_hash($passwd, PASSWORD_DEFAULT);
        $sql = "INSERT IGNORE INTO user(fname, lname, uname, passw) VALUES(?,?,?,?)";

        $prepared = $con->prepare($sql);
        $prepared->execute(array($fname, $lname, $uname, $hash_pw));
    }catch(PDOException $e){
        echo '<br>'.$e->getMessage();
    }
}

function checkUser(PDO $con, $uname, $passwd){
    try {
        $sql = "SELECT passw FROM user WHERE uname = ?";
        $prepared = $con->prepare($sql);
        $prepared->execute(array($uname));

        $rows = $prepared->fetchAll();

        foreach($rows as $row){
            $pw = $row["passw"];
            if(password_verify($passwd, $pw)){
                return true;
            }
        }
    
        return false;

    } catch(PDOException $e) {
        echo '<br>'.$e->getMessage();
    }
}