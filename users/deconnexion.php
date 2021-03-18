<?php 
session_start();
session_unset();	//detruire toutes les variables de session 
session_destroy(); //detruire la session 
header("Location:../home/connexion.php");

 ?>