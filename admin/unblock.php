<?php require '../connexionDB.php'; ?>
<?php 
	//Traitements

	if (!empty($_GET['id'])) {
		
		$id = htmlspecialchars($_GET['id']);

		$stores = $bdd->prepare("SELECT * FROM inscription WHERE id = ?");
		$stores->execute(array($id));
		$store = $stores->fetch();


	}
	else{

		header("Location: ./debloque.php");
	}

	if (isset($_POST['ok'])) {
		
		// Retirer la boutique de la liste noire

		$blacklist = $bdd->prepare("DELETE FROM black_liste WHERE boutique = ? ");
		$blacklist->execute(array($id));

		// Retirer toutes les plaintes 

		$plaintes = $bdd->prepare("DELETE FROM signaler WHERE boutique = ? ");
		$plaintes->execute(array($id));

		// Retirer toutes les avertissements

		$avertissements = $bdd->prepare("DELETE FROM avertissement WHERE boutique = ?");
		$avertissements->execute(array($id));

		header("Location: debloque.php");
	}
 ?>
 <?php require 'head_admin.php'; ?>

 <div class="container">
 	<div class="row">
 		<div class="col-md-12">
 			<h1 align="center">D&eacute;bloquer la boutique <?php echo $store['nom_boutique']; ?>  </h1>
 			<p align="center">
 				Si vous voulez d&eacute;bloquer cette boutique , c'est que cette derni&egrave;re a remplit toutes les conditions necessaires . <br>
 				Une fois la boutique debloquer toutes les avertissements et toutes les plaintes lier à cette derni&egrave;re seront effacer . <br>
 			</p>

 			<h3>Informations personnelle</h3>

 			<ul>
 				<li>Nom : <?php echo $store['nom_boutique']; ?></li>	
 				<li>G&eacute;rant : <?php echo $store['nom'] . " " . $store['prenom']; ?></li>
 				<li>Email : <?php echo $store['email']; ?></li>
 				<li>T&eacute;lephone : <?php echo $store['telephone']; ?></li>
 				<li>Adresse : <?php echo $store['adresse']; ?></li>
 			</ul>

 			<form method="POST">
 				<input type="submit" name="ok" class="btn btn-info btn-block" value="D&eacute;bloquer la boutique">
 			</form>

 		</div>
 	</div>
 </div>

 <style type="text/css">

 	.col-md-12{
		margin-left: 150px;
		margin-top: 50px;
		margin-bottom: 50px;
		padding: 50px;
		border:2px solid black;
		border-radius: 15px;
		background: #16222A;
		background: -webkit-linear-gradient(59deg, #3A6073, #16222A);
  		background: linear-gradient(59deg, #3A6073, #16222A);
	}
	h1,h2,h3,p,li{
		color: white;
	} 	
	p{
		font-size: 18px;
		margin-bottom: 35px;
		margin-top: 45px;
	}
	li{
		font-size: 18px;
		margin-bottom: 25px;
	}
	h3{
		margin:25px;

	}
	
	.btn {
		border-radius: 18px;
		margin-top: 40px;
	}
body{
	background-image: url('../images/admin_bckgrd.gif');
	
}

 </style>