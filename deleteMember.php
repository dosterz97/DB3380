<?php 
    session_start();

    require 'initDB.php';

    $pawprint = $_SESSION['pawprint'];
    $deleteQuery  = "DELETE FROM Member WHERE pawprint = '$pawprint';";
    makeQuery($conn, $deleteQuery);
    header("Location: index.php");


?>