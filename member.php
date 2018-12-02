<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <style>
        .memberBody > div {
            width:100%;
            font-size: 1.5em;
            text-align:center;
        }
        .member-buttons-wrapper {
            max-width: 1000px;
            display:flex;
            justify-content:center;
        }
        .member-buttons-wrapper .buttons {
            margin:0px 5px;
        }
    </style>
    <head>
        <?php
            require 'initDB.php';
            $searchQuery = htmlspecialchars($_GET["searchQuery"]);
            $query = "SELECT * FROM `Member` WHERE `pawprint` = '$searchQuery' ORDER BY `pawprint` DESC";
                        
            $result = makeQuery($conn, $query);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {                
                    $pawprint = $row["pawprint"];
                    $_SESSION['pawprint'] = $pawprint;
                    $firstName = $row["firstName"];
                    $lastName = $row["lastName"];
                    $position = $row["position"];
                    $roomNumber = $row["roomNumber"];
                    $seniority = $row["seniority"];
                    $mStatus = $row["mStatus"];
                    $semesterJoined = $row["semesterJoined"];
                    $yearInSchool = $row["yearInSchool"];
                }
            } 
        ?>
        <meta charset="utf-8">
        <title>Beta Sigma Psi - Member</title>
        <link rel="stylesheet" type="text/css" href="Styles/landing.css">
        <link rel="stylesheet" type="text/css" href="Styles/tables.css">
    </head>
    <body>
        <h1 class="header">
            <img class="image" src="images/BetaSigCrest.png" alt="Crest">
            Beta Sigma Psi - Member
            <img class="image" src="images/BetaSigCrest.png" alt="Crest">
        </h1>
        <h2 id="nameBox">
            <?php
                echo $firstName . " " . $lastName;
            ?>
        </h2>
        <div id="memberPage" class="member-buttons-wrapper">
            <button type="button" class="buttons" onclick="window.location.href='FinesPage.php'">Fines</button>
            <button type="button" class="buttons" onclick="window.location.href='WorkOrders.php'">Work Orders</button>
        </div>
        <div class="memberBody">
            <div>Semester Joined: <?php echo $semesterJoined; ?></div>
            <div>Pawprint: <?php echo $pawprint; ?><br></div>
            <div>Email: <a href="mailto:<?php echo $pawprint; ?>@mail.missouri.edu"><?php echo $pawprint; ?>@mail.missouri.edu</a></div>
            <div>Current Room: <?php echo $roomNumber; ?><br></div>
            <div>Year In School: <?php echo $yearInSchool; ?><br></div>
            <div>Senority Points: <?php echo $seniority; ?><br></div>
            <div>Position: <?php echo $position; ?><br></div>
        </div>
    </body>
</html>