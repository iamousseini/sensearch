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
		header("Location:all_annonces.php");
	}
	 ?>
<?php require 'homesecure.php'; ?>

<?php

	//recuperer le nom de la boutique :
	$req = $bdd->prepare("SELECT * FROM inscription WHERE id = ?");
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

	//Traitement du formulaire de contact
	$error = [];

	if (isset($_POST['ok']) && !empty($_POST['adresse']) && !empty($_POST['email']) && !empty($_POST['sujet']) && !empty($_POST['message'])) {
		
		$nom = data_test($_POST['nom']);
		$adresse = data_test($_POST['adresse']);
		$email = data_test($_POST['email']);
		$sujet = data_test($_POST['sujet']);
		$message = data_test($_POST['message']);

		$msg = $bdd->prepare("INSERT INTO message_client(id_annonce, nom,adresse,email,sujet,message,nom_boutique) VALUES(?,?,?,?,?,?,?)");
		$msg->execute(array($id,$nom,$adresse,$email, $sujet , $message , $boutique['nom_boutique']));
		header("Location:all_annonces.php");
	}
	
 ?>
 <?php require 'header.php'; ?>

<div class="container">
	<h1 align="center">Aperçu de l'annonce</h1>
	<div class="row">		
		<div class="col-md-4">
				
				<img id="myImg" src="<?php echo $data['img'] ?>" class = "img-thumbnail">


				<div id="myModal" class="modal">
                   <span class="close">&times;</span>
                   <img class="modal-content" id="img01">
                <div id="caption"></div>
               </div>



		</div>

		<div class='col-md-4 detail'>
			
			<div class="list-group">
				<button type="button" class="list-group-item list-group-item-action bg-primary text-white"><center>Descriptions</center></button>
				<a href="#" class="list-group-item list-group-item-action"><center><?php echo $data['titre_annonce']; ?> </center></a>
				<a href="#" class="list-group-item list-group-item-action"><center><?php echo $data['prix_annonce'] ; ?> CFA </center></a>
				<a href="#" class="list-group-item list-group-item-action"><center><?php echo $terme['terme_annonce']; ?> </center></a>
				<a href="#" class="list-group-item list-group-item-action"><center><?php echo $garantie['garantie_annonce']; ?> </center></a>
							
			</div>
		</div>
		<div class='col-md-4 detail'>
			
			<div class="list-group">
				<button type="button" class="list-group-item list-group-item-action bg-primary text-white"><center>Contact</center></button>
				<a href="#" class="list-group-item list-group-item-action"><center>Responsable : <?php echo $boutique['nom']; ?> </center></a>
				<a href="#" class="list-group-item list-group-item-action"><center><?php echo $boutique['email'] ; ?></center> </a>
				<a href="#" class="list-group-item list-group-item-action"><center><?php echo $boutique['telephone']; ?> </center></a>
				<a href="#" class="list-group-item list-group-item-action"><center><?php echo $boutique['adresse']; ?> </center></a>
							
			</div>
		</div>		
	</div>
</div>

<div class="container bg-light shadow-lg p-3 mb-5 rounded text-dark">
	<form method="POST">
		<h1 align="center" class="text-dark">Contact</h1>
		<p align="center">A partir de ce formulaire , vous pouvez directement joindre la boutique :<b> <?php echo $boutique['nom_boutique']; ?> </b></p>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="f1">Nom :</label>
					<input type="text" name="nom" id="f1" class="form-control" required="">			
				</div>
				<div class="form-group">
					<label for="f2">Adresse (ville/region):</label>
					<input type="text" name="adresse" id="f2" class="form-control" required="">			
				</div>				
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="f3">Email :</label>
					<input type="email" name="email" id="f3" class="form-control" required="">			
				</div>	
				<div class="form-group">
					<label for="f4">Sujet :</label>
					<input type="text" name="sujet" id="f4" class="form-control" required="">			
				</div>											
			</div>
		</div>	
		<div class="form-group">
			<label for="f5">Message :</label>
			<textarea name="message" class="form-control" id="f5" style="margin-bottom: 15px;" required=""></textarea>			
		</div>	

		<input type="submit" name="ok" class="btn btn-danger btn-block btn-lg" value="Envoyer le message">			
		
	</form>
</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>

<?php require 'footer.php'; ?>

<style type="text/css">
	.container{
		background-color: #395e71;
		border-radius: 15px;
		padding: 15px;
		margin-bottom: 30px;
	}

	.img-thumbnail{
		width: 300px;
		border-radius: 10px;
	}
	.row{
		margin-top: 50px;
		padding: 20px;
	}
	h1{
		
		color: white;
		margin-bottom: 25px;
	}
	h2{
		color: white;
	}
	p{
		font-size: 20px;

	}

	
#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}

</style>