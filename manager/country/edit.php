<?php 
include('../../config.php');
include('../../template/header.php');

if(!$_SESSION['isAdmin']) {
    header('location : ../../index.php');
} else {
    $db= db_connect();

    if(isset($_POST['submit'])) {
        $query = $db->prepare('UPDATE pays set name = :name WHERE id = :id');
        $result = $query->execute(array(':name' => $_POST['name'], ':id' => $_POST['ID']));
        if($result){
            header('location: ../../dashboard.php');
        }
        else {
            echo 'Problème de mise à jours';
        }
    }
    else {
        if ($db) {
            $query = $db->prepare('SELECT * FROM pays WHERE id = :id');
            $result = $query->execute(array(':id' => $_GET['ID']));
    
            if($result) {
                $pays = $query->fetch(PDO::FETCH_ASSOC); //On récupère uniquement la première entrée de la query
            }
        }
    }

}
?>

<div class="edit center">
    <h2>Editer le pays</h2>
    <form action="" method="POST">
        <input type="hidden" name ="ID" value="<?php echo $_GET['ID'] ?>">
        <input type="text" name="name" value="<?php echo $pays['name'] ?>">
        <input type="submit" name="submit" value="Modifier">
    </form>
</div>

<?php include('../../template/footer.php'); ?>