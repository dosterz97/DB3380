<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="Styles/formStyle.css">
        <title>Beta Sigma Psi - Add Room</title>
    </head>
    <body> 
        <h1 class="header">
            <img class="image" src="images/BetaSigCrest.png" alt="Crest">
            Beta Sigma Psi - Add Room
            <img class="image" src="images/BetaSigCrest.png" alt="Crest">
        </h1>
        <form action="addRoom.php" method="post">
            Room Number:
            <input type="number" name="roomNumber"><br>
            Room Nickname: 
            <input type="text" name="roomNickname"><br>
            <input type="submit">
        </form>
    </body>
</html>