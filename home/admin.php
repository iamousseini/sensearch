<?php require 'homesecure.php'; ?>

<?php require'../connexionDB.php' ?>

<?php

$message = '';

if (isset($_POST['ok']) && !empty($_POST['email']) && !empty($_POST['mdp'])) {


	$email = htmlspecialchars($_POST['email']);
	$mdp   = htmlspecialchars($_POST['mdp']);

	$sql = $bdd->prepare("SELECT * FROM admin WHERE email = ? AND mdp = ?");
	$sql->execute(array($email,$mdp));
	$admin = $sql->fetch();

	//Verification de l'email 

	if ($admin) {

		$_SESSION['admin'] = [$admin['email'] , $admin['mdp']];
		
		header("Location: ../admin/accueil.php");
	}
	else{
		$message = "Identifiants incorrecte";
	}

		
}
	
 ?>

<?php require 'header.php' ?>


<div class="container shadow p-3 mb-5 bg-white rounded text-dark" align="center">

	<form method="POST">
		<h3 class="h3">Espace Administrateur</h3>

				<?php if (!empty($message)): ?>
					<div class="alert alert-danger" style="border-radius: 18px">
						<p style="font-size: 18px"><?php echo $message; ?></p>
					</div>
				<?php endif ?>

		<div class="form-group">
			<label for="f1" >Email :</label>
			<input type="email" name="email" class="form-control" required="" id="f1">
		</div>

		<div class="form-group">
			<label for="f2">Password :</label>
			<input type="password" name="mdp" class="form-control" required="" id="f2">
		</div>

		<div class="input-group">
			<input type="submit" name="ok" class="btn btn-info btn-block" value="connexion">
		</div>

	</form>
	
</div>
			


<?php require'footer.php' ?>
<style type="text/css">
	.container{/*
		background-image: url("../images/fond1.jpg");
		
		border:2px black double;*/
		border-radius: 15px;
		width: 900px;
		padding:40px;
	}
	.h3{
		margin-bottom: 28px;
		
	}
	label{
		
		font-size: 18px;
		font-style: italic;
	}
	.form-control{
		border-radius: 15px;
	}
	.btn{
		border-radius: 15px;
		margin-top: 20px;
	}


</style>




