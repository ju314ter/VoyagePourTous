<?php 
include('../../dbmanager.php');

var_dump($_POST);
echo '</br>';
var_dump($_FILES);
echo '</br>';
var_dump($_SERVER['DOCUMENT_ROOT']); //Racine du serveur
echo '</br>';

//déplacement du fichier uploadé vers le serveur
if($_FILES['picture']['size'] > 2000000) { //test de la taille du fichier en octet, ici 2 Mo
    echo 'Fichier trop gros';
}
else {
    $from = $_FILES['picture']['tmp_name'];
    $to = $_SERVER['DOCUMENT_ROOT'].'/VPT/static/img/upload/' . $_FILES['picture']['name'];
    echo $from;
    echo $to; 
    
    //Enregistrement en BDD
    if(addPicture($_POST['trip_id'], $_FILES['picture']['name'])) {
        //Si l'enregistrement est fait, on déplace le fichier dans upload
        $result =  move_uploaded_file($from, $to);
        //On redirige
        header('location:editTrip.php?ID='.$_POST['trip_id']);
        }
}

?>