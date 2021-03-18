<?php 
if (!empty($_GET['id'])) {
	$id = htmlspecialchars($_GET['id']);
}
else{
	header("Location:liste_boutiques.php");
}

 ?>
 <?php require '../connexionDB.php'; ?>
 <?php 
		$boutiques = $bdd->prepare("SELECT * FROM inscription WHERE id = ?");
		$boutiques->execute(array($id));
		$boutique = $boutiques->fetch();

		//Count annonces
		$annonces = $bdd->prepare("SELECT * FROM annonces WHERE boutique = ?");
		$annonces->execute(array($id));
		$Nb_annonces = $annonces->rowCount();

	//count type_annonce
		//technologie
		$technologies = $bdd->prepare("SELECT * FROM annonces WHERE boutique = ? AND type_annonce = ?");
		$technologies->execute(array($id , 1));
		$technologie = $technologies->rowCount();

		//Vehicule
		$vehicules = $bdd->prepare("SELECT * FROM annonces WHERE boutique = ? AND type_annonce = ?");
		$vehicules->execute(array($id , 2));
		$vehicule = $vehicules->rowCount();

		//Immobilier
		$Immobiliers = $bdd->prepare("SELECT * FROM annonces WHERE boutique = ? AND type_annonce = ?");
		$Immobiliers->execute(array($id , 3));
		$Immobilier = $Immobiliers->rowCount();

		//Mode
		$modes = $bdd->prepare("SELECT * FROM annonces WHERE boutique = ? AND type_annonce = ?");
		$modes->execute(array($id , 4));
		$mode = $modes->rowCount();

		//Demande/offre d'emploi
		$demandes = $bdd->prepare("SELECT * FROM annonces WHERE boutique = ? AND type_annonce = ?");
		$demandes->execute(array($id , 5));
		$demande = $demandes->rowCount();

		//evenement/loisir
		$loisirs = $bdd->prepare("SELECT * FROM annonces WHERE boutique = ? AND type_annonce = ?");
		$loisirs->execute(array($id , 6));
		$loisir = $loisirs->rowCount();

		//Sport
		$sports = $bdd->prepare("SELECT * FROM annonces WHERE boutique = ? AND type_annonce = ?");
		$sports->execute(array($id , 7));
		$sport = $sports->rowCount();	


		$plaintes = $bdd->prepare("SELECT count(id) AS plaintes FROM signaler WHERE boutique = ?");
		$plaintes->execute(array($id));	
		$plainte =  $plaintes->fetch();


  ?>
 <?php require 'head_admin.php'; ?>
<div class="container">
	<div class="row">
		<div class="col-md-12 shadow p-3 mb-5 bg-white rounded text-white">
			
		

			
		
		

 	<h1 align="center">Nom de la boutique : <?php echo $boutique['nom_boutique']; ?></h1>

 	<button class="btn btn-primary btn-lg"><?php echo $Nb_annonces . " annonces mises en lignes";  ?></button>

 		<hr>
 		<h2 align="center">Statistiques</h2>
 		<hr style="margin-bottom: 50px;">
 		<h2 align="center">Types d'annonces</h2>

 		<marquee>
 	<div class="inline">

			<div class="card text-white bg-primary mb-3" style="min-width: 15rem; margin:8px;">
				<div class="card-header"><center>Technologie</center></div>
				<div class="card-body">
				    <h2><center><?php echo $technologie; ?></center></h2>

  				</div>
  			</div>

			<div class="card text-white bg-secondary mb-3" style="min-width: 15rem; margin:8px;">
				<div class="card-header"><center>Vehicule</center></div>
				<div class="card-body">
				    <h2><center><?php echo $vehicule; ?></center></h2>

  				</div>
  			</div>


			<div class="card text-white bg-success  mb-3" style="min-width: 15rem; margin:8px;">
				<div class="card-header"><center>Immobilier</center></div>
				<div class="card-body">
				    <h2><center><?php echo $Immobilier; ?></center></h2>
  				</div>
  			</div>
			<div class="card text-white bg-danger  mb-3" style="min-width: 15rem; margin:8px;">
				<div class="card-header"><center>Modes</center></div>
				<div class="card-body">
				    <h2><center><?php echo $mode; ?></center></h2>
  				</div>
  			</div>  			




			<div class="card text-white bg-warning  mb-3" style="min-width: 15rem; margin:2px;">
				<div class="card-header"><center>Demande/offre d'emploi</center></div>
				<div class="card-body">
				    <h2><center><?php echo $demande; ?></center></h2>
  				</div>
  			</div>

			<div class="card text-white bg-info mb-3" style="min-width: 15rem; margin:8px;">
				<div class="card-header"><center>Evenement/loisir</center></div>
				<div class="card-body">
				    <h2><center><?php echo $loisir; ?></center></h2>
  				</div>
  			</div>
  		
  		
			<div class="card text-white bg-dark  mb-3" style="min-width: 15rem; margin:8px;">
				<div class="card-header"><center>Sport</center></div>
				<div class="card-body">
				    <h2><center><?php echo $sport; ?></center></h2>
  				</div>
  			</div>  	

  		
  		</div>
  		</marquee>	
  		
  	

  	<div style="margin-bottom: 35px;margin-top: 35px; padding: 15px;">
			<h2 align="center" style="margin-bottom: 40px;">Nombre de fois signaler</h2>
			<p align="center">
				Les clients peuvent se plaindre ou signaler une boutique quelconques pour diverses raisons . <br>
				Pour cela , ce dernier n'a qu'a envoyer un message a l'espace admin tout en sp&eacute;cifiant le nom de la boutique et les raisons de sa plainte. <br>
				Au bout de quelques plaintes (5 minimum) de differents clients , la boutiques aura des lourdes sanctions . <br>
				Par exemple : <b>On peut retirer la moitier de ces annonces ou pire encore toutes ces annonces.</b> <br>
			</p>

			<div class="card text-white bg-dark mb-3" style="margin-top: 80px;">
				<div class="card-header"><center>Plaintes des clients</center></div>
				<div class="card-body">
				    <h5 class="card-title"><center>Nombres de plainte</center></h5>
				    <h2><center><?php echo $plainte['plaintes']; ?></center></h2>

  				</div>
  			</div>			


		 	<div class="card" style="margin-top: 80px;">
				<div class="card-header">
				    <center>Description de la boutique</center>
				</div>
				<div class="card-body">
				    <blockquote class="blockquote mb-0">
				      <p style="color: black"><?php echo $boutique['info_boutique']; ?></p>
				      <footer class="blockquote-footer">Create by : <cite title="Source Title"><?php echo $boutique['nom'] . " " . $boutique['prenom'] . " => " . $boutique['date_inscription']?></cite></footer>
				      </blockquote>
				</div>
			</div>

		<div class="inline" style="padding: 30px;margin-top: 50px;">
			
			
			<div>
				<a href="contact_boutique.php" class="btn btn-info " style="min-width: 20rem; margin-right: 30px;">Contacter la boutique</a>
			</div>

			<div >
				<a href="#" class="btn btn-dark " style="min-width: 20rem; margin-right: 30px; ">Sanctionner</a>
			</div>

			<div >
				<a href="liste_boutiques.php" class="btn btn-warning " style="min-width: 20rem; margin-right: 30px;"><= Retour</a>
			</div>


		</div>

	</div>		





		
 		
  	


	




</div>
</div>
</div><!--container-->

<style type="text/css">

	h2{
		margin-top: 30px;
		margin-bottom: 25px;
	}
	h2:hover{
		text-decoration: underline;
		color: skyblue;
	}
	p{
		font-size: 18px;
		padding: 10px;
	}
	h1{
		text-decoration: underline;
		margin-top: 50px;
		margin-bottom: 80px;
	}
	h1,h2,p{
		color: white;
	}
	button{
		margin-bottom: 25px;
	}
	.inline{
	display: flex;
	padding: 10px;
	}
	.col-md-12{
		margin-left: 150px;
		margin-top: 50px;
		margin-bottom: 50px;
		padding: 10px;
		border-radius: 15px;
		background: #16222A;
		background: -webkit-linear-gradient(59deg, #3A6073, #16222A);
  		background: linear-gradient(59deg, #3A6073, #16222A);
	}

body{
	background-image: url('../images/admin_bckgrd.gif');
	
}
</style>