
<!DOCTYPE html>
<html>
<head>
  <title>Sensearch</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="icon" href="../images/ico.ico"/>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>  

</head>
<body>
  <?php 
    require '../connexionDB.php';
    $sous_categories = $bdd->query("SELECT * FROM type");
    


   ?>

<!-- Navigation -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark text-center" style="">
      <a class="navbar-brand" href="index.php"><i><img src="../images/logo1.png" style="width: 200px;margin-right: 18px;"></i></a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">

          <li class="nav-item active">
            <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
          </li>
          <div class="dropdown">
            <li class="nav-item">
              <a href="liste_annonces.php" class="nav-link dropdown-toggle" data-toggle="dropdown" id="dropdownMenuLink">Annonces</a> 

                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" align="center">
                    <a class="dropdown-item" href="all_annonces.php">Toutes les annonce</a>
                    <div class="dropdown-divider"></div>

                  <?php 

                   
     while ($valeur = $sous_categories->fetch()) {
      echo '<a class="dropdown-item" href="annonce_par_type.php?id='.$valeur['id'].'"> '.$valeur['type_annonce'].'</a>';
      }
    ?>
                  </div>
             </li>   
           </div>
          <li class="nav-item">
            <a href="recherche.php" class="nav-link">Recherche avancée</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="inscription.php">Inscription</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="connexion.php">Connexion</a>
          </li>
          <li class="nav-item">
              <a href="plus_info.php" class="nav-link">Plus d'information</a>
          </li>
          <li class="nav-item">
            <a href="signaler.php" class="nav-link">Signaler</a>
          </li>
          <li class="nav-item active">
            <a href="admin.php" class="nav-link"><i>Espace Admin</i></a>
          </li>
          

          

        </ul>
       
      </div>
    </nav>
    <style type="text/css">
  nav ul {
    padding: 15px;
  }
  .nav-item {
    margin-left: 20px;
    font-size: 18px;
    font-style: italic;
  }
  nav{
    margin-bottom: 150px;
    background: #16222A;
    background: -webkit-linear-gradient(59deg, #3A6073, #16222A);
    background: linear-gradient(59deg, #3A6073, #16222A);
  }
  .dropdown-item{
    align-content: center;
  }
</style>  
