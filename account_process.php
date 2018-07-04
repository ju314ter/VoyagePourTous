<?php

if(isset($_POST['email_creation']) && isset($_POST['password_creation']) && isset($_POST['password_creation'])){
    if($_POST['password_creation'] == $_POST['password_creation']){

        $register = registerUser($_POST);
    }
}


?>