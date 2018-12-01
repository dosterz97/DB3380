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

    $insertQuery = "INSERT INTO Member (pawprint, fname, lname, semesterJoined, position, mStatus, schoolYear, roomNumber) VALUES ('$pawprint', '$firstName', '$lastName', '$semesterJoined', '$position', '$status', '$grade', '$roomNumber');";
    makeQuery($conn, $insertQuery);
    //TODO: Make supplementary tables (example: parent)
    if($parentOneFirstName != NULL) {
      $insertQueryParents = "INSERT INTO MemberParent (pawprint, parentFirstName, parentLastName, parentEmail) VALUES ('$parentOneFirstName', '$parentOneLastName', '$parentOneEmail');";
        makeQuery($conn, $insertQueryParents);
    }

    if($parentTwoFirstName != NULL) {
        $insertQueryParents = "INSERT INTO MemberParent (pawprint, parentFirstName, parentLastName, parentEmail) VALUES ('$parentTwoFirstName', '$parentTwoLastName', '$parentTwoEmail');";
        makeQuery($conn, $insertQueryParents)
    }
    echo "<script type='text/javascript'>alert('member successfully added');</script>";
    header('Location: roster.php');
?>