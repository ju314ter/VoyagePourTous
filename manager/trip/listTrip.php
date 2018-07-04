<?php 
require_once('dbmanager.php');
require_once('utility.php');

$full = false; //On ne veut qu'une partie des colonnes
$voyages = getTrips($full = false);
?>

<div class="listeTrip center hide">
        <h2>Liste des voyages</h2>
        <table class="table table-bordered table-stripped">
            <tr>
                <th>Pays</th>
                <th>Date du séjour</th>
                <th>Intitulé du séjour</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Action</th>
            </tr>
            <?php foreach($voyages as $element): ?>
                <tr>
                    <td><?php echo $element['name_country'] ?></td>
                    <td>Du <?php echo transformSQLDate($element['Date_debut']) ?> au <?php echo transformSQLDate($element['Date_fin']) ?></td>
                    <td><?php echo $element['Titre'] ?></td>
                    <td><?php echo $element['Description'] ?></td>
                    <td><?php echo $element['Prix'] ?></td>
                    <td>
                        <a href="./manager/trip/editTrip.php?ID=<?php echo $element['ID'];?>" class="btn btn-small btn-primary">Editer</a>
                        <a href="./manager/trip/deleteTrip.php?ID=<?php echo $element['ID'];?>" class="btn btn-small btn-danger">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
</div>