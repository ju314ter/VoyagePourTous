<?php 
session_start();
include('../../config.php');
include('../../dbmanager.php');
if(!$_SESSION['isAdmin']) {
    header('location : ../../index.php');
} else {
    if (deleteTrip($_GET['ID'])){
        header('location: ../../dashboard.php');
    }
    else {
        echo '<p>Problème</p>';
    }
}
?>