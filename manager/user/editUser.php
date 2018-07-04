<?php 
include('../../dbmanager.php');
include('../../template/header.php');

if(!$_SESSION['isAdmin']) {
    header('location : ../../index.php');
} else {

    if(isset($_POST['submit'])) {
        $result = updateUser($_POST);
        header('location: ../../dashboard.php');
    }
    else {
        $user= getUserById($_GET['ID']);
    }

}
?>

<h2>Modifier l'utilisateur</h2>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <form action="" method="POST">
        <input type="hidden" name="ID" value="<?php echo $user['ID'] ?>">
        <div class="form-group">
          <span>Pseudonyme : </span><input type="text" name="name" value="<?php echo $user['Name'] ?>">
        </div>
        <div class="form-group">
          <span>Email : </span><input type="text" name="email" value="<?php echo $user['Email'] ?>">
        </div>
        <div class="form-group">
          <select name="status">
            <?php if($user['Status'] == "admin"){
                echo '<option selected value="admin">Admin</option>';
                echo '<option value="client">Client</option>';
            } else {
                echo '<option value="admin">Admin</option>';
                echo '<option selected value="client">Client</option>';
            }
            ?>
          </select>
          <select name="actif">
            <?php if($user['Actif'] == "1"){
                echo '<option selected value="1">Actif</option>';
                echo '<option value="0">Inactif</option>';
            } else {
                echo '<option value="1">Actif</option>';
                echo '<option selected value="0">Inactif</option>';
            }
            ?>
          </select>
        </div>
        <input type="submit" name="submit" value="Enregistrer">
      </form>

    </div>
  </div>
</div>

<?php include('../../template/footer.php'); ?>