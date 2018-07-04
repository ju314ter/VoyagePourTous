<?php 
session_start();
include('../../config.php');
include('../../template/header.php');

if(!$_SESSION['isAdmin']) {
    header('location : ../../index.php');
} else {
    $db= db_connect();
    
    if ($db) {
        $query = $db->prepare('DELETE FROM pays WHERE id = :id');
        $result = $query->execute(array(':id' => $_GET['ID']));
        if($result) {
            header('location: ../../dashboard.php');
        } else {
        echo '<p class="danger">La suppression a échoué</p>';
        }
    }
}


?>

<div class="edit center">
    <h2>Ajouter un pays</h2>
    <form action="" method="POST">
        <input type="text" name="name">
        <input type="submit" name="submit" value="enregistrer">
    </form>
</div>

<h1>PAGE DE DELETION</h1>