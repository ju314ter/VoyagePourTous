<?php
session_start();
define('TEMPLATE_PATH', 'D:\wamp64\www\VPT\template');
define('BASE_URL', 'http://localhost/VPT/');

function db_connect() {
    try {
        $db = new PDO('mysql:host=localhost;dbname=voyageproject', 'root', '');
        $db->exec('SET NAMES utf8'); //Assure l'encage UTF8 par PHP
        return $db;
    }
    catch(PDOException $e) { return null;} //Si erreur on renvoi null
}
?>

