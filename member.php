<!DOCTYPE html>
<html>
    <head>
        <?php
            require 'initDB.php';
            $searchQuery = htmlspecialchars($_GET["searchQuery"]);
            $query = "SELECT * FROM `beta_sig_iota`.`member` WHERE pawprint = '" . $searchQuery."';";
            
            
            echo $query;
            //$result = makeQuery($conn,$query);
            //echo $result;
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
                echo $searchQuery;
            ?>
        </h2>
        <div id="memberPage">
            <button type="button" class="Sbuttons" onclick="window.location.href='FinesPage.php'">Fines</button><br><br><br>
            <button type="button" class="Sbuttons" onclick="window.location.href='WorkOrders.php'">Work Orders</button>
        </div>
        <div class="header">
            Semester Joined: <br>
            Pawprint: <br>
            Current Room: <br>
            Status: <br>
            Senority Points: <br>
            Position: <br>
        </div>
    </body>
</html>