<?php
session_start();
if(isset($_POST['logout'])){
$_SESSION["name"]="";
session_destroy();
}
?>