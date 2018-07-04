<?php 
include('config.php');
if(!isset($_SESSION['isLoggedIn'])){
    include('./login_form.php');
}
include('template/header.php');
require_once('dbmanager.php');
require_once('utility.php');
?>


<?php 

$pays = getCountries();

if(isset($_GET['submit'])){

    $criteria=array(
        'pays'=> null,
        'date_debut'=> null,
        'date_fin'=> null,
        'prix'=> null
    );

    if($_GET['pays'] > 0) {$criteria['pays'] = $_GET['pays'];}

    if($_GET['date_debut'] != "") {$criteria['date_debut'] = $_GET['date_debut'];}

    if($_GET['date_fin'] != "") {$criteria['date_fin'] = $_GET['date_fin'];}
    
    if($_GET['prix'] > 0) {$criteria['prix'] = $_GET['prix'];}

    $voyages = searchTrip($criteria);
}
?>

<div class="container">
    <div class="row search">
        <div class="col-md-12">

            <form class="form-inline" action="" method="GET">
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
                    <span>A partir du : </span><input type="date" name="date_debut">
                    <span>Jusqu'au : </span><input type="date" name="date_fin">
                </div>
                <div class="form-group">
                        <input type="number" name="prix" placeholder="prix">
                </div>
                <input id="searchbutton" type="submit" name="submit" value="Rechercher">
            </form>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        
        <?php if(isset($_GET['submit'])): ?>
            <h2>Liste des voyages</h2>
            <table class="table table-bordered table-stripped">
                <tr>
                    <th>Pays</th>
                    <th>Date du séjour</th>
                    <th>Intitulé du séjour</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Fiche complète</th>
                </tr>
                <?php foreach($voyages as $element): ?>
                    <tr>
                        <td><?php echo $element['name_country'] ?></td>
                        <td>Du <?php echo transformSQLDate($element['Date_debut']) ?> au <?php echo transformSQLDate($element['Date_fin']) ?></td>
                        <td><?php echo $element['Titre'] ?></td>
                        <td><?php echo $element['Description'] ?></td>
                        <td><?php echo $element['Prix'] ?> €</td>
                        <td><a href="./manager/trip/detailTrip.php?ID=<?php echo $element['ID'];?>" class="btn btn-small btn-primary">Description et photos</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>

        </div>
    </div>
</div>


<?php 
include('template/footer.php');
?>