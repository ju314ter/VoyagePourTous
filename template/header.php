<?php 
// include('./config.php'); //déjà défini dans la page d'index, obligatoire pour avoir des liens dynamiques sur index?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Voyage pour tous dot com</title>

    <!-- <link rel="stylesheet" href="<?php echo BASE_URL ?>static/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>static/css/styleprojet.scss">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>

    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
    <!-- Indicators -->
        <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

    <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="<?php echo BASE_URL ?>static/img/bg2.jpg" alt="background">
        </div>

        <div class="item">
            <img src="<?php echo BASE_URL ?>static/img/bg3.jpg" alt="background">
        </div>
        
        <div class="item">
            <img src="<?php echo BASE_URL ?>static/img/bg.jpg" alt="background">
        </div>

        <div class="item">
            <img src="<?php echo BASE_URL ?>static/img/bg4.jpg" alt="background">
        </div>
        </div>
  </div>

    <div class="main container-fluid">
        <div class="row navigation scale-down-ver-top">
            <div class="col-md-5">
                <nav class="navbar navbar-light bg-light">
                    <ul class="nav center">
                        <?php
                        if(!empty($_SESSION['isLoggedIn'])) {
                            echo '<li class="nav-item"><button class="btn btn-primary btn-deco center"><a class="nav-link" href="'. BASE_URL .'logout.php">Deconnexion</a></button></li>';
                        } else {
                            echo '<li class="nav-item"><button id ="toggleLogin" class="btn btn-primary btn-deco center"><a class="nav-link" href="#">Connection</a></button></li>';
                        }
                        ?>
                            <li class="nav-item">
                                <button class="btn btn-primary btn-deco center">
                                    <a class="nav-link" href="<?php echo BASE_URL ?>index.php">Acceuil</a>
                                </button>
                            </li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-2" id="logobackground">
                <img class="roll-in-top" id="logo_img" src="<?php echo BASE_URL ?>static/img/logo.png">
            </div>
            <div class="col-md-5">
                <nav class="navbar navbar-light bg-light">
                    <ul class="nav center">
                        <li class="nav-item">
                            <button class="btn btn-primary btn-deco center">
                                <a class="nav-link" href="<?php echo BASE_URL ?>search.php">Chercher voyage</a>
                            </button>
                        </li>
                        <?php
                        if(!empty($_SESSION['isLoggedIn']) && !empty($_SESSION['isAdmin'])) {
                            echo '<li class="nav-item"><button class="btn btn-primary btn-deco center"><a class="nav-link" href="'.BASE_URL.'dashboard.php">Administration</a></button></li>';
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>