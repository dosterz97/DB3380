<?php
    header("Location: WorkOrders.php");
    require 'initDB.php';
    
    $filingMember = $_POST['pawprint'];
    $description = $_POST['description'];
    $location = $_POST['location'];

    $addWorkOrder = "INSERT INTO WorkOrder (location, filingMemberId, workOrderDescription, amount, dateFiled, workOrderStatus) VALUES ('$location', '$filingMember', '$description', NULL, NOW(), 'pendingFunding')";
    makeQuery($conn, $addWorkOrder);

?>