<?php require '../connexionDB.php'; ?>
<?php 
//Traitements
$value = $bdd->query("SELECT * FROM admin");
$admin = $value->fetch();

if (isset($_POST['ok']) && !empty($_POST['email']) && !empty($_POST['mdp']) ) {
	
	$email = htmlspecialchars($_POST['email']);
	$mdp   = htmlspecialchars($_POST['mdp']);

	$update = $bdd->prepare("UPDATE admin SET email = ? , mdp = ? ");
	$update->execute(array($email , $mdp ));

	header("Location: ./info_perso.php");
}

 ?>
 <div class="container" align="center">
 	<div class="row">
 		<div class="col-md-12">
 			<h1 align="center">Modifier vos informations personnelle</h1>
 			<p align="center">
 				Vous pouvez modifier votre mots de passe et votre email autant de fois que vous le voulez . <br>
 				Mais attention avant de modifier vos identifiants , veuillez prevenir vos partenaires sinon <br>
 				il ne pourront pas se connecter .
 			</p>
 			<form method="POST">
 				<h3 style="margin-bottom: 30px;">Identifiants actuel</h3>
 				<div class="form-group">
 					<input type="email" name="email" value="<?php echo $admin['email'] ?>" class="form-control">
 				</div>
 				<div class="form-group">
 					<input type="text" name="mdp" value="<?php echo $admin['mdp'] ?>" class="form-control" required=''>
 				</div>
 				<input type="submit" name="ok" class="btn btn-info btn-lg"> 				
 			</form>
 		</div>
 	</div>
 </div>
 <?php require 'head_admin.php'; ?>
 <style type="text/css">
 	.container{
 		margin-top: 50px;
 	}
 	.col-md-12{
 		margin-left: 150px;
 		padding: 40px;
		border-radius: 15px;
		background: #16222A;
		background: -webkit-linear-gradient(59deg, #3A6073, #16222A);
  		background: linear-gradient(59deg, #3A6073, #16222A);
 	}
 	h1{
 		margin-bottom: 50px;
 	}
 	p{
 		font-size: 18px;
 		margin-bottom: 35px;
 	}
 	.form-group{
 		width: 800px;
 	}
 	.form-control{
 		border-radius: 18px;
 		padding: 18px;
 	}
 	.btn{
 		border-radius: 10px;
 		margin-top: 30px;
 	}
 	h1,h3,p{
 		color: white;
 	}
 	body{
	background-image: url('../images/admin_bckgrd.gif');
	
}

 </style>