<?php 
//Verfication id :
if (!empty($_GET['id'])) {
	$id = htmlspecialchars($_GET['id']);
}
else{
	header("Location:all_annonces.php");
}
 ?>

<?php require 'homesecure.php'; ?>
<?php require 'header.php'; ?>
<?php require '../connexionDB.php'; ?>
<?php 

//Recuperer les annonces avec type =?
$types = $bdd->prepare("SELECT * FROM annonces WHERE type_annonce = ? ORDER BY id DESC");
$types->execute(array($id));
//Recuperer le type :
$type_annonce = $bdd->prepare("SELECT * FROM type WHERE id = ?");
$type_annonce->execute(array($id));
$type = $type_annonce->fetch();

	$all_count = $bdd->prepare("SELECT COUNT(*) FROM annonces WHERE type_annonce = ?");
	$all_count->execute(array($id));
	$count = $all_count->fetch();
?>
<div class="container">
<h1 align="center" style="color: white;margin-bottom: 50px;"><?php  echo $type['type_annonce']; ?></h1>
<button type="button" class="btn btn-success">
  Annonces disponibles <span class="badge badge-light"><?php echo $count[0]; ?></span>

</button>
<br>	<br>	
<?php 
while ($data = $types->fetch()) {

	$req = $bdd->prepare("SELECT nom_boutique FROM inscription WHERE id = ?");
	$req->execute(array($data['boutique']));
	$boutique = $req->fetch();

	echo "<div class='row annonces'>";
		echo "<div class='col-md-3'>";	
			echo '<img src="'.$data['img'].'" class = "size">';
		echo "</div>";
		echo "<div class='col-md-4'>";
			echo '<ul class="list-group">';
				echo '<li class="list-group-item list-group-item-primary">' . $data['titre_annonce']. '</li>';		
				echo '<li class="list-group-item list-group-item-primary">Prix : '.  $data['prix_annonce'] .' CFA</li>';
			echo '<li class="list-group-item list-group-item-primary">Boutique : '.  $boutique['nom_boutique'] .'</li>';
				echo '<li class="list-group-item list-group-item-primary">Publiée le : '. $data['date_annonce'] .'</li>';
			echo '</ul>';
		echo "</div>";
		echo "<div class='col-md-5'>";
			echo '<div class="list-group">';
				echo '<button type="button" class="list-group-item list-group-item-action active">Description</button>';
				echo '<a href="#" class="list-group-item list-group-item-action">'.$data['description']. '!!!</a>';
			echo "</div>";
		echo "</div>";
		echo "<a href='voir_annonce.php?id=".$data['id']."' class='btn btn-danger btn-lg btn-block' id = 'btn'><i class=\"fa fa-eye\" aria-hidden=\"true\"></i> Voir cette annonce </a>";
	echo "</div>";

}

 ?>

	
</div>
<?php require 'footer.php'; ?>
<style type="text/css">
	/*image annonce*/
	.size{
		width: 200px;
		height: 220px;
		border: 2px solid skyblue;
		border-radius: 8px;
	}
	/*Div principale*/
	.annonces{
		background: white;
		padding: 25px;
		border: 2px solid white;
		border-radius: 12px;
		margin-bottom: 45px;
	}
	.list-group-item-primary{
		padding : 12px;
		margin: 4px;
		border-radius: 8px;
	}
	.container{
		background: #395e70;
		border-radius: 12px;
		padding: 50px;
	}
	#btn{
		margin-top: 30px;
	}

</style>