
<?php

session_start();

unset($_SESSION['user']);
unset($_SESSION['role']);


session_destroy();

header("Location:index.php");


?>