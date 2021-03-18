<?php require 'head_admin.php'; ?>
<?php require '../connexionDB.php'; ?>
<?php 
//Recuperer la liste de toutes les boutiques
$sql = $bdd->query("SELECT * FROM inscription ORDER BY date_inscription DESC");


 ?>

<div class="col-md-12  shadow p-3 mb-5 bg-white rounded text-white">

	<h1 align="center">Liste des boutiques presentes</h1>

	<!--Tableau-->

	<table class="table table-striped table-dark">
		<th><center>Nom-Boutique</center></th>
		<th><center>Email</center></th>
		<th><center>Telephone</center></th>
		<th><center>Adresse</center></th>
		<th><center>Statut</center></th>
		<th><center>Proprietaire</center></th>
		<th><center>Aperçu</center></th>


<?php 
	
while ($data = $sql->fetch()) {

	$statuts = $bdd->prepare("SELECT * FROM statut WHERE id = ?");
	$statuts->execute(array($data['statut']));
	$statut = $statuts->fetch();

			echo "<tr>";
				echo "<td>" . $data['nom_boutique'] . "</td>";
				echo "<td>" . $data['email'] . "</td>";
				echo "<td>" . $data['telephone'] . "</td>";
				echo "<td>" . $data['adresse'] . "</td>";
				echo "<td>" . $statut['statut'] . "</td>";
				echo "<td>" . $data['nom'] ." ".$data['prenom'] . "</td>";
				echo "<td>" ;
							echo '<a class="btn btn-primary" href="voir_boutique.php?id='.$data['id'].'">Voir</a>';
				echo "</td>";
			echo "</tr>";	
}	

	

 ?>		
	</table>

</div>

</div><!--row-->
</div><!--container-->

<style type="text/css">
h1{
	margin-top: 50px;
	margin-bottom: 50px;
	color: white;
}
h1:hover{
	color: skyblue;
	text-decoration: underline;
}
.col-md-12{
	padding: 20px;
	margin-left: 150px;
	margin-top: 50px;
	background: #16222A;
	background: -webkit-linear-gradient(59deg, #3A6073, #16222A);
  	background: linear-gradient(59deg, #3A6073, #16222A);

  	border-radius: 15px;

}
th:hover{
	color: blue;
	text-decoration: underline;
}
body{
	background-image: url('../images/admin_bckgrd.gif');
	
}

</style>