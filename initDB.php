<?php
$debug = true;
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
    }
    return $result;
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
$tables = array("Member", "Fine", "WorkOrder", "Room", "MemberParent");
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
else {
    logVariable("Database Up and Running");
}
$conn->close();

$conn = new mysqli($servername, $username, $password, $dbName);
if ($conn->connect_error) {
    logVariableWithContext("Error connecting to database: ", $conn->connect_error);
    die("Connection failed: " . $conn->connect_error);
} 
//Create tables
$member = "CREATE TABLE IF NOT EXISTS Member(
    pawprint varchar(6) PRIMARY KEY,
    firstName varchar(30) NOT NULL,
    lastName varchar(30) NOT NULL,
    position varchar(50),
    roomNumber int,
    seniority int,
    mStatus ENUM ('active', 'inactive', 'associate', 'alumni') NOT NULL,
    semesterJoined varchar(30) NOT NULL,
    yearInSchool ENUM ('freshman', 'sophmore', 'junior', 'senior'),
    -- FOREIGN KEY (roomNumber) REFERENCES Room(roomID)
  )";
makeQuery($conn,$member);

$memberParent = "CREATE TABLE IF NOT EXISTS MemberParent(
    pawprint varchar(6) PRIMARY KEY,
    parentFirstName varchar(30) NOT NULL,
    parentLastName varchar(30) NOT NULL,
    parentEmail varchar(60)
    )";
makeQuery($conn, $memberParent);
                
$fine = "CREATE TABLE IF NOT EXISTS Fine(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    guiltyMemberId varchar(6) NOT NULL,
    filingMemberId varchar(6) NOT NULL,
    fineStatus ENUM ('paid', 'pending') NOT NULL,
    fineDate date NOT NULL, 
    fineAmount float NOT NULL,
    fineDescription Text
  )";
makeQuery($conn, $fine);

$workOrder = "CREATE TABLE IF NOT EXISTS WorkOrder(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    location varchar(30) NOT NULL,
    filingMemberId varchar(6) NOT NULL,
    workOrderDescription Text,
    amount float,
    dateFiled date,
    workOrderStatus ENUM ('pendingFunding', 'pendingCompletion', 'finished', 'wontFix')
  )";
makeQuery($conn, $workOrder);

$room = "CREATE TABLE IF NOT EXISTS Room(
    roomNumber int PRIMARY KEY,
    nickName varchar(50)
  )";
makeQuery($conn,$room);
?>
