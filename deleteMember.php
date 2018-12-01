<?php 
    session_start();
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
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "beta_sig_iota";

    $conn = new mysqli($servername, $username, $password);

    if($conn->connect_error) {
        logVariableWithContext("Error connecting to database: ", $conn->connect_error);
        die("Connection failed: " . $conn->connect_error);
    }

    $pawprint = $_SESSION['pawprint'];
    $deleteQuery  = "DELETE FROM Member WHERE pawprint = '$pawprint';";
    makeQuery($conn, $deleteQuery);
    header("Location: roster.php");


?>