<?php require 'homesecure.php'; ?>
<?php require 'header.php'; ?>
<?php require '../connexionDB.php'; ?>
<?php 
//Recuperer les mots-clefs saisies
if (isset($_GET['ok']) && !empty($_GET['search'])) {
	
	$search = htmlspecialchars($_GET['search']);

	//scinder une chaine de caractere en segment (tableau) : explode

	$words = explode(" ", $search);

	//Recuperer la taille

	$size = count($words);

	if ($size == 1) {
		
		$sql = $bdd->query("SELECT * FROM annonces WHERE titre_annonce LIKE '%$words[0]%' ");
	}
	elseif ($size == 2) {

		$sql = $bdd->query("SELECT * FROM annonces WHERE 
			titre_annonce LIKE '%$words[0]%' AND 
			titre_annonce LIKE '%$words[1]%' ");
	}
	elseif ($size == 3) {
		
			$sql = $bdd->query("SELECT * FROM annonces WHERE 
			titre_annonce LIKE '%$words[0]%' AND 
			titre_annonce LIKE '%$words[1]%' AND
			titre_annonce LIKE '%$words[2]%'
			 ");
	}
	elseif ($size == 4) {
			$sql = $bdd->query("SELECT * FROM annonces WHERE 
			titre_annonce LIKE '%$words[0]%' AND 
			titre_annonce LIKE '%$words[1]%' AND
			titre_annonce LIKE '%$words[2]%' AND
			titre_annonce LIKE '%$words[3]%'

			 ");		
	}
	elseif ($size == 5) {
			$sql = $bdd->query("SELECT * FROM annonces WHERE 
			titre_annonce LIKE '%$words[0]%' AND 
			titre_annonce LIKE '%$words[1]%' AND
			titre_annonce LIKE '%$words[2]%' AND
			titre_annonce LIKE '%$words[3]%' AND
			titre_annonce LIKE '%$words[4]%'


			 ");		
	}
	else
	{
		$sql = $bdd->query("SELECT * FROM annonces WHERE titre_annonce LIKE '%$words[0]%' ");
	}


	
	
	


}


 ?>
<div class="container text-white shadow-lg  bg- rounded text-center">
    <div id="img" align="center">
            <img src="../images/logo.png" id="sen" class="bg-light">
        </div>
	<h1>Recherche</h1>
	<p>
		Veuillez saisir des mots clés pour rechercher une annonce.
	</p>
	
	<form method="GET" class="text-center">
		<div class="row">
			<div class="col-md-10">
				<div class="form-group">
					<input type="search" name="search" class="form-control" placeholder="Que cherhez-vous ?">
				</div>
			</div>		
			<div class="col-md-1">
				<input type="submit" name="ok" class="btn btn-danger ">
			</div>
		</div>
				
		
						
<?php 

	if (isset($_GET['ok']) && !empty($_GET['search'])) {
		if ($sql->rowCount() > 0) {
            echo "<span>". $sql->rowCount() . " Résultat(s) </span> <br>";
			while ($data = $sql->fetch()) {
            //Debut des annonces
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
                    				echo '<li class="list-group-item list-group-item-primary">Publiée le :'. $data['date_annonce'] .'</li>';
                    			echo '</ul>';
                    		echo "</div>";
                    		echo "<div class='col-md-5'>";
                    			echo '<div class="list-group">';
                    				echo '<button type="button" class="list-group-item list-group-item-action active">Description</button>';
                    				echo '<a href="#" class="list-group-item list-group-item-action">'.$data['description']. '!!!</a>';
                    			echo "</div>";
                    		echo "</div>";
                    		echo "<a href='voir_annonce.php?id=".$data['id']."' class='btn btn-danger btn-lg btn-block' id = 'btn'>Voir cette annonce </a>";
                    	echo "</div>";
						//Fin desannonces	
										}
									}

									else{

										echo"<div class = 'alert alert-danger'>Recherche introuvable<div>";

										echo "Mot(s) clé(s) utiliser :";
										echo "<ul>";
										foreach ($words as $key => $value) {
											echo "<li>".$value."</li>";
										}
										echo "</ul>";
									}
			}

						 	?>

				
	</div>		

	
		
			
	</form>
</div>
<br><br>	
<?php require 'footer.php'; ?>
<style type="text/css">

	
	   /*image annonce*/
    .size{
        width: 200px;
        height: 220px;
        border: 2px solid skyblue;
        border-radius: 8px;
    }
    #sen{
        width: 350px;
        margin-bottom: 40px;
        border-radius: 15px;
        border: 2px double #fff;
        padding: 15px;
    }

    /*Div principale*/
    .annonces{
        background: #2b4755;
        padding: 25px;
        border: 1px #2b4755;
        border-radius: 12px;
        margin-bottom: 45px;
    }
    .list-group-item-primary{
        padding : 12px;
        margin: 4px;
        border-radius: 8px;
    }
    .container{
        background-color: #2b4755;
        border-radius: 12px;
        padding: 50px;
    }
    #btn{
        margin-top: 30px;
    }
    span{
        font-size: 20px;
        color: white;
        font-style: italic;
        margin-bottom: 50px;
        text-decoration: underline;

    }
    /*Search bar*/
    .form-control{
        border-radius: 15px;
        padding: 8px;
    }
    .btn{
        border-radius: 12px;
    }


</style>

