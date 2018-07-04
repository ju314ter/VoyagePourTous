<?php 
include('../../dbmanager.php');
include('../../utility.php');
include('../../template/header.php');

if(!$_SESSION['isAdmin']) {
    header('location : ../../index.php');
} else {
    $pays = getCountries();

    if(isset($_POST['submit'])) {
        $result = updateTrip($_POST['ID'], $_POST);
        header('location: ../../dashboard.php');
    }
    else {
        $trip= getTripById($_GET['ID']);
        $pictures = getPicturesByTrip($trip['ID']);
    }

}
?>

<h2>Editer le voyage</h2>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <form action="" method="post">
        <input type="hidden" name="ID" value="<?php echo $_GET['ID'] ?>">
        <div class="form-group">
          <input type="text" name="Titre" value="<?php echo $trip['Titre'] ?>">
        </div>
        <div class="form-group">

          <select name="Pays">
            <option value="0">Sélectionner un pays</option>
            <?php if ($pays): ?>
            <?php foreach($pays as $element): ?>
            <?php if($element['ID'] == $trip['Pays']): ?>
            <option selected value="<?php echo $element['ID']?>">
              <?php echo $element['name'] ?>
            </option>
            <?php else: ?>
            <option value="<?php echo $element['ID']?>">
              <?php echo $element['name'] ?>
            </option>
            <?php endif; ?>
            <?php endforeach; ?>
            <?php endif; ?>
          </select>

        </div>
        <div class="form-group">
          <label for="date_start">Date de départ</label>
          <input type="date" name="Date_debut" value="<?php echo $trip['Date_debut'] ?>">
        </div>
        <div class="form-group">
          <label for="date_end">Date de retour</label>
          <input type="date" name="Date_fin" value="<?php echo $trip['Date_fin'] ?>">
        </div>
        <div class="form-group">
          <input type="number" name="Prix" value="<?php echo $trip['Prix']?>">
        </div>
        <div class="form-group">
          <textarea name="Description" rows="8" cols="80">
            <?php echo $trip['Description']?>
          </textarea>
        </div>
        <input type="submit" name="submit" value="Enregistrer">
      </form>

    </div>

    <div class="col-md-6">
      <h3>Ajouter une photo</h3>
      <form enctype="multipart/form-data" action="upload_picture.php" method="POST">
        <input type="hidden" name="trip_id" value="<?php echo $_GET['ID']?>">
        <input type="file" name="picture" value="">
        <input type="submit" name="submit_picture" value="envoyer">
      </form>
      <h3>Photos associées</h3>
      <?php
        if ($pictures != null && sizeof($pictures) > 0) {
          foreach($pictures as $picture) {
            $picture_path =
              BASE_URL . '/static/img/upload/' . $picture['path'];

            echo '<img class="thumb" src="'.$picture_path.'">';
          }
        } else {
          echo '<p>Aucune photo associée</p>';
        }
      ?>

    </div>
  </div>
</div>

<?php include('../../template/footer.php'); ?>