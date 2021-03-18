<?php require '../connexionDB.php'; ?>
<?php 

if (isset($_POST['ok']) && !empty($_POST['description']) && !empty($_POST['avertissement']) && !empty("boutique")) {
	
	$description     = htmlspecialchars($_POST['description']);
	$avertissement   = htmlspecialchars($_POST['avertissement']);
	$boutique        = htmlspecialchars($_POST['boutique']);

	$sql = $bdd->prepare("INSERT INTO avertissement(avertissement , boutique , description) VALUES(?,?,?)");
	$sql->execute(array($avertissement, $boutique , $description));
	header("Location:./accueil.php");
}

 ?>
<?php require 'head_admin.php'; ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 align="center">Avertir une boutique</h1>
			<form method="POST">
				<h2>Formulaire de contact</h2>
				<p>
					Chaque boutique a droit &agrave; plusieurs chances (3 pour être plus precis) 
					et un avertissement equivaut &agrave; 5 plaintes ou signalisation. <br>
					Chaque fois qu'une boutique atteint les 5 plaintes , on envoie le premier avertissement et  ainsi de suite. <br>
					Si la boutique atteint les 15 plaintes (qui equivaut &agrave; 3 avertissements) , cette derni&egrave;re sera bloqu&eacute; pour une durée indéterminée <br>
					
				</p>
				<div class="form-group">
					<label>Choisir l'avertissement:</label>
					<select class="form-control" name="avertissement">
						<option value="1" selected="">1er Avertissement</option>
						<option value="2">2er Avertissement</option>
						<option value="3">3er Avertissement</option>
					</select>

					<label>Choissir la boutique :</label>
					<select class="form-control" name="boutique">
						<?php 

							$sql = $bdd->query("SELECT id,nom_boutique FROM inscription");
							while ($data = $sql->fetch()) {
								echo "<option value='" . $data['id'] . "' > " .$data['nom_boutique'] . "</option>";
							}

						 ?>
					</select>

					<label>Message : </label>
						<textarea class="form-control" placeholder="Information supplementaires ...." required="" name="description"></textarea>	

					<div align="center" style="margin-top: 50px;">
						<input type="submit" name="ok" class="btn btn-info btn-lg" value="Envoyer l'avertissement">
					</div>					

				</div>	



			</form>
		</div>
	</div>
</div>

<style type="text/css">
	.col-md-12{
		margin-left:150px;
		margin-top: 50px; 
		margin-bottom: 50px;
		padding: 50px;
		border-radius: 15px;
		background: #16222A;
		background: -webkit-linear-gradient(59deg, #3A6073, #16222A);
  		background: linear-gradient(59deg, #3A6073, #16222A);
	}
	h1,h2{
		color: white;
		margin-bottom: 30px;
	}
	p{
		color: white;
		font-size: 18px;
		margin-bottom: 30px;
	}
	.form-group{
	
		padding: 50px;
	}
	.form-control{
		margin-bottom: 30px;
		border-radius: 18px;
	}
	label{
		color: white;
		font-size: 17px;
		font-style: italic;
	}

	body{
	background-image: url('../images/admin_bckgrd.gif');
	
}

</style>
