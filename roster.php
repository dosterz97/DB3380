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
        <button type="button" id="myBtn" class="buttons" onclick="window.location.href='addMember_form.html'">Add Member</button><br><br>
        <table>
            <thead>
                <tr>
                    <td>Member</td>
                    <td>Year</td>
                    <td>Email</td>
                    <td>Parent 1</td>
                    <td>Parent 1 Email</td>
                    <td>Parent 2</td>
                    <td>Parent 2 Email</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM member";
                    $result = mysqli_query($conn, $sql);

                    while($member = mysqli_fetch_assoc($result)) {
                        $pawprint = $member['pawprint'];
                        $newSQL = "SELECT * FROM memberParent WHERE pawprint = '$pawprint'";
                        $resultParent = mysqli_query($conn, $newSQL);
                        $counter = 0;
                        
                        echo '<tr onclick="window.location.href = \'member.php?searchQuery='.$pawprint.'\'">';
                        echo '<td>'.$member['firstName']." ".$member['lastName'].'</td>'.'<td>'.$member['yearInSchool'].'</td>'.'<td>'.$member['pawprint']."@mail.missouri.edu".'</td>';
                        
                        while($finalParent = mysqli_fetch_assoc($resultParent)){
                            $counter++;
                            echo '<td>'.$finalParent['parentFirstName']." ".$finalParent['parentLastName'].'</td>'.'<td>'.$finalParent['parentEmail'];
                            if($resultParent->num_rows != $counter){
                                echo '<br>';
                            }
                        }
                        echo '</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>