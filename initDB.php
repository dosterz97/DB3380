<?php
$debug = true;
function makeQuery($myConnection, $myQuery) {
    if($myConnection->query($myQuery) === TRUE) {
        logVariable("Successful query");
    }
    else if($myConnection->error) {
        logVariableWithContext("Error in query: ", $myConnection->error);
    }
}

function logVariable($var) {
    if($GLOBALS['debug']) {
    ?><script>console.log("<?php echo $var?>");</script><?php
    }
}

function logVariableWithContext($context, $var) {
    if($GLOBALS['debug']) {
    ?><script>console.log("<?php echo $context . $var?>");</script><?php
    }
}
$tables = array("Member", "Fine", "WorkOrder", "PledgeClass", "Room");
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

// Create database if it doesn't exist
$createDB = "CREATE DATABASE IF NOT EXISTS " . $dbName;
makeQuery($conn,$createDB);

if ($conn->query($createDB) !== TRUE) {
    logVariableWithContext("Error in creating database: ", $conn->error);
}
logVariable("Database Up and Running");
$conn->close();

$conn = new mysqli($servername, $username, $password, $dbName);
if ($conn->connect_error) {
    logVariableWithContext("Error connecting to database: ", $conn->connect_error);
    die("Connection failed: " . $conn->connect_error);
} 
//Create tables
$member = "CREATE TABLE IF NOT EXISTS Member(
    pawprint varchar(6) PRIMARY KEY,
    fName varchar(30) NOT NULL,
    lName varchar(30) NOT NULL,
    semesterJoined varchar(30) NOT NULL,
    mStatus ENUM ('active', 'inactive', 'associate', 'alumni') NOT NULL,
    schoolYear ENUM ('freshman', 'sophmore', 'junior', 'senior'),
    roomNumber int
    -- FOREIGN KEY (roomNumber) REFERENCES Room(roomID)
  )";
makeQuery($conn,$member);
$fine = "CREATE TABLE IF NOT EXISTS Fine(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    guiltyMemberId varchar(6) NOT NULL,
    filingMemeberId varchar(6) NOT NULL,
    fineStatus ENUM ('paid', 'pending') NOT NULL,
    fineDate date NOT NULL, 
    fineAmount float NOT NULL,
    fineDescription Text
  )";
makeQuery($conn, $fine);
$workOrder = "CREATE TABLE IF NOT EXISTS WorkOrder(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    filingMemberId varchar(6) NOT NULL,
    workOrderDescription Text,
    amount float NOT NULL,
    workOrderStatus ENUM ('pendingFunding', 'pendingCompletion', 'finished', 'wontFix')
  )";
makeQuery($conn, $workOrder);
$pledgeClass = "CREATE TABLE IF NOT EXISTS PledgeClass(
    classId varchar(4) PRIMARY KEY,
    classSize int NOT NULL, 
    members varchar(6)
  )";
makeQuery($conn,$pledgeClass);
$room = "CREATE TABLE IF NOT EXISTS Room(
    roomNumber int PRIMARY KEY,
    nickName varchar(50),
    members varchar(6)
  )";
makeQuery($conn,$room);
?>
