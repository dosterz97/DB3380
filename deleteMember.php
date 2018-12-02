<?php 
    session_start();

    require 'initDB.php';

    $pawprint = $_SESSION['pawprint'];

    $deleteQuery  = "DELETE FROM Member WHERE pawprint = '$pawprint';";
    $deleteParentQuery = "DELETE FROM MemberParent WHERE pawprint = '$pawprint';";
    makeQuery($conn, $deleteQuery);
    makeQuery($conn, $deleteParentQuery);
    header("Location: index.php");


?>