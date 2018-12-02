<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Beta Sigma Psi - Work Orders</title>
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
            Beta Sigma Psi - Work Orders
            <img class="image" src="images/BetaSigCrest.png" alt="Crest">
        </h1>
        <button type="button" class="Sbuttons" onclick="window.location.href='CreateWork.php'">Create Order <i class="material-icons md-24">add</i></button>
        <div class="space">
            <table>
                <thead>
                <tr>
                    <td>Order ID</td>
                    <td>Location</td>
                    <td>Description</td>
                    <td>Amount</td>
                    <td>Status</td>
                </tr>
                </thead>
                <tbody>
                    <?php
                        $pawprint = $_SESSION['pawprint'];
                        $sql = "SELECT * FROM WorkOrder WHERE WorkOrder.filingMemberId = '$pawprint'";
                        $result = mysqli_query($conn, $sql);
                        while($workOrder = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>'.$workOrder['id'].'</td><td>'.$workOrder['location'].'</td><td>'.$workOrder['workOrderDescription'].'</td><td>'.$workOrder['amount'].'</td><td>'.$workOrder['workOrderStatus'].'</td>';
                            echo '</tr>';
                        }
        
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>