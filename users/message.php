<?php require 'head_user.php'; ?>
<?php require '../connexionDB.php'; ?>

<?php 

$sql = $bdd->prepare("SELECT * FROM message_client WHERE nom_boutique = ? ORDER BY id DESC" );
$sql->execute(array($_SESSION['nom_boutique']));


 ?>
<div class="container bg-light shadow-lg p-3 mb-5 bg-white rounded text-dark">
	<h1 align="center" class="text-dark">Boite de reception</h1>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped  table-primary">
				
					<th>ID</th>
					<th>Nom</th>
					<th>Adresse</th>
					<th>Email</th>
					<th>Sujet</th>
					<th>Date</th>
					<th>Fonction</th>
			
		<?php while ($data = $sql->fetch()) {
				echo "<tr>";
					echo "<td>" .$data['id_annonce']. "</td>";
					echo "<td>" .$data['nom']. "</td>";
					echo "<td>" .$data['adresse']. "</td>";
					echo "<td>" .$data['email']. "</td>";
					echo "<td>" .$data['sujet']."</td>";
					echo "<td>" .$data['date']. "</td>";
					echo "<td>";
					echo "<a class='btn btn-primary' href='view_message.php?id=" .$data['id'] ."'>View</a>";
					echo "<a class='btn btn-danger' href='delete_message.php?id=" .$data['id'] ."'>delete</a>";
					echo "</td>";
		}



		  ?>
			</table>
		</div>
	</div>
</div>


<?php require '../home/footer.php'; ?>
<style type="text/css">
	.container{
		
		
	}
	.btn-primary{
		margin-right: 18px;

	}
	table{
		border-radius: 1px;
	}
</style>