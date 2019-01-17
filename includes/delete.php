<?php 
session_start();
require_once "config.php";

$id = (int)$_GET['id'];

mysqli_query($link,"DELETE FROM userFood WHERE foodID='".$id."'");
mysqli_close($link);
header("Location: ../welcome.php");
