<?php 
include('config.php');
if(!$_SESSION['isAdmin']) {
    header('location : index.php');
}
include('template/header.php');

?>
<div class="dashboard center">
    <ul>
        <a class="btn btn-primary btn-sm dashbtn" href="./manager/country/add.php">Ajouter un pays</a>
        <a id="toggleCountries" class="btn btn-primary btn-sm dashbtn" href="#">Afficher les pays</a>
        <a class="btn btn-primary btn-sm dashbtn" href="./manager/trip/addTrip.php">Ajouter un voyage</a>
        <a id="toggleTrip" class="btn btn-primary btn-sm dashbtn" href="#">Afficher les voyages</a>
        <a id="toggleUser" class="btn btn-primary btn-sm dashbtn" href="#">Gerer les utilisateurs</a>
    </ul>
</div>

<?php include('./manager/country/listCountries.php'); ?>

<?php include('./manager/trip/listTrip.php'); ?>

<?php include('./manager/user/listUser.php'); ?>


<?php include('template/footer.php'); ?>
