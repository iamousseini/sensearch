<?php require 'head_user.php'; ?>
<?php require '../connexionDB.php'; ?>
<?php 

	function data_test($data){
	trim($data);
	stripcslashes($data);
	htmlspecialchars($data);
	return $data;
	}
	//Recuperer les infos de l'annonce (1er Passage):
	if (!empty($_GET['id'])) {
		$id = data_test($_GET['id']);
	}
	else{
		header("Location:boutique.php");
	}

	$sql = $bdd->prepare("SELECT * FROM annonces WHERE id = ?");
	$sql->execute(array($id));
	$data = $sql->fetch();

	$titre = data_test($data['titre_annonce']);
	$prix = data_test($data['prix_annonce']);
	$type = data_test($data['type_annonce']);
	$terme = data_test($data['terme']);
	$garantie = data_test($data['garantie']);
	$description= data_test($data['description']);
	$img = data_test($data['img']);

	//Deuxieme passage 

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
	//images
	if (!empty($_FILES['img1']['name'])) {
		
		$file_name_img1 = $_FILES['img1']['name'];
		$file_type_img1 = $_FILES['img1']['type'];
		$file_tmp_img1 	= $_FILES['img1']['tmp_name'];
		$file_size_img1 = $_FILES['img1']['size'];
		$file_exentension_img1= strrchr($_FILES['img1']['name'], ".");
		$file_rep_img1   = "../images_annonces/". $file_name_img1;	

		if (!empty($file_exentension_img1) && !in_array($file_exentension_img1,$extension)) {
			$error['extension_image'] = "Les image autoriser sont .png .jpg  .jpeg (Majuscule compris)";
		}
		if (!empty($file_name_img1) && file_exists($file_rep_img1)) {
			$error['double'] = "cette image existe deja";
		}
		
		if (empty($error) && move_uploaded_file($file_tmp_img1, $file_rep_img1)) {
			echo "Image de l'annonce uploader <br>";

			$req = $bdd->prepare("UPDATE annonces SET titre_annonce= ?,type_annonce =?,prix_annonce=?,terme=?,garantie=? , description = ? , img = ? WHERE id = ?");
			$req->execute(array($annonce,$type_annonce, $prix_annonce, $terme,$garantie_annonce , $description ,$file_rep_img1, $id ));
			header("Location:boutique.php");	

			}

		}//img vide
		else
		{
		if (!empty($description) && !empty($terme) && !empty($garantie_annonce) && !empty($type_annonce) && !empty($prix_annonce) && !empty($annonce) && empty($error)) {

			$req = $bdd->prepare("UPDATE annonces SET titre_annonce= ?,type_annonce =?,prix_annonce=?,terme=?,garantie=? , description = ?  WHERE id = ?");
			$req->execute(array($annonce,$type_annonce, $prix_annonce, $terme,$garantie_annonce , $description, $id ));
			header("Location:boutique.php");	

			}
		}

	
	

	
	




}//fin deuxieme passage

 ?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
	<?php if (!empty($error)): ?>
		<div class="alert alert-danger">
			<ul>
				<?php foreach ($error as $key => $value): ?>
					<li><?php echo $value; ?></li>
				<?php endforeach ?>
			</ul>
		</div>
	<?php endif ?>
	<h1>Mettre à jour d'une annonce</h1>

	<form method="POST" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-8">

				<div class="form-group">
					<label for="titre"><b>Titre de l'annonce</b></label>
					<input type="text" name="titre" class="form-control" placeholder="Titre de l'annonce" id="titre" value="<?php echo $titre ;?>">
				</div>	

				<div class="form-group">
					<label for="prix"><b>Prix de l'annonce</b></label>
					<input type="number" name="prix" class="form-control" placeholder="Prix de l'annonce" id="prix" value="<?php echo $prix ;?>">
				</div>	

				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Termes :</span>
					</div>
					<select class="custom-select" name="terme">
						<!-- <option value="Negociable">Negociable</option>
						<option value="Non negociable">Non negociable</option> -->
						<?php 

							foreach ($bdd->query("SELECT * FROM terme") as $value) {
								if ($value['id'] == $terme) {
									echo '<option selected="selected" value="'.$value['id'].'">'.$value['terme_annonce'].'</option>';
								}
								else
								{
										echo '<option value="'.$value['id'].'">'.$value['terme_annonce'].'</option>';
								}
							}

						 ?>
					</select>		
				</div>				

				<div class="input-group form-group">
					<div class="input-group-prepend">
	     				  <span class="input-group-text">Type d'annonce</span>
	   				 </div>
					 <select class="custom-select" name="type_annonce">
						<?php 

							foreach ($bdd->query("SELECT * FROM type") as $value1 ) {
								if ($value1['id'] == $type) {
									echo '<option selected="selected" value="'.$value1['id'].'">'.$value1['type_annonce'].'</option>';
								}
								else{
									echo '<option value="'.$value1['id'].'">'.$value1['type_annonce'].'</option>';
								}
							}


						 ?>
					</select>
				</div>	


				<div class="input-group form-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Garantie</span>
					</div>
					<select class="custom-select" name="garantie">
<!-- 						<option value="6 mois" selected="">6 mois</option>
						<option value="12 mois">12 mois</option>
						<option value="24 mois">24 mois</option>
						<option value="Non garantie">Non garantie</option> -->
						<?php 

							foreach ($bdd->query("SELECT * FROM garantie") as $value2 ) {
								if ($value2['id'] == $garantie) {
									echo '<option selected="selected" value="'.$value2['id'].'">'.$value2['garantie_annonce'].'</option>';	
								}
								else
								{
									echo '<option  value="'.$value2['id'].'">'.$value2['garantie_annonce'].'</option>';			
								}
							}

						 ?>
					</select>
				</div>	


				<div class="input-group form-group">
		    		<div class="input-group-prepend">
		       			<span class="input-group-text">Description de l'annonce</span>
		    		</div>
		    		<textarea class="form-control" aria-label="" name="description" required="" ><?php echo $description ?></textarea>
		  		</div>

		  		<p>Image : <?php echo strrchr($img, "/");; ?></p>

				<div class="form-group">
					<label for="image">Cliquer ici pour => </label>
					<input type="file" name="img1" id="image">
				</div>		

				<div class="form-group">
					<input type="submit" name="ok" class="btn btn-primary btn-block btn-lg" value="Update">
					<a href="boutique.php" class="btn btn-warning btn-block btn-lg"><- Retour</a>	
				</div>  		

			</div>
			<div class="col-md-4">
				<img src="../images/update.jpg" class="size">

			</div>

		</div>
	</form>
</div>
</div>
</div>


<?php require '../home/footer.php'; ?>

<style type="text/css">
	.container{
		background: skyblue;
		border:2px solid black;
		border-radius: 12px;
		padding: 20px;
	}
	.size{
		width: 500px;
		height: 360px;
		margin-top: 35px;
		border:solid 2px black;
		border-radius: 12px;
	}
</style>