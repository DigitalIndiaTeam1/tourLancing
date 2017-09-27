<?php
session_start();

$_SESSION["name"]="";
session_unset();
session_destroy();
header('Location: tourlancer.php');

?>