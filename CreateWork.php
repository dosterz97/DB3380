<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Beta Sigma Psi - Create Work Order</title>
        <link rel="stylesheet" type="text/css" href="Styles/landing.css">
        <link rel="stylesheet" type="text/css" href="Styles/tables.css">
        <link rel="stylesheet" type="text/css" href="Styles/formStyle.css">
    </head>
    <body>
        <h1 class="header">
            <img class="image" src="images/BetaSigCrest.png" alt="Crest">
            Beta Sigma Psi - Create Work Order
            <img class="image" src="images/BetaSigCrest.png" alt="Crest">
        </h1>
        <div>
            <form action="registerWorkOrder.php" method="post" id="workOrdFrm">
                <br>Filing Member Pawprint: <input type="text" name="pawprint"><br><br>
                Location: <input type="text" name="location"><br><br>
                Description: <textarea name="description" form="workOrdFrm"></textarea><br><br>
                <input class="sButtons" type="submit" value="Submit">
            </form>
        </div>
    </body>
</html>