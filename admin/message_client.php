<?php require '../connexionDB.php'; ?>
<?php 
//Traitements
$sql 	= $bdd->query("SELECT * FROM signaler ORDER BY date_signaler DESC");
$motifs = $bdd->query("SELECT * FROM motif")


 ?>
<?php require 'head_admin.php'; ?>
<div class="col-md-12">
	<h1 align="center">Plaintes des clients</h1>
	<div class="alert alert-info">
		<h2>Liste des motifs de plainte</h2>
		<ol>
			<?php 

			while ($motif = $motifs->fetch()) {
				echo "<li>" .$motif['motif']. "</li>";
			}

			 ?>
		</ol>
	</div>	
	<table class="table table-dark">
		<th>Nom</th>
		<th>Email</th>
		<th>Boutique</th>
		<th>Motif</th>
		<th>Date/Heure</th>
		<th>Voir</th>
		<?php 

			while ($data = $sql->fetch()) {
				//Recuperer le nom de la boutique
				$boutiques = $bdd->prepare("SELECT * FROM inscription WHERE id = ?");
				$boutiques->execute(array($data['boutique']));
				$boutique = $boutiques->fetch();

				echo "<tr>";
					echo "<td>" . $data['nom'] . "</td>";
					echo "<td>" . $data['email'] . "</td>";
					echo "<td>" . $boutique['nom_boutique'] . "</td>";
					echo "<td>" . $data['motif'] . "</td>";
					echo "<td>" . $data['date_signaler'] . "</td>";
					echo "<td>" ;
						echo "<a class= 'btn btn-info' href='voir_plainte.php?id=" . $data['id'] . "' >voir</a>";
					echo "</td>";
				echo "</tr>";
			}

		 ?>
	</table>
</div>
</div><!--row-->
</div><!--container-->
<style type="text/css">
	.col-md-12{
		margin-left: 150px;
		margin-top: 50px;
		border-radius: 15px;
		padding: 20px;
		background: #16222A;
		background: -webkit-linear-gradient(59deg, #3A6073, #16222A);
  		background: linear-gradient(59deg, #3A6073, #16222A);
	}
	h1{
		margin-top: 35px;
		margin-bottom: 35px;
		color: white;
		text-decoration: none;
	}
	h1:hover{
		color: skyblue;
		text-decoration: underline;
	}
	table{
		margin-top: 50px;
	}
	.alert{
		border:2px white double;
		border-radius: 15px;
		padding: 20px;
	}
	body{
	background-image: url('../images/admin_bckgrd.gif');
	
}

</style>