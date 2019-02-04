<?php 
session_start();
require_once "config.php";

$id = (int)$_GET['id'];
$userID = $_SESSION["id"];

$favTest = "SELECT * FROM userFavourites WHERE userID = $userID AND recipeID = $id";
$favTestResult = $link->query($favTest);

if ($favTestResult->num_rows > 0) {
	mysqli_query($link,"DELETE FROM userFavourites WHERE userID = $userID AND recipeID = $id");
	mysqli_close($link);
} else {
	mysqli_query($link,"INSERT INTO userFavourites (userID,recipeID) VALUES ($userID, $id)");
	mysqli_close($link);
	
}
header("Location: ../recipes.php");

