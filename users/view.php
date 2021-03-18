<?php require 'head_user.php'; ?>
<?php require '../connexionDB.php'; ?>
<?php
	function data_test($data){
		trim($data);
		stripcslashes($data);
		htmlspecialchars($data);
		return $data;
	} 
	
	if (!empty($_GET['id'])) {
		$id = data_test($_GET['id']);
		$sql = $bdd->prepare("SELECT * FROM annonces WHERE id = ?");
		$sql->execute(array($id));
		$data = $sql->fetch();
	}
	else{
		header("Location:boutique.php");
	}
	//recuperer le nom de la boutique :
	$req = $bdd->prepare("SELECT nom_boutique FROM inscription WHERE id = ?");
	$req->execute(array($data['boutique']));
	$boutique = $req->fetch();

	$types = $bdd->prepare("SELECT * FROM type WHERE id = ?");
	$types->execute(array($data['type_annonce']));
	$type = $types->fetch();

	$termes = $bdd->prepare("SELECT * FROM terme WHERE id = ?");
	$termes->execute(array($data['terme']));
	$terme = $termes->fetch();

	$garanties = $bdd->prepare("SELECT * FROM garantie WHERE id = ?");
	$garanties->execute(array($data['garantie']));
	$garantie = $garanties->fetch();
	
 ?>

<div class="container">
	<h1>Aperçu de votre annonce</h1>
	<div class="row">		
		<div class="col-md-6">
				<h2>Image de l'annonce</h2>
				<img src="<?php echo $data['img'] ?>" class = "img-thumbnail">
		</div>
		<div class="col-md-6">
			<h2>Information sur l'annonce</h2>
			<form>
				<div class="form-group">
					<label>Numero d'authentification : <?php echo $data['id']; ?></label>
				</div>				
				<div class="form-group">
					<label>Titre : <?php echo $data['titre_annonce']; ?></label>
				</div>
				<div class="form-group">
					<label>Type : <?php echo $type['type_annonce']; ?></label>
				</div>
				<div class="form-group">
					<label>Prix : <?php echo $data['prix_annonce']; ?></label>
				</div>		
				<div class="form-group">
					<label>Terme : <?php echo $terme['terme_annonce']; ?></label>
				</div>	
				<div class="form-group">
					<label>Garantie : <?php echo $garantie['garantie_annonce']; ?></label>
				</div>	
				<div class="form-group">
					<label>Description : <?php echo $data['description']; ?></label>
				</div>		
				<div class="form-group">
					<label>Nom de la boutique : <?php echo $boutique['nom_boutique']; ?></label>
				</div>	
				<div class="form-group">
					<label>Mis en ligne : <?php echo $data['date_annonce']; ?></label>
				</div>																										
			</form>
		</div>
	</div>
</div>



<?php require '../home/footer.php'; ?>

<style type="text/css">
	.container{
		background-color: skyblue;
		border:black 2px solid;
		border-radius: 15px;
		padding: 15px;
	}
	form{
		margin-top: 50px;
	}
	.img-thumbnail{
		width: 450px;
		height: 450px;
		border-radius: 10px;
	}
	.row{
		margin-top: 50px;
		padding: 15px;
	}
	h2{
		margin-bottom: 50px;
	}

</style>