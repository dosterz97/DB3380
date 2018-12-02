<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="Styles/formStyle.css">
        <link rel="stylesheet" type="text/css" href="Styles/landing.css">
        <title>Beta Sigma Psi - Edit Member</title>
    </head>
    <body>
        <?php 
            require 'initDB.php';
        
            $pawprint = $_SESSION['pawprint'];
            $queryForResult = "SELECT * FROM Member WHERE pawprint = '$pawprint';";
            
            $result = mysqli_query($conn, $queryForResult);
        
            if(!$result) {
                die();
            }
            
            $row = mysqli_fetch_assoc($result);
            $_SESSION["firstName"] = $row['firstName'];
            $_SESSION["lastName"] = $row['lastName'];
            $_SESSION["semesterJoined"] = $row['semesterJoined'];
            $_SESSION["position"] = $row['position'];
            $_SESSION["status"] = $row['mStatus'];
            $_SESSION["schoolYear"] = $row['yearInSchool'];
            $_SESSION["roomNumber"] = $row['roomNumber'];
            $_SESSION["seniority"] = $row['seniority'];

        ?>
         <h1 class="header">
            <img class="image" src="images/BetaSigCrest.png" alt="Crest">
            Beta Sigma Psi - Edit Member
            <img class="image" src="images/BetaSigCrest.png" alt="Crest">
        </h1>
        <!--TODO: Finish hooking up all fields to tables-->
        <form action="editMember.php" method="post">
            Pawprint:
            <input type="text" name="pawprint" placeholder="Mizzou Pawprint" <?php echo("value='".$_SESSION['pawprint'])."'"?>><br>
            First Name:
            <input type="text" name="firstName" placeholder="First Name"<?php echo("value='".$_SESSION['firstName'])."'"?>><br>
            Last Name:
            <input type="text" name="lastName" placeholder="Last Name"<?php echo("value='".$_SESSION['lastName'])."'"?>><br>
            Semester Joined/Pledge Class:
            <input type="text" name="semesterJoined" placeholder="Semester Joined" <?php echo("value='".$_SESSION['semesterJoined'])."'"?>><br>
            Position:
            <input type="text" name="position" placeholder="Position" <?php echo("value='".$_SESSION['position'])."'"?>><br>
            Status:<br>
            <!--TODO: figure out logic for checking these radio buttons-->
            <input type="radio" name="mStatus" value="active" checked> Active<br>
            <input type="radio" name="mStatus" value="neophyte"> Neophyte<br>
            <input type="radio" name="mStatus" value="associate"> Associate/Pledge<br>
            <input type="radio" name="mStatus" value="alumni"> Alumni<br>
            Room Number:
            <input type="number" name="roomNumber" <?php echo("value='".$_SESSION['roomNumber'])."'"?>><br>
            Seniority Points:
            <input type="number" name="seniorityPoints"<?php echo("value='".$_SESSION['seniority'])."'"?>><br>
            Year in School:<br>
            <!--Next inputs define member school year-->
            <input type="radio" name="yearInSchool" value="freshman"> Freshman<br>
            <input type="radio" name="yearInSchool" value="sophomore" checked> Sophomore<br>
            <input type="radio" name="yearInSchool" value="junior"> Junior<br>
            <input type="radio" name="yearInSchool" value="senior"> Senior<br>
            <input type="radio" name="yearInSchool" value="graduate"> Graduate<br>
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
            <input id="submitBtn" class="sButtons" type="submit">
            <button id="deleteBtn" class="sButtons" type="button" onclick="deleteMember()"><b>Delete</b></button>
        </form>
        
        <script>
            function deleteMember() {
                window.location.replace("deleteMember.php");
            }
        </script>
    </body>
</html>