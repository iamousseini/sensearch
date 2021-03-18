<?php require 'head_user.php'; ?>
<?php require '../connexionDB.php'; ?>
<?php 

if (!empty($_GET['id'])) {
	$id = htmlspecialchars($_GET['id']);
}
else
{
	header("Location:message.php");
}
//Recupere tout les messages 

$sql = $bdd->prepare("SELECT * FROM message_client WHERE id = ?");
$sql->execute(array($id));
$data = $sql->fetch();

//Recuperer l'email et l'adresse de la boutique OPstore

$req = $bdd->prepare("SELECT email , adresse FROM inscription WHERE nom_boutique = ?");
$req->execute(array($data['nom_boutique']));
$rep = $req->fetch();

//On recupere le nom de l'annonce en question
$titres = $bdd->prepare("SELECT * FROM annonces WHERE id = ?");
$titres->execute(array($data['id_annonce']));
$titre = $titres->fetch();


 ?>
<div class="container bg-light shadow-lg p-3 mb-5 rounded">
	<div class="row">
		<div class="col-md-5">
			<ul class="list-group">
				<li class="list-group-item active"><center>Expéditeur</center></li>
				<li class="list-group-item"><center>Nom : <?php echo  $data['nom'] ?></center></li>
				<li class="list-group-item"><center>Email : <?php echo $data['email']; ?></center></li>
				<li class="list-group-item"><center>Adresse : <?php echo $data['adresse']; ?></center></li>
			</ul>
		</div>
		<div class="col-md-2">
			
		</div>
		<div class="col-md-5">
			<ul class="list-group">
				<li class="list-group-item active"><center>Destinataire</center></li>
				<li class="list-group-item"><center>Nom-Boutique : <?php echo $data['nom_boutique'];  ?></center></li>
				<li class="list-group-item"><center>Email : <?php echo $rep['email']; ?></center></li>
				<li class="list-group-item"><center>Adresse : <?php echo $rep['adresse']; ?></center></li>
			</ul>			
		</div>

	</div>
	<div class="row">
		<div class="col-md-12">
			<ul class="list-group">
				<li class="list-group-item active"><center>Message</center></li>
				<li class="list-group-item"><center><?php echo $data['message']; ?></center></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<ul class="list-group">
				<li class="list-group-item active"><center>Votre annonces</center></li>
				<li class="list-group-item"><?php echo $titre['titre_annonce']; ?></li>
			</ul>
		</div>
		<div class="col-md-4">
			
		</div>
		<div class="col-md-4">
			<ul class="list-group">
				<li class="list-group-item active"><center>Envoyer:</center></li>
				<li class="list-group-item"><center><?php echo $data['date']; ?></center></li>
			</ul>
		</div>
	</div>
</div>

<?php require '../home/footer.php'; ?>
<style type="text/css">
	.container{
		border-radius: 12px;
		padding: 20px;

	}
	.row
	{
		margin-bottom: 50px;
	}
</style>