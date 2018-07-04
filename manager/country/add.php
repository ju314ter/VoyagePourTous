<?php 
include('../../config.php');
include('../../template/header.php');

if(!$_SESSION['isAdmin']) {
    header('location : ../../index.php');
}

$db = db_connect();

?>
<div class="add center">
    <h2>Ajouter un pays</h2>
    <form action="" method="POST">
        <input type="text" name="name">
        <input type="submit" name="submit" value="enregistrer">
    </form>
</div>

<?php
include('../../template/footer.php');
if (isset($_POST['submit'])){
    if(strlen($_POST['name']) >2) {
        $query = $db->prepare('INSERT INTO pays (name) VALUES (:name)');
        $result = $query->execute(array(':name'=> $_POST['name']));
        var_dump($result);
        if ($result) {
            header('location:'. BASE_URL .'dashboard.php');
        }
        else {
            echo '<p class="danger">Echec dans la tentative d\'ajout</p>';
        }
    }
}
?>