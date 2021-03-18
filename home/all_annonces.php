<?php require 'homesecure.php'; ?>
<?php require 'header.php'; ?>
<?php require '../connexionDB.php'; ?>
<?php 	
	$sql = $bdd->query("SELECT * FROM annonces ORDER BY date_annonce DESC");

	$all_count = $bdd->query("SELECT COUNT(*) FROM annonces ");
	$count = $all_count->fetch();
 ?>
<button onclick="topFunction()" id="myBtn" title=""><i class="fa fa-arrow-up" aria-hidden="true"></i>  </button>
<div class="container shadow bg-white rounded">
	
<h1 align="center" class="" style="color: #395f71;margin-bottom: 50px;">Dernières annonces </h1>

<button type="button" class="btn btn-success">
  Annonces disponibles <span class="badge badge-light"><?php echo $count[0]; ?></span>
</button>


<br><br>	
<?php

while ($data = $sql->fetch()) {

	$req = $bdd->prepare("SELECT nom_boutique FROM inscription WHERE id = ?");
	$req->execute(array($data['boutique']));
	$boutique = $req->fetch();

	echo "<div class='row annonces shadow-lg p-3 mb-5 bg-white rounded'>";
		echo "<div class='col-md-3'>";	
			echo '<img src="'.$data['img'].'" class = "size">';
		echo "</div>";
		echo "<div class='col-md-4'>";
			echo '<ul class="list-group">';
				echo '<li class="list-group-item list-group-item-primary">' . $data['titre_annonce']. '</li>';		
				echo '<li class="list-group-item list-group-item-primary">Prix : '.  $data['prix_annonce'] .' CFA</li>';
			echo '<li class="list-group-item list-group-item-primary">Boutique : '.  $boutique['nom_boutique'] .'</li>';
				echo '<li class="list-group-item list-group-item-primary">Publiée le : '.  $data['date_annonce'] .'</li>';
			echo '</ul>';
		echo "</div>";
		echo "<div class='col-md-5'>";
			echo '<div class="list-group">';
				echo '<button type="button" class="list-group-item list-group-item-action active">Description</button>';
				echo '<a href="#" class="list-group-item list-group-item-action">'.$data['description']. '!!!</a>';
			echo "</div>";
		echo "</div>";
		echo "<a href='voir_annonce.php?id=".$data['id']."' class='btn btn-danger btn-lg btn-block btnvoir' id = 'btn'> <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> Voir cette annonce </a>";
	echo "</div>";

}



?>
<a href=""></a>
</div>
<?php require 'footer.php'; ?>

<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

<style type="text/css">
	/*image annonce*/
	.size{
		width: 200px;
		height: 220px;
		border: 1px solid skyblue;
		border-radius: 8px;
	}
	/*Div principale*/
	.annonces{
		background: white;
		padding: 25px;
		border: 1px solid #395e71;
		margin-bottom: 45px;
	}
	.list-group-item-primary{
		padding : 12px;
		margin: 4px;
		border-radius: 8px;
	}
	.container{
		/*background: #395e70;*/
		/*
  		background: -webkit-linear-gradient(59deg, #3A6073, #16222A);
  		background: linear-gradient(59deg, #3A6073, #16222A);
  		*/
		border-radius: 12px;
		padding: 50px;
	}
	.btnvoir{
		margin-top: 30px;
	}/*
	span{
		font-size: 20px;
		color: white;
		font-style: italic;
		margin-bottom: 30px;
	}*/
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 25px;
  width: 100px;
  border: none;
  outline: none;
  background-color: gray;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}

</style>
