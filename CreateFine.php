<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Beta Sigma Psi - Create Fine</title>
        <link rel="stylesheet" type="text/css" href="Styles/landing.css">
        <link rel="stylesheet" type="text/css" href="Styles/tables.css">
    </head>
    <body>
        <h1 class="header">
            <img class="image" src="images/BetaSigCrest.png" alt="Crest">
            Beta Sigma Psi - Create Fine
            <img class="image" src="images/BetaSigCrest.png" alt="Crest">
        </h1>
        <div>
            <form class="forms" action="submitFine.php" method="post" id="fineFrm">
                Fining Member: <input type="text" name="finingMember"><br>
                Guilty Member: <input type="text" name="guiltyMember"><br>
                Amount: <input type="number" name="amount"><br><br>
                Description:
                <textarea name="description" form="fineFrm" rows="10" cols="30"></textarea><br><br>
                <input class="Sbuttons" type="submit" value="Submit">
            </form>
        </div>
    </body>
</html>