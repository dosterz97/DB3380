<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Beta Sigma Psi - Individual Fines</title>
        <link rel="stylesheet" type="text/css" href="Styles/landing.css">
        <link rel="stylesheet" type="text/css" href="Styles/tables.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    </head>
    <body>
        <?php
            require 'initDB.php';
        ?>
        <h1 class="header">
            <img class="image" src="images/BetaSigCrest.png" alt="Crest">
            Beta Sigma Psi - Fines
            <img class="image" src="images/BetaSigCrest.png" alt="Crest">
        </h1>
        <button type="button" class="buttons" onclick="window.location.href='CreateFine.php'">Create Fine <i class="material-icons md-24">add</i></button>
        <div class="space">
            <table>
                <thead>
                <tr>
                    <td>Fine ID</td>
                    <td>Date</td>
                    <td>Description</td>
                    <td>Amount</td>
                    <td>Status</td>
                </tr>
                </thead>
                <tbody>
                    <?php
                        $pawprint = $_SESSION['pawprint'];
                        $sql = "SELECT * FROM Fine WHERE Fine.guiltyMemberId = '$pawprint'";
                        $result = mysqli_query($conn, $sql);
                        while($fine = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo '<td>'.$fine['id'].'</td><td>'.$fine['fineDate'].'</td><td>'.$fine['fineDescription'].'</td><td>'.$fine['fineAmount'].'</td><td>'.$fine['fineStatus'].'</td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>