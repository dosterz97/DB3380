<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="Styles/formStyle.css">
        <title>Add Member</title>
    </head>
    <body>
         <h1 class="header">
            <img class="image" src="images/BetaSigCrest.png" alt="Crest">
            Beta Sigma Psi - Add Member
            <img class="image" src="images/BetaSigCrest.png" alt="Crest">
        </h1>
        <form action="addMember.php" method="post">
            Pawprint:
            <input type="text" name="pawprint" placeholder="Mizzou Pawprint"><br>
            First Name:
            <input type="text" name="firstName" placeholder="First Name"><br>
            Last Name:
            <input type="text" name="lastName" placeholder="Last Name"><br>
            Semester Joined/Pledge Class:
            <input type="text" name="semesterJoined" placeholder="Semester Joined"><br>
            Position:
            <input type="text" name="position" placeholder="Position"><br>
            Status:<br>
            <!--Next inputs define member status-->
            <input type="radio" name="status" value="active" checked> Active<br>
            <input type="radio" name="status" value="neophyte"> Neophyte<br>
            <input type="radio" name="status" value="associate"> Associate/Pledge<br>
            <input type="radio" name="status" value="alumni"> Alumni<br>
            Room Number:
            <input type="number" name="roomNumber"><br>
            Seniority Points:
            <input type="number" name="seniorityPoints"><br>
            Year in School:<br>
            <!--Next inputs define member school year-->
            <input type="radio" name="grade" value="freshman" checked> Freshman<br>
            <input type="radio" name="grade" value="sophomore"> Sophomore<br>
            <input type="radio" name="grade" value="junior"> Junior<br>
            <input type="radio" name="grade" value="senior"> Senior<br>
            <input type="radio" name="grade" value="graduate"> Graduate<br>
            <input id="submitBtn" type="submit">
            <button id="deleteBtn" type="button"><b>Delete</b></button>
        </form>
    </body>
</html>