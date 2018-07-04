<?php
session_start(); //resprise de la session existante
session_destroy(); //destruction de la session reprise
header('Location: index.php');
?>