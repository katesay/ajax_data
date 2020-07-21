<?php
    require_once('dbcon.php'); 
    require_once('util.php'); 


$isInsert = TRUE;

if(isset($_POST['first_name']) && isset($_POST['last_name']))
{
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

}
else
{
    $isInsert = FALSE;
}


if ($isInsert == TRUE) {

    try { 
        $sql = "
            insert into users(
                first_name, 
                last_name) 
                values(
                '{$first_name}',
                '{$last_name}'
            )";

        $stmt = $con->prepare($sql);

        $stmt->execute();

        $con = null;
        echo '추가 성공';
    } catch(PDOException $e) {
        die("Database error. " . $e->getMessage()); 
    }
}

?>