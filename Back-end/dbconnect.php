<?php 

$db = new mysqli('localhost', 'root', '', 'hms');

if($db->connect_errno){
    die("Error:".$db->connect_error);
}



?>
