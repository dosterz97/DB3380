<?php
    header("Location: rooms.php");

    require 'initDB.php';

    $roomNumber = $_POST["roomNumber"];
    $roomNickname = $_POST["roomNickname"];
    logVariable($roomNumber);
    logVariable($roomNickname);
    $queryToAdd = "INSERT INTO Room (roomNumber, nickName) VALUES ('$roomNumber', '$roomNickname');";
    makeQuery($conn, $queryToAdd);
?>