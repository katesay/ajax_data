<?php

    require_once('dbcon.php'); 
    require_once('util.php'); 


    $isDelete = TRUE;

    if(isset($_POST['id']))
    {
        $id = $_POST['id'];


    }
    else
    {
        $isDelete = FALSE;
    }


    if ($isDelete == TRUE) {

        try { 

            $sql = "DELETE FROM users where id = '{$id}'";


            $stmt = $con->prepare($sql);

            $stmt->execute();

            $con = null;
            
            echo '지우기 성공';
        } catch(PDOException $e) {
            die("Database error. " . $e->getMessage()); 
        }
    }