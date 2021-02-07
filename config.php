<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<?php

session_start();
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_database = 'test'; 
$conn = @mysqli_connect($db_host,$db_user,$db_pass);
    if(!$conn){
        die("Connection Error: ".mysqli_error()); 
    }       
    $db_select = mysqli_select_db($conn,$db_database);
    if(!$db_select){
        die("Database Error: ".mysqli_error());   
    }

?>
