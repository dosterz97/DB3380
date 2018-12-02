<?php
    require 'initDB.php';

    $roomNumber = $_POST["roomNumber"];
    $roomNickname = $_POST["roomNickname"];

    $queryToAdd = "INSERT INTO Room (roomNumber, nickName) VALUES (\"". $roomNumber . "\", \"" . $roomNickname . "\");";
    makeQuery($conn, $queryToAdd);
    header("Location: rooms.php");
?>