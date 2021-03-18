<?php 

session_start();

if (empty($_SESSION['admin'])) {

  header("Location: ../home/admin.php");
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin-Sensearch</title>
  
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="icon" href="../images/ico.ico"/>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>    

</head>
<body>
<div class="container" >
  <!-- Side navigation -->
<div class="row">
  <div class="col-md-3">
    <div class="sidenav">
      <a href="accueil.php"><center><img src="../images/logo1.png" class="size"></center></a>
      <hr>
        <a href="accueil.php"><center>Page d'accueil</center></a> 
        <hr style="background: white">  
        <a href="liste_boutiques.php"><center>Liste des boutiques</center></a>
        <hr style="background: white">  
        <a href="recherche_boutique.php"><center>Recherche une boutique</center></a>
        <hr style="background: white">  
        <a href="message_client.php"><center>Message des clients</center></a>
        <hr style="background: white">  
        <a href="contact_boutique.php"><center>Avertir une boutique</center></a>
        <hr style="background: white">  
        <a href="sanctions.php"><center>Bloquer une boutique</center></a>
        <hr style="background: white">  
        <a href="debloque.php"><center>D&eacute;bloquer une boutique</center></a>
        <hr>
        <a href="info_perso.php"><center>Information Personnel</center></a>
       <hr style="background: white">  
        <a href="deconnexion.php" style="margin-top: 15px" class="deco"><center>D&eacute;connexion</center></a>
    </div>    
  </div>
  <style type="text/css">
hr{
  background: white;
  margin-bottom: 12px;
}
.size{
  
  width: 250px;
  margin-bottom: 25px;
}
.sidenav {
  height: 100%; /* Full-height: remove this if you want "auto" height */
  width: 300px; /* Set the width of the sidebar */
  position: fixed; /* Fixed Sidebar (stay in place on scroll) */
  z-index: 1; /* Stay on top */
  top: 0; /* Stay at the top */
  left: 0;
  background-color: #111; /* Black */
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 20px;
}

/* The navigation menu links */
.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 18px;
  color: #818181;
  display: block;
  margin-bottom: 15px;
}

/* When you mouse over the navigation links, change their color */
.sidenav a:hover {
  color: skyblue;
  
}
.deco a:hover{

    color: red;
}

  </style>
