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

    //this is where we take the form data and add it to the database
    $pawprint = $_POST['pawprint'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $semesterJoined = $_POST['semesterJoined'];
    $position = $_POST['position'];
    $status = $_POST['status']; // TODO: check this
    $grade = $_POST['grade'];
    $seniorityPoints = $_POST['seniorityPoints'];
    $roomNumber = $_POST['roomNumber'];
    $parentOneFirstName = $_POST['parent1fname'];
    $parentOneLastName = $_POST['parent1lname'];
    $parentOneEmail = $_POST['parent1email'];
    $parentTwoFirstName = $_POST['parent2fname'];
    $parentTwpLastName = $_POST['parent2lname'];
    $parentTwoEmail = $_POST['parent2email'];

    //TODO: Add sql connection and execute query based on data passed from the form
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "beta_sig_iota";

    $conn = new mysqli($servername, $username, $password);

    if($conn->connect_error) {
        logVariableWithContext("Error connecting to database: ", $conn->connect_error);
        die("Connection failed: " . $conn->connect_error);
    }

    $updateQuery = "UPDATE Member SET pawprint = '$pawprint', fname = '$firstName', lname = '$lastName', semesterJoined = '$semesterJoined', position = '$position', mStatus = '$status', schoolYear = '$grade', roomNumber = $roomNumber WHERE pawprint = '$pawprint';";
    
    makeQuery($conn, $updateQuery);

    if($parentOneFirstName != NULL) {
        $updateQueryParents = "UPDATE MemberParent SET pawprint = '$pawprint', parentFirstName = '$parentOneFirstName', parentLastName = '$parentOneLastName', parentEmail = '$parentOneEmail' WHERE pawprint = $pawprint)";
        makeQuery($conn, $updateQueryParents);
    }

    if($parentTwoFirstName != NULL) {
        $insertQueryParents = "UPDATE MemberParent SET pawprint = '$pawprint', parentFirstName = '$parentTwoFirstName', parentLastName = '$parentTwoLastName', parentEmail = '$parentTwoEmail' WHERE pawprint = $pawprint)";
        makeQuery($conn, $updateQueryParents);
    }
    echo "<script type='text/javascript'>alert('member successfully updated');</script>";
    header('Location: roster.php');
?>