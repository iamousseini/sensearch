<?php require '../connexionDB.php'; ?>
<?php require 'head_user.php'; ?>
<?php 
//Traitement
$sql = $bdd->prepare("SELECT * FROM avertissement WHERE boutique = ?");
$sql->execute(array($_SESSION['id']));	


?>


<div class="container shadow p-3 mb-5 bg-white rounded text-dark" >
	<div class="row">
		<div class="col-md-12 centre">
			<h1 align="center">Avertissement de Sensearch</h1>
			<p>
				Cette interface est tres importantes ,elle vous prévient en temps réel des avertissements de sensearch .
				<br>
				Si vous avez 3 avertissemnents , votre boutique sera bloqu&eacute; pour une durée indéterminée ou pire encore . <br>
				<b>D'ou viennent les avertissements ?</b> C'est principalement à cause de des plaintes des clients de votre boutique. <br>
				<b>Comment eviter les avertissemnents ?</b> C'est assez simple , il vous suffit  de :
				<ul>
					<li>De proposer des produits/services de qualit&eacute;s</li>
					<li>Respecter les clients lors des contact (appel/email)</li>
					<li>Etre tr&eacute;s disponible</li>
					<li>Etc ....</li>
				</ul>
			</p>
			<p>
				Si vous ne respecter pas ces r&eacute;gles , les avertissements vont pleuvoir et &agrave; partir du 3e avertissement vous serrez bloqu&eacute; . 
			</p>
			<?php 

				while ($alert = $sql->fetch()) {

					$boutiques = $bdd->prepare("SELECT nom_boutique FROM inscription WHERE id = ?");
					$boutiques->execute(array($_SESSION['id']));
					$boutique  = $boutiques->fetch(); 

					echo "<div class='alert alert-danger'>";
						echo "<center> Avertissement : ". $alert['avertissement'] . "</center>"  . "<br>";
						echo "Boutique : " . $boutique['nom_boutique'] . "<br>";
						echo "Description : " . $alert['description'] . "<br>";
						echo "Date/Heure : " . $alert['date'];
					echo "</div>";
					
				}

			 ?>

		</div>
	</div>
</div>

<?php require '../home/footer.php'; ?>
<style type="text/css">
	p,li {
		font-size: 18px;
	}
	.centre{
		background: white;
		padding: 50px;
		border-radius: 18px;
	}
	.alert{
		border-radius: 15px;
		border:2px double pink;
		padding: 20px;
		margin-bottom: 30px;
	}
	h1{
		margin-bottom: 50px;
	}
</style>