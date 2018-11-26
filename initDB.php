<?php
function makeQuery($myConnection, $myQuery) {
    if($myConnection->query() === TRUE) {
        logVariableWithContext("Successful query", $myQuery);
    }
    else if($myConnection->error) {
        logVariableWithContext("Error in query", $myConnection->error);
    }
}

function logVariable($var) {
    ?><script>console.log("<?php echo $var?>");</script><?php
}
function logVariableWithContext($context, $var) {
    ?><script>console.log("<?php $context . $var?>");</script><?php
}

$servername = "localhost";
$username = "root";
$password = "root";
$dbName = "beta_sig_iota";
// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    ?><script>console.log("Error connecting to database: " . $conn->connect_error);</script><?php
    die("Connection failed: " . $conn->connect_error);
} 

// Create database if it doesn't exist
$createDB = "CREATE DATABASE IF NOT EXISTS " . $dbName;
makeQuery($conn,$createDB);

if ($conn->query($createDB) !== TRUE) {
    logVariableWithContext("Error in creating database", $conn->error);
}
logVariable("Database Up and Running");
$conn->close();

$conn = new mysqli($servername, $username, $password, $dbName);
//Create tables
$member = "CREATE TABLE IF NOT EXISTS Member(
    pawprint varchar(6) PRIMARY KEY,
    fName varchar(30),
    lName varchar(30),
    semesterJoined varchar(30),
    mStatus ENUM ('active', 'inactive', 'associate', 'alumni'),
    schoolYear ENUM ('freshman', 'sophmore', 'junior', 'senior'),
    roomNumber int,
    FOREIGN KEY (roomNumber) REFERENCES Room(roomID)
  )";
makeQuery($conn,$member);


?>
