<?php 

if (!empty($_GET['id'])) {
	$id = htmlspecialchars($_GET['id']);
}
else{
	header("Location:./message_client.php");
}

?>
 <?php require '../connexionDB.php'; ?>
 <?php 
//Traitements

 $messages = $bdd->prepare("SELECT * FROM signaler WHERE id = ?");
 $messages->execute(array($id));
 $message  = $messages->fetch();

 $boutiques = $bdd->prepare("SELECT nom_boutique FROM inscription WHERE id = ?");
 $boutiques->execute(array($message['boutique']));
 $boutique = $boutiques->fetch();

 $motifs = $bdd->prepare("SELECT motif FROM motif WHERE id = ?");
 $motifs->execute(array($message['motif']));
 $motif = $motifs->fetch();

  ?>
  <?php require 'head_admin.php'; ?>
  <div class="container">
  	<div class="row">
  <div class="col-md-12">
  	<h1 align="center">Message de <?php echo $message['nom']; ?> pour <?php echo  $boutique['nom_boutique'] ?> </h1>

 		 	<div class="card" style="margin-bottom: 50px;">
				<div class="card-header">
				    <center>Motif de la plainte: << <b><?php echo $motif['motif']; ?></b> >></center>
				</div>
				<div class="card-body">
				    <blockquote class="blockquote mb-0">
				      <p align="center"><?php echo $message['explication']; ?></p>
				      <footer class="blockquote-footer">By <cite title="Source Title"><?php echo $message['email']; ?> : <?php echo $message['date_signaler']; ?></cite></footer>
				      </blockquote>
				</div>
			</div>


			<a href="message_client.php" class="btn btn-info btn-block"> <= Revenir en arri&egrave;re</a>
			

  </div>
</div><!--row--->
</div><!--container--->
<style type="text/css">
	.col-md-12{
		margin-left:150px;
		margin-top: 50px; 
		padding: 50px;
		border: black double 2px;
		border-radius: 15px;
		background: #16222A;
		background: -webkit-linear-gradient(59deg, #3A6073, #16222A);
  		background: linear-gradient(59deg, #3A6073, #16222A);
	}

	h1{
		margin-top: -30px;
		margin-bottom: 50px;
		color: white;
	}
	body{
	background-image: url('../images/admin_bckgrd.gif');
	
}
</style>