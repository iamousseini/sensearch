<?php session_start(); ?>
<?php 
//Pour eviter qu'on puisse acceder a cette interface sans autorisation
if (empty($_SESSION['id'])) {
	header("Location:../home/connexion.php");
}

 ?>
 <?php require '../connexionDB.php'; ?>
 <?php 

    $countMessage = $bdd->prepare("SELECT count(id) AS messages FROM message_client WHERE nom_boutique = ?");
    $countMessage->execute(array($_SESSION['nom_boutique']));
    $count = $countMessage->fetch();

    $alerts = $bdd->prepare("SELECT count(id) AS nb FROM avertissement WHERE boutique = ?");
    $alerts->execute(array($_SESSION['id']));
    $alert = $alerts->fetch();


  ?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $_SESSION['nom']; ?></title>
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
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <ul class="navbar-nav">
  	<a class="navbar-brand" href="#">
   		 <img src="../images/logo1.png" alt="Logo" style="width:200px;margin-right: 18px;">
  	</a>
    <li class="nav-item active">
      <a class="nav-link" href="#"><?php echo $_SESSION['nom'] . " : "; ?></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="profil.php">Profil</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="annonces.php">Poster une annonce</a>
    </li>
    <li class="nav-item">
    	<a href="boutique.php" class="nav-link">Ma Boutique</a>
    </li>
    <li class="nav-item">
      <a href="message.php" class="nav-link">Messagerie <span style="color: white">(<?php echo $count['messages']; ?>)</span></a>
    </li>
    <li class="nav-item">
      <a href="avertissement.php" class="nav-link">Avertissement <span style="color: white;">(<?php echo $alert['nb']; ?>)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="deconnexion.php">Deconnexion</a>
    </li>
  </ul>
</nav>

<style type="text/css">
	nav ul {
		padding: 15px;
	}
	.nav-item {
		margin-left: 20px;
		font-size: 18px;
		font-style: italic;
	}
	nav{
		margin-bottom: 150px;
    background: #16222A;
    background: -webkit-linear-gradient(59deg, #3A6073, #16222A);
    background: linear-gradient(59deg, #3A6073, #16222A);
	}
	
</style>