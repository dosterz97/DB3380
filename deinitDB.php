<?php 
// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    logVariableWithContext("Error connecting to database: ", $conn->connect_error);
    die("Connection failed: " . $conn->connect_error);
}

$dt = "DROP TABLE ";
$dD = "DROP DATABASE ";
for ($i = 0; $i <= sizeof($tables); $i++) {
    
   $query = $dt . $tables[$i];
   echo $query;
   makeQuery($conn,$query);
} 
$query = $dD . $dbName;
makeQuery($conn, $query);
$conn->close();
?>