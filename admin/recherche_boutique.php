<?php 
require '../connexionDB.php';
//Recuperer les mots-clefs saisies
if (isset($_GET['ok']) && !empty($_GET['search'])) {
	
	$search = htmlspecialchars($_GET['search']);

	//scinder une chaine de caractere en segment (tableau) : explode

	$words = explode(" ", $search);

	//Recuperer la taille

	$size = count($words);

	if ($size == 1) {
		
		$sql = $bdd->query("SELECT * FROM inscription WHERE nom_boutique LIKE '$words[0]%' ");
	}
	elseif ($size == 2) {

		$sql = $bdd->query("SELECT * FROM inscription WHERE 
			nom_boutique LIKE '$words[0]%' AND 
			nom_boutique LIKE '$words[1]%' ");
	}
	elseif ($size == 3) {
		
			$sql = $bdd->query("SELECT * FROM inscription WHERE 
			nom_boutique LIKE '$words[0]%' AND 
			nom_boutique LIKE '$words[1]%' AND
			nom_boutique LIKE '$words[2]%'
			 ");
	}
	elseif ($size == 4) {
			$sql = $bdd->query("SELECT * FROM inscription WHERE 
			nom_boutique LIKE '$words[0]%' AND 
			nom_boutique LIKE '$words[1]%' AND
			nom_boutique LIKE '$words[2]%' AND
			nom_boutique LIKE '$words[3]%'

			 ");		
	}
	elseif ($size == 5) {
			$sql = $bdd->query("SELECT * FROM inscription WHERE 
			nom_boutique LIKE '$words[0]%' AND 
			nom_boutique LIKE '$words[1]%' AND
			nom_boutique LIKE '$words[2]%' AND
			nom_boutique LIKE '$words[3]%' AND
			nom_boutique LIKE '$words[4]%'


			 ");		
	}
	else
	{
		$sql = $bdd->query("SELECT * FROM inscription WHERE nom_boutique LIKE '$words[0]%' ");
	}


	
	
	


}


?>
<?php require 'head_admin.php'; ?>
<div class="col-md-12">
<div class="recherche">
	<h1 align="center">Rechercher une boutique</h1>
	<p align="center">Utiliser des mots clefs pour retrouver le nom d'une boutique .</p>	

	<form method="GET">
		<div class="row">
			<div class="col-md-9">
				<div class="form-group">
					<input type="search" name="search" placeholder="Nom de la boutique ...." class="form-control" required="">
				</div>
			</div>
			<div class="col-md-3">
				<input type="submit" name="ok" class="btn btn-info" >
			</div>
		
<?php 

	if (isset($_GET['ok']) && !empty($_GET['search'])) {
		if ($sql->rowCount() > 0) {
            echo "<span>". $sql->rowCount() . " Résultat(s) </span> <br>";
            
            echo "<table class='table table-dark'>";
            		echo "<th><center>Nom-Boutique</center></th>";
            		echo "<th><center>Email</center></th>";
            		echo "<th><center>Telephone</center></th>";
            		echo "<th><center>Adresse</center></th>";
            		echo "<th><center>Statut</center></th>";
            		echo "<th><center>Proprietaire</center></th>";
            		echo "<th><center>Aperçu</center></th>";
			while ($data = $sql->fetch()) 
			{
            //Debut des annonces
					$statuts = $bdd->prepare("SELECT * FROM statut WHERE id = ?");
					$statuts->execute(array($data['statut']));
					$statut = $statuts->fetch();

					//rows
					echo "<tr>";
						echo "<td>" .  $data['nom_boutique'] . "</td>";
						echo "<td>" .  $data['email'] . "</td>";
						echo "<td>" .  $data['telephone'] . "</td>";
						echo "<td>" .  $data['adresse'] . "</td>";
						echo "<td>" .  $statut['statut'] . "</td>";
						echo "<td>" .  $data['nom'] ." ".$data['prenom'] . "</td>";
						echo "<td>";
							echo '<a class="btn btn-primary" href="voir_boutique.php?id='.$data['id'].'">Voir</a>';
						echo "</td>";
					echo "</tr>";
				
                    
			}

									

			}//rowcount()>0

									else{

										echo"<div class = 'alert alert-danger'>Recherche introuvable";

										echo "Mot(s) clé(s) utiliser :";
										echo "<ul>";
										foreach ($words as $key => $value) {
											echo "<li>".$value."</li>";
										}
										echo "</ul>";
										echo "</div>";
									}
			}

						 	?>
			</table>
		</div>
	</form>
</div>



</div>
</div>
</div>
<style type="text/css">
	.alert{
		margin-left: 40px;
		border-radius: 10px;
	}
	p{
		font-size: 20px;
		color: white;
	}
	h1{
		margin-top: 35px;
		margin-bottom: 20px;
		color: white;
	}
	.recherche{
		border-radius: 12px;
		padding: 30px;
		margin-top: 20px;
		background: #16222A;
		background: -webkit-linear-gradient(59deg, #3A6073, #16222A);
  		background: linear-gradient(59deg, #3A6073, #16222A);
	}
	td{
		color: white;

	}
	th{
		color: white;
	}
	span{
		color: white;
		margin-left: 20px;
		margin-bottom: 25px;
		text-decoration: underline;
	}
	table{
		padding: 25px;
	}
	.col-md-12{
		margin-left: 150px;
		padding:10px; 
	}
	body{
	background-image: url('../images/admin_bckgrd.gif');
	
}

</style>