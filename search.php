<?php
require "initDB.php";
$searchQuery = htmlspecialchars($_GET["searchQuery"]);
$query = "SELECT * FROM `beta_sig_iota`.`Member` WHERE pawprint = '" . $searchQuery."';";

echo $query;
$result = makeQuery($conn,$query);
echo $result;
?>
