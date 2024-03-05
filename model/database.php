<?php
//data source network
$dsn = "mysql:host=e764qqay0xlsc4cz.cbetxkdyhwsb.us-east-1.rds.amazonaws.com; dbname=u3pvxh30ckoo5wx6";
$username = 'sjuho1vdhx8piddg';
$password = 't7rht7z2mxlqjwyq';

try {
    $db = new PDO($dsn, $username);

} catch (PDOException $e) {

    $error_message = 'Database Error:<br/>';

    $error_message .= $e->getMessage();
 

    include('view/error.php');
    exit();

}


?>
