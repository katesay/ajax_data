<?php
    require_once('dbcon.php'); 
    require_once('util.php'); 


    $isUpdate = TRUE;

    if(isset($_POST['id']) && isset($_POST['first_name']) && isset($_POST['last_name']))
    {
        $id = $_POST['id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];

    }
    else
    {
        $isUpdate = FALSE;
    }


    if ($isUpdate == TRUE) {

        try { 

            $sql = "
                UPDATE users SET (
                    first_name = '{$first_name}', 
                    last_name = '{$last_name}' 
                WHERE 
                    id = '{$id}'";

            $stmt = $con->prepare($sql);

            $stmt->execute();

            $con = null;
            
            echo '수정 성공';
        } catch(PDOException $e) {
            die("Database error. " . $e->getMessage()); 
        }
    }

?>