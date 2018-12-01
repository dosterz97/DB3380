<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Beta Sigma Psi - Roster</title>
        <link rel="stylesheet" type="text/css" href="Styles/landing.css">
        <link rel="stylesheet" type="text/css" href="Styles/tables.css">
    </head>
    <body>
        <?php
            require 'initDB.php';
        ?>
        <h1 class="header">
            <img class="image" src="images/BetaSigCrest.png" alt="Crest">
            Beta Sigma Psi - Roster
            <img class="image" src="images/BetaSigCrest.png" alt="Crest">
        </h1>
        <div class="wrapper">
            <button id="myBtn">Update Members</button>
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <button type="button" class="buttons" onclick="window.location.href='addMember_form.html'">Add Member</button>
                    <button type="button" class="buttons" onclick="">Edit Member</button>
                </div>
            </div>
            <button type="button" class="buttons" onclick="">Email All Members</button>
            <button type="button" class="buttons" onclick="">Email All Alumni</button>
        </div><br>
        <table>
            <thead>
                <tr>
                    <td>Member</td>
                    <td>Phone</td>
                    <td>Email</td>
                    <td>Parent(s)</td>
                    <td>Parent Email</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM member";
                    $result = mysqli_query($conn, $sql);

                    while($member = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo '<td>'.$member['firstName'].'</td>'.'<td>'.$member['pawprint'].'</td>'.'<td>'.$member['pawprint'].'</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
                <script>
            var modal = document.getElementById('myModal');
            var btn = document.getElementById("myBtn");
            var span = document.getElementsByClassName("close")[0]; 
            btn.onclick = function() {
                modal.style.display = "block";
            }
            span.onclick = function() {
                modal.style.display = "none";
            }
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
    </body>
</html>