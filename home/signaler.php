<?php require '../connexionDB.php'; ?>
<?php 
//traitements
$boutiques = $bdd->query("SELECT * FROM inscription");
if (isset($_POST['ok'])) {
	
	$boutique 		= htmlspecialchars($_POST['boutique']);
	$motif    		= htmlspecialchars($_POST['motif']);
	$explication    = htmlspecialchars($_POST['explication']);
	$nom         	= htmlspecialchars($_POST['nom']);
	$email          = htmlspecialchars($_POST['email']);

	if (!empty($boutique) && !empty($motif) && !empty($explication) && !empty($nom) && !empty($email) ) {

try {
	$signaler = $bdd->prepare("INSERT INTO signaler (boutique , motif , explication , nom ,email) VALUES(?,?,?,?,?)");
	$signaler->execute(array($boutique , $motif , $explication , $nom , $email));
	header("Location: index.php");
			
	} catch (Exception $e) {
			echo "Une erreur est survenue lors de l'envoie".$e->getMessage();	
		}
	}
}
 ?>
<?php require 'header.php'; ?>
<div class="container shadow p-3 mb-5 bg-white rounded text-dark">
	<h1 align="center">Signaler une boutique</h1>
	<h2>Pourquoi signaler ?</h2>
	<p>
		Si vous avez ete victime d'anarque ou d'escroquerie par des boutiques presentes ici sur notre plateforme , <br>
		cela nuit fortement à notre image et à notre crédibilité .
		Par consequent , nous avons mis en place cette page <b>'Signaler'</b> pour que vous (client) informiez les administrateurs de ce site des mauvais agissements de certaines boutiques. <br>
		<b><i>Et les admins se chargerons de la sanction </i></b>. <br>
	</p>
	<h2>Comment faire ?</h2>
	<p>
		Pour ce faire,vous devez remplir le formulaire en tout bas et bien préciser  la nature de votre mécontentement <br>
		Remplir correctement et serieusement le formulaire nous aidera beaucoup pour bien comprendre le probleme. <br>
		On vous invite donc à faire de pareil :) merci ! <br>
	</p>
	<h2>Dans quel cas faut-il recourir à cette methode drastique ?</h2>
	<p>
		Si vous vous trouvez parmis ces cas , alors vous devez signaler la boutique en question :
		<ul>
			<li>Mauvaise qualit&eacute; de service ou de produit</li>
			<li>Non-respect des caractéristique qu'on a énumérer dans la description de l'annonce</li>
			<li>Aucune reponse de la boutique depuis une semaine par (mail / numero)</li>
			<li>Non respect du client </li>
			<li>D'autres cas sont possible si vous jugez qu'ils sont important</li>
		</ul>
	</p>

	<form method="POST">
		<h2 align="center">Formulaire de plainte</h2>	
		<div class="form-group">
			<h4>Selectionner la boutique</h4>
			<select class="form-control" name="boutique">
				<?php 
					while ($data = $boutiques->fetch()) {
						echo "<option value = '" . $data['id'] . "' >" . $data['nom_boutique'] . "</option>";
					}
				 ?>
			</select>
		</div>
		<div class="form-group">
			<h4>Motif de votre plainte</h4>
			<!--Motifs-->
			<input type="radio" name="motif" id="m1" checked="" value="1">
			<label for="m1">Mauvaise qualit&eacute; de service</label>
			<br>
			<input type="radio" name="motif" id="m2" value="2">
			<label for="m2">Mauvaise qualit&eacute; du produit</label>
			<br>	
			<input type="radio" name="motif" id="m3" value="3">
			<label for="m3">Aucune reponse de la boutique depuis deux semaines</label>
			<br>
			<input type="radio" name="motif" id="m4" value="4">
			<label for="m4">Non respect du client</label>
			<br>
			<input type="radio" name="motif" id="m5" value="5">
			<label for="m5">Non-respect des caractéristique qu'on a énumérer dans la description de l'annonce</label>
			<br>
			<input type="radio" name="modif" id="m6" value="6">
			<label for="m6">Autres ....</label>
		</div>
		<h4>Information du client :</h4>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" name="nom" placeholder="Nom" class="form-control" required="">
				</div>		
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<input type="email" name="email" placeholder="Email" class="form-control" required="">
				</div>				
			</div>
		</div>

		<div class="form-group">
			<label for="text">Explications :</label>
			<textarea class="form-control" placeholder="Bien préciser  la nature de votre mécontentement..."
			name="explication" required="" id="text"></textarea>
		</div>

		<div class="form-group" align="center">
			<input type="submit" name="ok" class="btn btn-info btn-lg" value="Signaler" >
		</div>

	</form>

</div>
<?php require 'footer.php'; ?>
<style type="text/css">
	p,li{
		font-size: 18px;
	}
	h1{
		margin-bottom: 45px;
		text-decoration: underline;
	}
	h1:hover{
		color: skyblue;
		text-decoration: none;
	}
	h2{
		margin-bottom: 25px;
	}
	h2:hover{
		color: skyblue;
	}
	.container{
		
		margin-top: -80px;
		padding: 35px;
		
		border-radius: 15px;
	}
	label{
		font-size: 18px;

	}
	.btn {
		margin-top: 35px;
	}
	.form-control{
		margin:8px;
	}
</style>