<?php

    $host = 'localhost';
    $username = 'php7';
    $password = 'php777';
    $dbname = 'userdb';

   
	
    try {
        //$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

        $con = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8",$username, $password);
    } catch(PDOException $e) {

        die("Failed to connect to the database: " . $e->getMessage()); 
    }


    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    
 
    header('Content-Type: text/html; charset=utf-8'); 
    session_start();
?>