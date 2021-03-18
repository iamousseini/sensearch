<?php 
require 'head_user.php';
require '../connexionDB.php';

?>
<?php 
// requetes sql :
	
	$villes = $bdd->prepare("SELECT * FROM ville WHERE id = ?");
	$villes->execute(array($_SESSION['ville']));
	$ville = $villes->fetch();
	$_SESSION['n_ville'] = $ville['ville'];

	$statuts = $bdd->prepare("SELECT * FROM statut WHERE id = ?");
	$statuts->execute(array($_SESSION['statut']));
	$statut = $statuts->fetch();
	$_SESSION['n_statut'] = $statut['statut'];


	// print_r($ville);

	// print_r($statut);

 ?>

<div class="container bg-light shadow-lg p-3 mb-5 bg-white rounded">
			<h2 class="text-center" style="margin-bottom: 45px;">Mon profil</h2>
			
			<hr>
	<div class="row" style="margin-top: 25px;">
		<div class="col-md-6">

			<table class="table table-striped table-light shadow p-3 mb-5 bg-white rounded">
				<th>Nom</th>
				<th>Prenom</th>
				<th>Email</th>
				<th>Telephone</th>

				<tr class="bg-light">
					<td><?php echo $_SESSION['nom']; ?></td>
					<td><?php echo $_SESSION['prenom']; ?></td>
					<td><?php echo $_SESSION['email']; ?></td>
					<td><?php echo $_SESSION['telephone']; ?></td>
				</tr>
			</table>

		</div>	

		<div class="col-md-6">
			<table class="table table-striped table-light shadow p-3 mb-5 bg-white rounded">
				<th>Password</th>
				<th>Boutique</th>
				<th>Adresse</th>
				<th>Ville</th>

				<tr>
					<td><?php echo $_SESSION['password']; ?></td>
					<th><?php echo $_SESSION['nom_boutique']; ?></th>
					<th><?php echo $_SESSION['adresse']; ?></th>
					<th><?php echo $ville['ville']?></th>
				</tr>
			</table>
		</div>	

	</div>

	<div class="row" align="center">
		<div class="col-md-12" align="center">
			<table class="table table-striped table-light shadow p-3 mb-5 bg-white rounded">
				<th>Statut</th>
				<th>Date d'inscription</th>

				<tr>
					<td><?php echo $statut['statut']; ?></td>
					<td><?php echo $_SESSION['date_inscription']; ?></td>
				</tr>
			</table>
		</div>
</div>
<div class="row">
	<div class="col-md-12">
			<table class="table table-striped table-light shadow p-3 mb-5 bg-white rounded">
				<th>Information sur la boutique</th>

				<tr>
					<td><?php echo $_SESSION['info_boutique']; ?></td>
				</tr>
			</table>
		</div>
	</div>
</div>




<?php require'../home/footer.php' ?>
<style type="text/css">
.container
	{
		margin-top: 50px;
		margin-bottom: 80px;
		padding: 25px;
		

 		border-width: 0.5px;
  		border-radius: 12px;
	}
	tr td{
		color: black;
	}

</style>