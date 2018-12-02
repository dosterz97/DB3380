<?php
    require 'initDB.php';

    $pawprint = $_POST['pawprint'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $semesterJoined = $_POST['semesterJoined'];
    $position = $_POST['position'];
    $mStatus = $_POST['mStatus'];
    $yearInSchool = $_POST['yearInSchool'];
    $seniority = $_POST['seniority'];
    $roomNumber = $_POST['roomNumber'];
    $parentOneFirstName = $_POST['parent1fname'];
    $parentOneLastName = $_POST['parent1lname'];
    $parentOneEmail = $_POST['parent1email'];
    $parentTwoFirstName = $_POST['parent2fname'];
    $parentTwpLastName = $_POST['parent2lname'];
    $parentTwoEmail = $_POST['parent2email'];


    $updateQuery = "UPDATE Member SET pawprint = '$pawprint', firstName = '$firstName', lastName = '$lastName', semesterJoined = '$semesterJoined', position = '$position', mStatus = '$mStatus', yearInSchool = '$yearInSchool', roomNumber = $roomNumber WHERE pawprint = '$pawprint';";
    
    makeQuery($conn, $updateQuery);

    if($parentOneFirstName != NULL) {
        $updateQueryParents = "UPDATE MemberParent SET pawprint = '$pawprint', parentFirstName = '$parentOneFirstName', parentLastName = '$parentOneLastName', parentEmail = '$parentOneEmail' WHERE pawprint = $pawprint)";
        makeQuery($conn, $updateQueryParents);
    }

    if($parentTwoFirstName != NULL) {
        $insertQueryParents = "UPDATE MemberParent SET pawprint = '$pawprint', parentFirstName = '$parentTwoFirstName', parentLastName = '$parentTwoLastName', parentEmail = '$parentTwoEmail' WHERE pawprint = $pawprint)";
        makeQuery($conn, $updateQueryParents);
    }
    echo "<script type='text/javascript'>alert('member successfully updated');</script>";
    header('Location: roster.php');
?>