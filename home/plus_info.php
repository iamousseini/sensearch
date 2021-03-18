<?php require 'homesecure.php'; ?>
<?php require 'header.php'; ?>
<?php require '../connexionDB.php'; ?>
<?php 

$sql = $bdd->query("SELECT * FROM type");

 ?>
<div class="container shadow p-3 mb-5 bg-white rounded">
	<div class="img" align="center">
		<img src="../images/logo.png" id="sn">
	</div>
	<div class="row">
		<div class="col-md-6 shadow-lg p-3 mb-5 bg-light rounded">
			<h2 align="center">Presentation</h2>
			<p align="center">
				Sensearch est un site d’annonce qui permet à ces utilisateurs de proposer leurs produits (neuf ou d’occasion) ainsi que leurs services via des annonces, elle leurs offre une visibilité sur le web sans pour autant créer de site e-commerce.	<br>
				Elle permet également à ces visiteurs, un accès total a tous les produit(neuf/occasion) et services propose par les utilisateurs de Sensearch qui joue ici le rôle de revendeur
				On a longuement réfléchi pour arrive à nous entendre sur ce projet. <br>

			</p>
			<h2 align="center">Objectif</h2>
			<p align="center">
				Notre objectif à travers Sensearch est de permettre aux gens d’acheter et de vendre des biens ou des services le plus facilement possible sans pour autant créer de site e-commerce.
				Nous n’intervenons pas lors de la vente entre A et B, nous jouons seulement le rôle d’interface ou d’intermédiaire entre le client et le vendeur.
				La mise en ligne des produits et services sur Sensearch sont totalement gratuites pour tous les utilisateurs. Notre rôle est de permettre la rencontre entre le client et son vendeur.

			</p>
			<h2 align="center">Produits et services </h2>
			<p align="center">Les différents produits ou services que vous pouvez retrouves sur notre site sont : </p>
			<ul class="list-group" id="ul">
				<li class="list-group-item active"><center>Types d'annonce</center></li>
				<?php 
					while ($data = $sql->fetch()) {
						echo "<li class='list-group-item'><center>" .$data['type_annonce']. "</center></li>";
					}
				 ?>
			</ul>
		</div>
		<div class="col-md-6 shadow-lg p-3 mb-5 bg-white rounded">
			<h2><center>Pourquoi utilise les sites d’annonces?</center></h2>
			<p>
				De nos jours, un site de e-commerce est un endroit où nous pouvons commander un article par carte bancaire et le recevoir quelques jours plus tard.  <br>
				Mais est-ce la meilleure solution pour développer son commerce en ligne lorsqu’on débute ?
				La réalisation de ce genre de site demande parfois de lourd effort financière et temporelle. Il faut trouve le bon développeur, attendre jusqu’à ce que ce dernier finisse le site …etc.
				Quel est la meilleure solution lorsqu’on débute ? <br>
				Le plus simple et le plus rentable serait de commencer par les sites d’annonce qui sont gratuits ou quasi-gratuits pour certains et qui sont facile a utiliser . <br> 
				C’est pour cela que Sensearch vous propose alors un espace dans lequel vous pouvez mettre et expose vos services et vos biens gratuitement 

			</p>
			<h2 align="center">Concepteurs</h2>
			<p align="center">
				Ce site a été conçu par trois etudiants de Supdeco :
				<ol>
					<li>Abdoulfatah Houssein</li>
					<li>Moustapha Diop</li>
					<li>Ousseini Adamou</li>
				</ol>
			</p>
			<h2>Users-Seller</h2>
			<p>
				Vous pouvez aussi vendre vos propre produits ici dans notre site. Sensearch vous propose de mettre en avant vos produit et ainsi augmenter votre visibilité . <br><br>
				
				<b>NB: Faite attention ! </b><br>
				Proposez un produit défectueux n'est pas tolerer chez nous. Vous serez definitivement banni de notre boutique. <br>
				Car cela va nuire a notre image et va donc faire baisser la confiance de notre clientele .
				S'il vous plait veuillez tenir compte de ces information . 
			</p>
			<h2 align="center">Resumer</h2>
			<p align="center">
				Pour résumer , le but de ce projet est la création d’un site d’annonce généraliste dans le but de faciliter les achats et les ventes .
 			</p>

		</div>
	</div>
</div>			
<?php require 'footer.php'; ?>
<style type="text/css">
	.container{
		border-radius: 20px;
	}
	/*Image*/
	#sn{
		width: 350px;
		margin-bottom: 50px;
		margin-top: 35px;
		border:1px;
		padding: 8px;/*
		border-radius: 12px;
		background-color: #395e71;*/
	}
	#ul{
		border-radius: 12px;
		border:1px;
	}

	h2:hover{
		color: red;
		text-decoration: underline;
	}
	p{
		margin-bottom: 20px;
	}
	
</style>