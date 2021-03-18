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
if (isset($_POST['delete'])) {

	$sql = $bdd->prepare("DELETE FROM message_client WHERE id = ?");
	$sql->execute(array($id));
	header("Location:message.php");
}


 ?>
<div class="container bg-warnig">
	<div class="alert alert-warning">
		<h1 align="center">Supprimer ce message </h1>
		<h5 align="center">La suppressionn de ce message est irreversible , une fois supprimer il vous sera impossible de le relire.</h5>
		<h5 align="center">Êtes-vous sûre de vouloir supprimer ce message ???</h5>
			<form method="POST">
				<div class="row button">
					<div class="col-md-6"><input type="submit" name="delete" value="Supprimer" class="btn btn-danger btn-block"></div>
					<div class="col-md-6"><a href="message.php" class="btn btn-primary btn-block">Annuler</a></div>
				</div>
			</form>	
	</div>

</div>

<?php require '../home/footer.php'; ?>
<style type="text/css">
	.container{
		padding: 25px;
		border-radius: 18px;
		
	}
	h1{
		margin-bottom: 20px;
		font-weight: bold;
		text-decoration: underline;
	}
	.button{
		margin-top: 20px;
	}
</style>