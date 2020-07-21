<?php
    require_once('dbcon.php'); 
    require_once('util.php'); 


    $isUpdate = TRUE;


    if(isset($_POST['id']) && isset($_POST['text']) && isset($_POST['column_name']))
    {
        $id = $_POST['id'];
        $text = $_POST['text'];
        $column_name = $_POST['column_name'];

    }
    else
    {
        $isUpdate = FALSE;
    }


    if ($isUpdate == TRUE) {

        try { 
            
            $sql = "
                UPDATE users SET 
                    $column_name = '{$text}' 
                WHERE 
                    id = '{$id}'";

            $stmt = $con->prepare($sql);

            $stmt->execute();

            $con = null;
            
            //echo '수정 성공';
        } catch(PDOException $e) {
            die("Database error. " . $e->getMessage()); 
        }
    }

?>