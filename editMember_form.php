<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="Styles/formStyle.css">
        <title>Add Member</title>
    </head>
    <body>
        <?php 
        //UNCOMMENT WHEN HOOKED UP TO DB
//            $pawprint = $_POST['pawprint'];
//            $queryForResult = "SELECT * FROM Member WHERE pawprint = '$pawprint';";
//        
//            $servername = "localhost";
//            $username = "root";
//            $password = "root";
//            $dbname = "beta_sig_iota";
//        
//            $conn = new mysqli($servername, $username, $password);
//
//            if($conn->connect_error) {
//                logVariableWithContext("Error connecting to database: ", $conn->connect_error);
//                die("Connection failed: " . $conn->connect_error);
//            }
//            
//            $result = $conn->query($queryForResult);
//        
//            if(!$result) {
//                die();
//            }
//            
//            $row = mysql_fetch_row($result);
//            $_SESSION["firstName"] = $row['fname'];
//            $_SESSION["lastName"] = $row['lname'];
//            $_SESSION["semesterJoined"] = $row['semesterJoined'];
//            $_SESSION["position"] = $row['position'];
//            $_SESSION["status"] = $row['mStatus'];
//            $_SESSION["schoolYear"] = $row['schoolYear'];
//            $_SESSION["roomNumber"] = $row['roomNumber'];
//            $_SESSION["seniority"] = $row['seniority'];

        ?>
         <h1 class="header">
            <img class="image" src="images/BetaSigCrest.png" alt="Crest">
            Beta Sigma Psi - Edit Member
            <img class="image" src="images/BetaSigCrest.png" alt="Crest">
        </h1>
        <!--TODO: Finish hooking up all fields to tables-->
        <form action="editMember.php" method="post">
            Pawprint:
            <input type="text" name="pawprint" placeholder="Mizzou Pawprint" <?php echo("value='".$_POST['pawprint'])."'"?>><br>
            First Name:
            <input type="text" name="firstName" placeholder="First Name"<?php echo("value='".$_SESSION['firstName'])."'"?>><br>
            Last Name:
            <input type="text" name="lastName" placeholder="Last Name"<?php echo("value='".$_SESSION['lastName'])."'"?>><br>
            Semester Joined/Pledge Class:
            <input type="text" name="semesterJoined" placeholder="Semester Joined" <?php echo("value='".$_SESSION['semesterJoined'])."'"?>><br>
            Position:
            <input type="text" name="position" placeholder="Position" <?php echo("value='".$_SESSION['semesterJoined'])."'"?>><br>
            Status:<br>
            <!--TODO: figure out logic for checking these radio buttons-->
            <input type="radio" name="status" value="active" checked> Active<br>
            <input type="radio" name="status" value="neophyte"> Neophyte<br>
            <input type="radio" name="status" value="associate"> Associate/Pledge<br>
            <input type="radio" name="status" value="alumni"> Alumni<br>
            Room Number:
            <input type="number" name="roomNumber" <?php echo("value='".$_SESSION['roomNumber'])."'"?>><br>
            Seniority Points:
            <input type="number" name="seniorityPoints"<?php echo("value='".$_SESSION['seniority'])."'"?>><br>
            Year in School:<br>
            <!--Next inputs define member school year-->
            <input type="radio" name="grade" value="freshman" checked> Freshman<br>
            <input type="radio" name="grade" value="sophomore"> Sophomore<br>
            <input type="radio" name="grade" value="junior"> Junior<br>
            <input type="radio" name="grade" value="senior"> Senior<br>
            <input type="radio" name="grade" value="graduate"> Graduate<br>
            Parent One First Name:
            <input type="text" name="parent1fname"><br>
            Parent One Last Name:
            <input type="text" name="parent1lname"><br>
            Parent One Email:
            <input type="text" name="parent1email"><br>
            Parent Two First Name:
            <input type="text" name="parent2fname"><br>
            Parent Two Last Name:
            <input type="text" name="parent2lname"><br>
            Parent Two Email:
            <input type="text" name="parent2email"><br>
            <input id="submitBtn" type="submit">
            <button id="deleteBtn" type="button"><b>Delete</b></button>
        </form>
    </body>
</html>