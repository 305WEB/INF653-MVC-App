<?php
//data source network
$dsn = "mysql:host=localhost; dbname=todolist";
$username = 'root';
// $password = "1qaz";

try {
    $db = new PDO($dsn, $username);

} catch (PDOException $e) {

    $error_message = 'Database Error:<br/>';

    $error_message .= $e->getMessage();
 

    include('view/error.php');
    exit();

}


?>