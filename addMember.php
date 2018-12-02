<?php
    header("Location: roster.php");
    require 'initDB.php';

    $pawprint = $_POST['pawprint'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $semesterJoined = $_POST['semesterJoined'];
    $position = $_POST['position'];
    $mStatus = $_POST['mStatus'];
    $yearInSchool = $_POST['yearInSchool'];
    $seniority = $_POST['seniority'];
    $room = $_POST['room'];
    $parentOneFirstName = $_POST['parent1fname'];
    $parentOneLastName = $_POST['parent1lname'];
    $parentOneEmail = $_POST['parent1email'];
    $parentTwoFirstName = $_POST['parent2fname'];
    $parentTwpLastName = $_POST['parent2lname'];
    $parentTwoEmail = $_POST['parent2email'];

    if($parentOneFirstName != NULL) {
      $insertQueryParents = "INSERT INTO MemberParent (pawprint, parentFirstName, parentLastName, parentEmail) VALUES ('$pawprint', '$parentOneFirstName', '$parentOneLastName', '$parentOneEmail');";
        makeQuery($conn, $insertQueryParents);
    }

    if($parentTwoFirstName != NULL) {
        $insertQueryParents = "INSERT INTO MemberParent (pawprint, parentFirstName, parentLastName, parentEmail) VALUES ('$pawprint', '$parentTwoFirstName', '$parentTwoLastName', '$parentTwoEmail');";
        makeQuery($conn, $insertQueryParents);
    }
    echo "<script type='text/javascript'>alert('member successfully added');</script>";

    $queryToAdd = "INSERT INTO Member (pawprint, firstName, lastName, semesterJoined, position, mStatus, yearInSchool, room, seniority) VALUES ('$pawprint', '$firstName', '$lastName', '$semesterJoined', '$position', '$mStatus', '$yearInSchool', '$room', '$seniority');";

    makeQuery($conn, $queryToAdd);
?>