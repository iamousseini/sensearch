<?php 
require 'head_user.php';
require '../connexionDB.php';
?>
<?php
$error = [];
$extension = [".png" , ".PNG" , ".jpg" , ".JPG" , ".jpeg",".JPEG"];
if (isset($_POST['ok'])) {
	
	if (isset($_POST['titre']))  {
		$annonce = htmlspecialchars($_POST['titre']);
	}
	if ($_POST['prix'] < 500) {
		$error['prix'] = "Le prix minimum d'une annonce est de 500CFA";
	}
	else{
		$prix_annonce = htmlspecialchars($_POST['prix']);
	}
	if (isset($_POST['type_annonce'])) {
		$type_annonce = htmlspecialchars($_POST['type_annonce']);
	}
	if (isset($_POST['garantie'])) {
		$garantie_annonce = htmlspecialchars($_POST['garantie']);
	}
	if (isset($_POST['terme'])) {
		$terme = htmlspecialchars($_POST['terme']);
	}
	if (isset($_POST['description'])) {
		$description = htmlspecialchars(stripcslashes($_POST['description']));
	}
	if (!empty($_FILES)) {
		if (!empty($_FILES['img1'])) {
			//image1
			$file_name_img1 = $_FILES['img1']['name'];
			$file_type_img1 = $_FILES['img1']['type'];
			$file_tmp_img1 	= $_FILES['img1']['tmp_name'];
			$file_size_img1 = $_FILES['img1']['size'];
			$file_exentension_img1= strrchr($_FILES['img1']['name'], ".");
			$file_rep_img1   = "../images_annonces/". $file_name_img1;
			//Gestion des erreurs :
			if (!empty($file_name_img1) && file_exists($file_rep_img1)) {
				$error['double'] = "cette image existe deja";
			}
			//Extension
			if (!empty($file_exentension_img1) && !in_array($file_exentension_img1,$extension)) {
				$error['extension_image'] = "Les image autoriser sont .png .jpg  .jpeg (Majuscule compris)";
			}

			if (empty($error) && move_uploaded_file($file_tmp_img1, $file_rep_img1)) {
				echo "Image de l'annonce uploader <br>";
				$upload1 = true;
				try {
					$req = $bdd->prepare("INSERT INTO annonces (boutique , titre_annonce , type_annonce ,prix_annonce , terme , garantie , description , img) VALUES(?,?,?,?,?,?,?,?)");
					$req->execute(array($_SESSION['id'] , $annonce , $type_annonce , $prix_annonce , $terme , $garantie_annonce , $description , $file_rep_img1));
				} catch (Exception $e) {
				
					echo $e->getmessage();	
				}
				

			}

		}
	}



}

?>
<div class="container bg-light shadow-lg p-3 mb-5 bg-white rounded">
<?php if (!empty($error)): ?>
	<div class="alert alert-warning" style="border-radius: 15px;">
		<ul>
			<?php foreach ($error as $key => $value): ?>
				<li style="color: black ;"><?php echo '[ ' . $key . ' ] : ' . $value; ?></li>
			<?php endforeach ?>
		</ul>
	</div>
<?php endif ?>
<h1 class="text-center">Nouvelle Annonce</h1>
<br>
<form method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<input type="text" name="titre" class="form-control" placeholder="Titre de l'annonce" required="">
			</div>
			<fieldset disabled="">
				<div class="form-group">
					<input type="text"class="form-control"placeholder="<?php echo $_SESSION['nom_boutique'] ?>">
				</div>
			</fieldset>
			<fieldset disabled="">
				<div class="form-group">
					<input type="text"class="form-control"placeholder="<?php echo $_SESSION['n_ville'] . " / ". $_SESSION['adresse'] ?>">
				</div>
			</fieldset>			
			<div class="input-group form-group">
				<div class="input-group-prepend">
     				  <span class="input-group-text">Type d'annonce</span>
   				 </div>
				<select class="custom-select" name="type_annonce">
					<option value="1" selected="">Technologie</option>
					<option value="2">Vehicule</option>
					<option value="3">Immobilier</option>
					<option value="4">Mode</option>
					<option value="5">Demandes/offres d'emploie</option>
					<option value="6">Evénements/loisirs</option>
					<option value="7"> Sports</option>
				</select>
			</div>
			<div class="input-group form-group">
				<div class="input-group-prepend">
					<span class="input-group-text">Garantie</span>
				</div>
				<select class="custom-select" name="garantie">
					<option value="1" selected="">6 mois</option>
					<option value="2">12 mois</option>
					<option value="3">24 mois</option>
					<option value="4">Aucune garantie</option>
				</select>
			</div>
			
		</div>
		<div class="col-md-6">
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">CFA</span>
				</div>
				<input type="number" name="prix" id="f1" class="form-control" placeholder="Prix" required="">
			</div>
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">Prix ? :</span>
				</div>
				<select class="custom-select" name="terme">
					<option value="1">Négociable</option>
					<option value="2">Non négociable</option>
				</select>		
			</div>
			<fieldset disabled="">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="<?php echo $_SESSION['email'] ?>">
				</div>
			</fieldset>
			<fieldset disabled="">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="<?php echo $_SESSION['telephone'] ?>">
				</div>
			</fieldset>
			<fieldset disabled="">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="<?php echo $_SESSION['n_statut'] ?>">
				</div>
			</fieldset>


		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="input-group form-group">
    			<div class="input-group-prepend">
       				<span class="input-group-text">Description de l'annonce</span>
    			</div>
    			<textarea class="form-control" aria-label="" name="description" required=""></textarea>
  			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10">
			<h2>Photos</h2>
			<p>Photos : Une annonce avec photo est plus fois plus consultée qu'une annonce sans photo.<br>
			Mais vous pouvez ne pas mettre d'image si vous voulez .</p>
			<p>Vous avez droit a une photo : </p>

			<div class="form-group">
				<label for="img1"><b>Image de l'annonce :</b></label>
				<input type="file" name="img1" id="img1">
			</div>
		</div>
	</div>
	<div class="row" style="margin-top: 20px;">
		<div class="col-md-12">
			<input type="submit" name="ok" class="btn btn-primary btn-block btn-lg" value="Publier cette annnonce dans votre boutique">
		</div>
	</div>

</form>		
</div>
<?php require '../home/footer.php'; ?>
<style type="text/css">
.container{
		
		margin-top: 50px;
		margin-bottom: 80px;
		padding: 25px;
}
	
form{
		margin-top: 50px;
		margin-bottom: 50px; 
	}
p{
	font-size: 18px;
	font-style: italic;
}	
h2{
	text-decoration: underline;
	font-style: italic;
	margin-bottom: 18px;
}
img{
	margin:10px;
	border-radius:12px; 
}


</style>