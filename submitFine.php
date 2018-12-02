<?php
    header("Location: FinesPage.php");
    require 'initDB.php';
    $finingMember = $_POST['finingMember'];
    $guiltyMember = $_POST['guiltyMember'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];

    $queryCreateFine = "INSERT INTO Fine (guiltyMemberId, filingMemberId, fineStatus, fineDate, fineAmount, fineDescription) VALUES ('$guiltyMember', '$finingMember', 'pending', NOW(), $amount, '$description')";
    makeQuery($conn, $queryCreateFine);
?>