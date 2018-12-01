<?php
    function makeQuery($myConnection, $myQuery) {
        $result = $myConnection->query($myQuery);
        if($result === TRUE) {
            logVariable("Successful query");
        }
        else if($result->error) {
            logVariableWithContext("Error in query: ", $myConnection->error);
        }
        else {
            logVariable("query didn't return TRUE or an error");
            logVariable($result);
        }
    }
    $roomNumber = $_POST['roomNumber'];
    $roomNickName = $_POST['roomNickname'];
    $memberOnePawprint = $_POST['memberOnePawprint'];
    $memberTwoPawprint = $_POST['memberTwoPawprint'];

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbName = "beta_sig_iota";

    // Create connection
    $conn = new mysqli($servername, $username, $password);
    // Check connection
    if ($conn->connect_error) {
        logVariableWithContext("Error connecting to database: ", $conn->connect_error);
        die("Connection failed: " . $conn->connect_error);
    } 
    
    $queryToAdd = "INSERT INTO Room (roomNumber, nickName) VALUES ($roomNumber, '$roomNickName');";
    makeQuery($conn, $queryToAdd);
    header("Location: rooms.php");
?>