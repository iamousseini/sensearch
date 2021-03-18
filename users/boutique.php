<?php 
require 'head_user.php';
require '../connexionDB.php';
 ?>
<?php 
// recuperer l'ensemble des annonces de la table annonces en se basant sur l'id

$sql = $bdd->prepare("SELECT * FROM annonces WHERE boutique = ? ORDER BY date_annonce DESC");
$sql->execute(array($_SESSION['id']));





 ?>
<div class="container bg-light shadow-lg p-3 mb-5 bg-white rounded" class="col-md-12">

	<h1 style="margin-bottom: 50px;" class="text-center">Bienvenue <?php echo $_SESSION['nom'] . " ". $_SESSION['prenom']; ?></h1>
	<p>Vous vous trouvez actuelement dans votre boutique electronique : <b><?php echo $_SESSION['nom_boutique'] ?></b></p>
	<p>C'est a partir de cette interface que vous pourrez gérer toutes vos annonces grace a de nombreuse fonctionnalites</p>
	<p>Ici vous pourrez : </p>
	<ul>
		<li class="list-item">Voire toutes vos annonces par ordre decroissant (Du plus recent au plus anciens)</li>
		<li class="list-item">Editer vos annonces/mise a jours (Changer ou modifier vos annonces)</li>
		<li class="list-item">Supprimer vos annonces</li>
	</ul>
	
	<table class="table table-striped ">
		<th class="bg-dark text-white">ID</th>
		<th class="bg-warning text-white">Annonce</th>
		<th class="bg-success text-white">Type</th>
		<th class="bg-secondary text-white">Prix</th>
		<th class="bg-danger text-white">Description</th>
		<th class="bg-info text-white">Date</th>
		<th class="bg-primary text-white">Action</th>

		<?php 

		while ($data = $sql->fetch()) {
			echo "<tr>";
				echo "<td>" . $data['id'] . "</td>";
				echo "<td>" . $data['titre_annonce'] . "</td>";
				echo "<td>" . $data['type_annonce'] . "</td>";
				echo "<td>" . $data['prix_annonce'] . "</td>";
				echo "<td>" . $data['description'] . "</td>";
				echo "<td>" . $data['date_annonce'] . "</td>";
				echo "<td>" ;
							echo '<a class="btn btn-primary" href="view.php?id='.$data['id'].'">Voir</a>';
							echo '<a class="btn btn-warning" href="edit.php?id='.$data['id'].'">Modifier</a>';
							echo '<a class="btn btn-danger" href="delete.php?id='.$data['id'].'">Vider</a>';
				echo "</td>";
			echo "</tr>";	
		}

			
		 ?>
	</table>	
</div>

 <?php require '../home/footer.php'; ?>
 <style type="text/css">
 	.list-item{
 		color :black;
 	}
 	p{
 		font-style: italic;
 		font-size: 18px;
 	}
 	.btn{
 		margin:2px;
 	}
 
 </style>