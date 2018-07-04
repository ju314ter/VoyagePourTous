<?php 
include('../../dbmanager.php');
include('../../utility.php');
include('../../template/header.php');

if($_GET['ID']){
    $trip= getTripById($_GET['ID']);
    $pictures = getPicturesByTrip($trip['ID']);
} else {
    echo 'Impossible de récuperer la description';
}
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3><?php echo $trip['Titre'] ?></h3>
      <p><?php echo $trip['Description'] ?></p>
      <h3>Photos associées</h3>
      <?php
        if ($pictures != null && sizeof($pictures) > 0) {
          foreach($pictures as $picture) {
            $picture_path =
              BASE_URL . '/static/img/upload/' . $picture['path'];

            echo '<img class="thumb sizemeup" src="'.$picture_path.'">';
          }
        } else {
          echo '<p>Aucune photo associée</p>';
        }
      ?>
      <h3>Prix : <?php echo $trip['Prix']?> €</h3>
    </div>
  </div>
</div>

<?php include('../../template/footer.php'); ?>