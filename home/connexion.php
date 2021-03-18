<?php require'../connexionDB.php' ?>
<?php require 'homesecure.php'; ?>
<?php

$message = '';

if (isset($_POST['ok'])) {

	//Initialiser les valeurs saisie 

		$email = htmlspecialchars($_POST['email']);

		$mdp   = htmlspecialchars($_POST['mdp']);	

	//Verifier si la boutique est inscrite 	

		$sql= $bdd->prepare("SELECT * FROM inscription WHERE email= ? AND password = ?");

		$sql->execute(array($email , $mdp));

		$user = $sql->fetch();

	//Verification si la boutique se trouve sur la liste noire

		$black = $bdd->prepare("SELECT * FROM black_liste WHERE email = ? AND mdp = ?");

		$black->execute(array($email , $mdp));

		$user_black = $black->fetch();


		if ($user && $user_black) {
			
			header("Location: user_block.php");
		}

		elseif ($user) {		
			
			

			$_SESSION['id'] = $user['id'] ;
			$_SESSION['nom'] = $user['nom'] ;
			$_SESSION['prenom'] = $user['prenom'] ;
			$_SESSION['email'] = $user['email'] ;
			$_SESSION['telephone'] = $user['telephone'] ;
			$_SESSION['password'] = $user['password'] ;
			$_SESSION['nom_boutique'] = $user['nom_boutique'] ;
			$_SESSION['adresse'] = $user['adresse'] ;
			$_SESSION['ville'] = $user['ville'] ;
			$_SESSION['info_boutique'] = $user['info_boutique'] ;
			$_SESSION['date_inscription'] = $user['date_inscription'] ;
			$_SESSION['statut'] = $user['statut'] ;

			header("Location: ../users/profil.php");



		}

		else
		{
			$message = "Identifiants incorrectes !";
		}

}//if isset connexion
	
 ?>
 
 <?php require 'header.php'; ?>


<div class="container">
	<form method="POST">
			
				<div class="card bg-light text-center shadow-lg p-3 mb-5 bg-white rounded">
					<h2 class = "text-center setitre">Se connecter</h2>
						<article class="card-body mx-auto">
							<div class="col-md-12">

								<?php if (isset($_POST['ok']) && !empty($message)): ?>
									<div class="alert alert-danger">
										<ul>
											<li style="font-size: 18px;color: black; list-style: none;"><?php echo $message; ?></li>
										</ul>
									</div>
								<?php endif ?>

								<div class="form-group">
									<label for="f1">E-mail  </label>
									<input type="email" name="email" id="f1" class="form-control" required placeholder="Saisir votre adresse mail">
								</div>	

								<div class="form-group">
									<label for="f2">Mot de passe </label>
									<input type="password" name="mdp" id="f2" class="form-control" required placeholder="Saisir votre mot de passe">
								</div>	

								<div class="form-group">
									<input type="submit" name="ok" class="btn btn-success btn-block"  value="Connexion">
								</div>
								<p>Vous n'avez pas encore de compte ? <a href="inscription.php">Cliquez ici</a> pour en créer un !</p>
							</div>	
						</div>	

						</article>


	</form>
</div>


<?php require'footer.php' ?>

<style type="text/css">
	/*.container{
		margin-top: 50px;
		margin-bottom: 80px;
		padding: 25px;
		background: #16222A;
  		background: -webkit-linear-gradient(59deg, #3A6073, #16222A);
  		background: linear-gradient(59deg, #3A6073, #16222A);

		border-style: solid;
 		border-width: 3px;
  		border-radius: 12px;
	}
	label{
		color: white;
	}*/

	.container{
		margin-top: 120px;
  		max-width: 600px;
  		height: 320px;
		/*margin-top: 50px;
		margin-bottom: 80px;

		border-style: solid;
 		border-width: 1px;
		  border-radius: 12px;*/

	}

	}
.setitre{
	margin-top: 20px;
}	
</style>

