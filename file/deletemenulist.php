<?php

if (isset($_GET['foodmenuID'])) {
    require '../connect.php';

    $query = "DELETE FROM food_menu WHERE foodmenuID = :foodmenuID";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':foodmenuID', $_GET['foodmenuID']);

    if ($stmt->execute()) {
        $mess = "list Deleted!!!";
        header('location:index.php');
    } else {
        $mess = "Failed Delete!!!";
    }

    echo $mess;
    $conn = null;

}



?>