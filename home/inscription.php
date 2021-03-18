<?php require '../connexionDB.php'; ?>
<?php require 'homesecure.php'; ?>

<!--Script PHP-->
<?php

 if(isset($_POST['ok']))
    {
      $error = [];

      //Gerer le cas du nom et prenom
      if (preg_match("/^[a-zA-Z ]*$/", $_POST['nom'])) {
        
        $nom = data_test($_POST['nom']);
      }
      else
      {
        $error['nom'] = 'Le nom saisie est invalide (saisir des caractères alphanumériques) ! ';
      }

      if (preg_match("/^[a-zA-Z ]*$/", $_POST['prenom'])) {
        
        $prenom = data_test($_POST['prenom']);
      }
      else
      {
        $error['prenom'] = 'Le prenom saisie est invalide (saisir des caractères alphanumériques) ! ';
      }

      // Gerer le numero de telephone
      if (is_numeric($_POST['tel']) && strlen($_POST['tel']) == 9 ) {
        
        $telephone  = data_test($_POST['tel']);
      }
      else
      {
        $error['tel'] = "Le numéro de téléphone est invalide .";
      }

      //Gerer le mots de passe 
      if (strlen($_POST['mdp']) < 8 ) {
        $error['mdp_court'] = "Votre mots de passe est trop court .";
      }
      else
      {
        if ($_POST['mdp'] != $_POST['mdp_confirm'])  {
          $error['not_same'] = "Les deux mots de passe ne correspondent pas  .";
        }
        else
        {
          $mdp = data_test($_POST['mdp']);
        }
      }

        //gerer l'email

           $same_email = $bdd->prepare("SELECT * FROM inscription WHERE email = ?");
           $same_email->execute(array($_POST['email']));

           if ($same_email->fetch()) {
                $error['same_email'] = "Cet e-mail est déja utiliser , veuillez choisir un autre. ";
           }
           else
           {
               $email = data_test($_POST['email']);
           }
      


        //Adresse complete
         $ville =   $_POST['ville'];
         $adresse = $_POST['adresse'];

         #Nom de la boutique
         if (preg_match("/^[a-zA-Z ]*$/", $_POST['nom_boutique']) ) {

            $same_boutique = $bdd->prepare("SELECT * FROM inscription WHERE nom_boutique = ?");
            $same_boutique->execute(array($_POST['nom_boutique']) );

                if ($same_boutique->fetch()) 
                {
                  $error['same_boutique'] = "Cette boutique existe déjà";
                }
                else
                {
                  $nom_boutique = data_test($_POST['nom_boutique']);
                }
         }
         else
         {
          $error['nom_boutique'] = "Le nom de la boutique est invalide !";
         }

         #Infos sur la boutique

          $info_boutique = htmlspecialchars($_POST['info_boutique']);

        #statut de l'utilisateur

        $statut = data_test($_POST['statut']);

}//END isset

    function data_test ($data){
      //Supprime les antislashs d'une chaîne
        stripslashes($data);
        //Supprime les espaces
        trim($data);
        //Convertit les caractères spéciaux en entités HTML
        htmlspecialchars($data);
        return $data;
    }


if (empty($error) && isset($_POST['ok'])) {

  try{
        $data = $bdd->prepare("INSERT INTO inscription (nom , prenom , email , telephone, password, nom_boutique , ville , adresse , statut , info_boutique)
        VALUES(?,?,?,?,?,?,?,?,?,?);");
        $data->execute(array($nom,$prenom,$email,$telephone,$mdp,$nom_boutique,$ville , $adresse , $statut , $info_boutique));
        echo "Ajout reussit";

        header("Location:connexion.php");
    }
    catch(Exception $e){
        echo "error : " . $e->getMessage();
        $message = $e->getMessage();
    }


  
}

 ?>

<?php require 'header.php' ?>
<!--Fin Script PHP-->
<form method="POST">
<div class="container register bg-light shadow-lg p-3 mb-5 bg-white rounded">
<h2 class = "text-center">Inscription</h2>
<p class = "text-center">Avez-vous déjà un compte ? <a href="connexion.php">Cliquez ici </a>pour vous connecter !</p>
    <?php if (isset($_POST['ok']) && !empty($error)): ?>
      <div class="alert alert-danger">
        <ul>
          <?php foreach ($error as $key => $value): ?>
            <li class="" style=" list-style: disc;"><?php echo "$value"; ?></li>
          <?php endforeach ?>
        </ul>
      </div>
    <?php endif ?>


<!--mise en place des fields du formulaire-->
  <div class="row">
   
    <div class="col-md-6">
        <div class="form-group">
            <label for="f1">Nom</label>
            <input type="text" name="nom" id="f1" class="form-control"  required="" pleceholder = "Saisir votre nom">
        </div>

        <div class="form-group">
          <label for="f2">Prénom</label>
          <input type="text" name="prenom" id="f2" class="form-control"  required="" pleceholder = "Saisir votre prénom">
        </div>

        <div class="form-group">
            <label for="f3">E-mail</label>
            <input type="email" name="email" id="f3" class="form-control" required="" pleceholder = "Saisir votre adresse electronique">
        </div>

        <div class="form-group input-group">
          <select class="custom-select" style="max-width: 150px;">
            <option selected="">+221</option>
            <input name="tel" class="form-control" placeholder="Téléphone" type="text"  required="" pleceholder = "Saisir votre numérp de téléphone">
          </select>
        </div> 
        <div class="form-group">
          <label for="f7">Votre statut</label>
            <select id="f7" class="form-control" name="statut">
              <option value="3">Professionnelle</option>
              <option value="1" selected="">Particulier</option>
              <option value="2">Autres</option>
            </select>
        </div>
    </div>

    <div class="col-md-6">

        <div class="form-group">
          <label for="f4">Mot de passe</label>
          <input type="password" name="mdp" id="f4" class="form-control"  required="" pleceholder = "Saisir votre mot de passe">
        </div>

        <div class="form-group">
          <label for="f5">Confimer le mot de passe</label>
          <input type="password" name="mdp_confirm" id="f5" class="form-control"  required="" pleceholder = "Confirmer votre mot de passe">
        </div>

        <div class="form-group">
          <label for="f6">Nom de la boutique</label>
          <input type="text" name="nom_boutique" id="f6" class="form-control"  required pleceholder = "Saisir le nom de votre bputique">
        </div>

        <div class="form-group input-group">
          <select name="ville" class="custom-select" style="max-width: 150px;">
            <option selected="" value="1">Dakar</option>
            <option value="2">Pikine</option>
            <option value="3">Touba</option>
            <option value="4">Guédiawaye</option>
            <option value="5">Thiès</option>
            <option value="6">Kaolack</option>
            <option value="7">Autres</option>
          </select>
            <input name="adresse" class="form-control" placeholder="Adresse" type="text" required=""pleceholder = "Saisir votre adresse" >
        </div> 
    </div>  
  </div><!--row-->




  <div class="input-group form-group">
    <div class="input-group-prepend">
       <span class="input-group-text">Informations sur la boutique</span>
    </div>
    <textarea class="form-control" aria-label="" name="info_boutique" required="" pleceholder = "Saisir  les informations sur votre boutique"></textarea>
  </div>

         
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="f8">
    <label class="form-check-label" for="f8">Je confirme ces informations !</label>
  </div>

  
    
<div align="center">
  <div class="form-group" style="margin-top: 15px;">
     <input type="submit" name="ok" class="btn btn-success btn-lg" value="Inscription">
  </div>
 <p></p>
</div>
   
  

  </div><!--Container-->
  </form> 

<?php require 'footer.php' ?>

<style type="text/css">
  /*Page inscription*/
  /*
.register{
  padding: 15px;
  background: #16222A;
  background: -webkit-linear-gradient(59deg, #3A6073, #16222A);
  background: linear-gradient(59deg, #3A6073, #16222A);
  border-style: solid;
  border-width: 3px;
  border-radius: 12px;


}*/
/*
form {
  margin-top: 150px;
  margin-bottom: 150px;
}
div h2 {
  font-style: italic;
  margin-bottom: 20px;
}
div label{
  font-size: 18px;
  color: white;
  font-style: italic;
  font-weight: bold;
}
*/
/*Fin Page inscription*/


</style>