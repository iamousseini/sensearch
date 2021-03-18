<?php require '../connexionDB.php'; ?>
<?php 
		//Traitements
	
	// Recupere toutes les boutique qui se trouve dans la liste noire

		$black = $bdd->query("SELECT * FROM black_liste");

 ?>
 <?php require 'head_admin.php'; ?>
 <div class="container">
 	<div class="row">
 		<div class="col-md-12">
 			<h1 align="center">D&eacute;bloquer un boutique</h1>

 			<p align="center">
 				Vous pouvez à travers ce tableau d&eacute;bloquer  toutes les boutiques qui se trouve dans la liste noire. <br>
 				Pour d&eacute;bloquer une boutique , il faut que cette derni&egrave;re remplisse certaines conditions :
 				<br>	

 			</p>
 
 			<ul>
 				<li>Frais de dédommagement pour avoir nuit à la réputation de notre plateforme</li>
 				<li>Lettre d'excuse adressée <b><i>Sensearch</i></b> </li>
 				<li>Ne plus plus recommencer</li>
 			</ul>

 			<p>
 				Une fois ces trois conditions respect&eacute; , vous pouvez desormais d&eacute;bloquer la boutique .<br>
 				Et par consequent , elle sera de nouveau accessible et le g&eacute;rant pour y acceder tranquillement .
 				<br>
 			</p>


 			<h2>Liste des boutiques dans la BlackList</h2>
 				<table class="table table-striped table-dark">
 					<th><center>G&eacute;rant</center></th>
 					<th><center>Boutique</center></th>
 					<th><center>Email</center></th>
 					<th><center>T&eacute;lephone</center></th>
 					<th><center>White-List</center></th>

 					<!--Recuperer toute boutique-->

 					<?php 

 						while ($data = $black->fetch()) {
 								
 							$stores = $bdd->prepare("SELECT * FROM inscription WHERE id = ?");	
 							$stores->execute(array($data['boutique']));
 							$store = $stores->fetch();

 								echo "<tr>";
 									echo "<td><center>" . $store['nom'] . " " .$store['prenom'] . "</center></td>";
 									echo "<td><center>" . $store['nom_boutique']  . "</center></td>";
 									echo "<td><center>" . $store['email']  . "</center></td>";
 									echo "<td><center>" . $store['telephone']  . "</center></td>";
 									echo "<td><center>";
 										echo "<a href='unblock.php?id=" . $store['id'] . "' class='btn btn-success' >D&eacute;bloquer</a>";
 									echo "</center></td>";
 								echo "<tr>";
 							}	


 					 ?>
 				</table>	
	
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
	h1,h2,h3,p,li{
		color: white;
	}
	li{
		font-size: 18px;
		margin:10px;
	}
	p{
		font-size: 18px;
		margin-bottom: 45px;
		margin-top: 35px;
	}
	h1{
		margin-bottom: 55px;
	}
	h2{
		margin-bottom: 35px;
	}
	body{
	background-image: url('../images/admin_bckgrd.gif');
	
}

 </style>