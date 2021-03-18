<?php require '../connexionDB.php'; ?>
<?php 
//Traitements
if (!empty($_GET['id'])) {
	$id = htmlspecialchars($_GET['id']);

	$store = $bdd->prepare("SELECT * FROM inscription WHERE id = ?");
	$store->execute(array($id));
	$boutique = $store->fetch();
}
else{
	header("Location:./sanctions.php");
}
//Mettre dans la black-liste
if (isset($_POST['block'])) {
	
	//Verifier si la boutique est deja bloque

	$select = $bdd->prepare("SELECT * FROM black_liste WHERE boutique = ?");
	$select->execute(array($id));
	$present = $select->fetch();

	if ($present) {
		
		$message = "La boutique " . $boutique['nom_boutique'] . " est d&eacute;ja bloqu&eacute; !!!";
	}
	else
	{
		$insert = $bdd->prepare("INSERT INTO black_liste (boutique , email , mdp ) VALUES(?,?,?)");
		$insert->execute(array($boutique['id'] , $boutique['email'] , $boutique['password']));
		header("Location:./sanctions.php");
	}




}


 ?>
 <?php require 'head_admin.php'; ?>
<div class="container">
	<div class="row">
		<div class="col-md-12  shadow p-3 mb-5 bg-white rounded text-dark">
			<h1 align="center">Bloquer une boutique</h1>

			<?php if (!empty($message)): ?>
				<div class="alert alert-info">
					<p align="center" style="color: black">
						<?php echo $message; ?>
					</p>
				</div>
			<?php endif ?>

			<p align="center">
				Cette operation n'est possible que si la boutique en question a depass&eacute; les 3 avertissements <br>
				Elle consiste a mettre mettre la boutique sur une <b>black liste</b> et ainsi le bloquer son compte <br>
				Et sachez que votre choix est irreversible .
			</p>
			<h4>Boutique en question :</h4>
			<p>
				Nom : <?php echo $boutique['nom_boutique']; ?> <br>
				G&eacute;rant : <?php echo $boutique['nom'] . " ". $boutique['prenom']; ?> <br>
				Email : <?php echo $boutique['email']; ?> <br>
				Telephone : <?php echo $boutique['telephone']; ?> <br>
				Adresse : <?php echo $boutique['adresse']; ?> <br>
				Inscription : <?php echo $boutique['date_inscription']; ?>
			</p>
			<form method="POST">
				<input type="submit" name="block" class="btn btn-danger btn-block" value="Bloquer">
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
	
		border-radius: 15px;
		background: #16222A;
		background: -webkit-linear-gradient(59deg, #3A6073, #16222A);
  		background: linear-gradient(59deg, #3A6073, #16222A);
	}
	h1,h2,h4,p{
		color: white;
	}
	p{
		font-size: 18px;
		margin-top: 20px;
		
	}
	.btn{
		border-radius: 15px;
		margin-top: 50px;
	}
	.alert{
		border-radius: 15px;
	}
body{
	background-image: url('../images/admin_bckgrd.gif');
	
}

</style>