

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/page_connexion.css">
    <script src="lib/jquery/jquery-3.2.1.js"></script>
    <script src="lib/greensock-js/src/uncompressed/TweenMax.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400" rel="stylesheet">
    <title>Connexion</title>
</head>
<body>
<?php
session_start();
// SI L'UTILISATEUR EST CONNECTE ON LE REDIRIGE PAGE LISTE CONNECTES
if(isset($_SESSION['id_user'])){
    header('Location:page_liste.php');
}
?>
    <div class="header">
        <h1>Bienvenue sur cette super appli!</h1>
    </div>
    <div class="form">
<form action="traitementsPHP/traiteConnexion.php">

<input type="text" placeholder="nom utilisateur" name="username">
<input type="password" placeholder="mot de passe" name="password">
<input type="submit" value="Se connecter">
</form>

    
        <div class="info">
        <?php
        // ERREUR DANS LE FORMULAIRE OU A L'UPLOAD LORS D'UNE INSCRIPTION
          if(isset($_GET['error']) && ($_GET['error'] == 'missingInfo')){
            echo" Un des champs n'a pas été rempli !";
        }
        if(isset($_GET['error']) && ($_GET['error'] == 'false')){
           echo 'L\'identifiant ou le mot de passe est incorrect !';
        }
        if(isset($_GET['error']) && ($_GET['error'] == 'upload')){
            echo 'Il y a eu une erreur dans l\'upload ou aucune image n\'a été fournie, un avatar par défaut vous sera donné !';
         }

          ?> 
        </div>
    <div class="goInscription"><a href="page_inscription.php"><p>S'inscrire</p></a></div>

    </div>
    <script>
        $(document).ready(function () {
            

                var tl = new TimelineMax();
                tl.from($('h1'), 0.7, {
                    opacity: 0,
                    y: -50,
                    scale: 0.5
                });
                tl.from($('.form'), 0.7, {
                    opacity: 0,
                    scale: 0.5
                },0.2);
       
            





        });

   
    </script>
</body>
</html>

