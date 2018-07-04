<?php 
include('../../config.php');
include('../../template/header.php');
include_once('../../dbmanager.php');

if(!$_SESSION['isAdmin']) {
    header('location : ../../index.php');
}

$pays = getCountries();

if (isset($_POST['submit'])){
    if(strlen($_POST['description']) >2) {
        $db = db_connect();
        $query = $db->prepare('INSERT INTO voyages (Pays, Date_debut, Date_fin, Titre, Description, Prix) 
                                VALUES (:pays, :dateDebut, :dateFin, :titre, :description, :prix)');
        $result = $query->execute(array(':pays'=> $_POST['pays'], 
                                        ':dateDebut'=> $_POST['dateDebut'], 
                                        ':dateFin'=> $_POST['dateFin'],
                                        ':titre'=> $_POST['titre'],
                                        ':description'=> $_POST['description'],
                                        ':prix'=> $_POST['prix']));
        if ($result) {
            header('location:'. BASE_URL .'dashboard.php');
        }
        else {
            echo '<p class="danger">Echec dans la tentative d\'ajout</p>';
        }
    }
    else {
        echo 'La description n\'est pas assez longue';
    }
}

?>
<div class="addTrip center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Ajouter un voyage</h2>
                <form id="tripForm" action="" method="POST">
                    <div class="form-group">
                        <input type="text" name="titre" placeholder="Titre du séjour">
                    </div>
                    <div class="form-group">
                        <select name="pays">
                            <option value="0">Selectionner un pays</option>
                            <?php if($pays): ?>
                            <?php foreach($pays as $element): ?>
                            <option value="<?php echo $element['ID']?>">
                                <?php echo $element['name']?>
                            </option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dateDebut">Date de début : </label>
                        <input type="date" name="dateDebut">
                    </div>
                    <div class="form-group">
                        <label for="dateFin">Date de fin : </label>
                        <input type="date" name="dateFin">
                    </div>
                    <div class="form-group">
                        <input type="number" name="prix" placeholder="prix">
                    </div>
                    <div class="form-group">
                        <textarea name="description" form="tripForm" cols="30" rows="10" placeholder="Entrez une description"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="enregistrer">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('../../template/footer.php');
?>