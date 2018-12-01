<!DOCTYPE html>
<html>
    <head>
        <?php
            require 'initDB.php';
        ?>
        <meta charset="utf-8">
        <title>Beta Sigma Psi - Rooms</title>
        <link rel="stylesheet" type="text/css" href="Styles/landing.css">
        <link rel="stylesheet" type="text/css" href="Styles/tables.css">
    </head>
    <body>
        <h1 class="header">
            <img class="image" src="images/BetaSigCrest.png" alt="Crest">
            Beta Sigma Psi - Rooms
            <img class="image" src="images/BetaSigCrest.png" alt="Crest">
        </h1>
        <button type="button" class="Sbuttons" onclick="window.location.href= 'addRoom_form.php'">Add Room</button><br>
        <div>
            <br>
            <table>
                <thead>
                <tr>
                    <td>Room Nickname</td>
                    <td>Room Number</td>
                    <td>Members</td>
                </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM room";
                        $result = mysqli_query($conn, $sql);

                        while($room = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo '<td>'.$room['nickName'].'</td>'. '<td>'.$room['roomNumber'].'</td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>