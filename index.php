<?php 
    include('config.php');
if(!isset($_SESSION['isLoggedIn'])){
    include('./login_form.php');
}


?>

<?php 
include('template/header.php');
require_once('dbmanager.php');
require_once('utility.php');
$pays = getCountries();
?>





<?php 
include('template/footer.php');
?>