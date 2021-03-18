<?php require '../connexionDB.php'; ?>

<?php require 'head_admin.php'; ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 align="center">Sanctionner une boutique</h1>
			<p align="center">
				Si vous avez décidé de sanctionner une boutique , c'est que cette dernière a atteint les limites des avertissements .<br>
				Cette boutique n'a pas respecter les regles d'utilisation mis en place par sensearch qui consiste à toujours satisfaire le client . <br>
				La sanction consiste à mettre la boutique (compte utilisateur) sur dans une black-list pour une durée indéterminée .<br>
				Une fois dans cette liste noire , la boutique sera bloqué et le g&eacute;rant de la boutique n'aura pas acc&eacute;s à son interface utilisateur.
			</p>
			<h2>Boutiques avec des avertissements</h2>

			<?php 
			
				echo "<table class = 'table table-striped table-dark'>";
					echo "<th><center>G&eacute;rant</center></th>";
					echo "<th><center>Boutiques</center></th>";
					echo "<th><center>NB:Avertissement</center></th>";
					echo "<th><center>Date/Heure</center></th>";
					echo "<th><center>black-list</center></th>";

			$avertissement = $bdd->query("SELECT * , count(avertissement) AS av FROM avertissement GROUP BY boutique");

					while ($data = $avertissement->fetch()) {

						$store = $bdd->prepare("SELECT * FROM inscription WHERE id = ?");
						$store->execute(array($data['boutique']));
						$boutique = $store->fetch();

						echo "<tr>";
							echo "<td><center>" . $boutique['nom'] . " " . $boutique['prenom'] . "</center></td>";
							echo "<td><center>" . $boutique['nom_boutique'] . "</center></td>";
							echo "<td><center>" . $data['av'] . "</center></td>";
							echo "<td><center>" . $data['date'] . "</center></td>";
							echo "<td><center>";
								echo "<a href = 'block_boutique.php?id=". $boutique['id'] . "' class= 'btn btn-danger'>Bloquer</a>" ;
							echo "</center></td>";
						echo "</tr>";
					}

					

			echo "</table>";		
			 ?>

		
		</div>
	</div>
</div>
<style type="text/css">
	.col-md-12{
		margin-left: 150px;
		margin-top: 50px;
		margin-bottom: 50px;
		padding: 50px;
		border-radius: 15px;
		background: #16222A;
		background: -webkit-linear-gradient(59deg, #3A6073, #16222A);
  		background: linear-gradient(59deg, #3A6073, #16222A);
	}
	h1,h2,h3,p{
		color: white;
	}
	p{
		font-size: 18px;
		margin-top: 50px;
		margin-bottom: 50px;
	}
	h2{
		margin-bottom: 30px;
	}
body{
	background-image: url('../images/admin_bckgrd.gif');
	
}

</style>