<?php require 'head_user.php'; ?>
<?php require '../connexionDB.php'; ?>
<?php 

function test($data){
	trim($data);
	stripcslashes($data);
	htmlspecialchars($data);
	return $data;
}

if (!empty($_GET['id'])) {
		
	$id = test($_GET['id']);

}
else{
	header("Location:boutique.php");
}
if (isset($_POST['delete'])) {
	
	$sql = $bdd->prepare("DELETE FROM annonces WHERE id = ?");
	$sql->execute(array($id));
	header("Location:boutique.php");
}

?>



	<div class="container">
			<div class="alert alert-warning" >
				<h1>Supprimer cette annonce</h1>
				<p>Vous pourrez supprimer cette annonce si vous le voulez .</p>
				<p style="margin-bottom: 25px">Si vous le faite l'annonce sera définitivement supprimer de votre base de donnees. <br>Et il vous sera impossible de le recupere.</p>
				<form method="POST">
				<input type="submit" name="delete" class="alert alert-danger" value="Supprimer">
				<a href="boutique.php" class="alert alert-primary"><= Retour</a>						
				</form>			
			</div>
	</div>

<?php require '../home/footer.php'; ?>
<style type="text/css">
	a:hover{
		text-decoration: none;
	}
	a{
		margin-bottom: 20px;
	}
	.alert-warning{
		padding: 50px;
		border:2px black solid;
		border-radius: 12px;
	}
</style>