<?php session_start(); 


if (!empty($_SESSION['id'])) {
 
 header('Location:../users/profil.php');

}

if (!empty($_SESSION['admin'])) {
 
 header('Location:../admin/accueil.php');

}



?>