

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/page_inscription.css">
    <script src="lib/jquery/jquery-3.2.1.js"></script>
    <script src="lib/greensock-js/src/uncompressed/TweenMax.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400" rel="stylesheet">
    
    <title>Inscription</title>
</head>
<body>
    <div class="header"><h1> Devenez membre ! </h1></div>
    <div class="form">
    <form action="traitementsPHP/traiteInscription.php" enctype="multipart/form-data" method="post">
    <input type="text" placeholder="nom utilisateur" name="username">
    <input type="text" placeholder="prénom" name="first_name">
    <input type="text" placeholder="nom" name="name">
    <input type="password" placeholder="mot de passe" name="password">
    <input type="password" placeholder="confirmer le mot de passe" name="password2">
    <div class="avatar">
    <label for="avatar">choisissez un avatar <br> (1 Mo max, format : png, jpg, jpeg, gif) : </label>
    <input type="hidden" name="MAX_FILE_SIZE" value="1500000">
    <input type="file" name="avatar" placeholder="avatar">
    </div>
    <input type="submit">
</form>


    
    <!-- <div class="bottomPage"> -->
        <div class="infos">
          <?php
          if(isset($_GET['error']) && ($_GET['error'] == 'missingInfo')){
            echo" Un des champs n'a pas été rempli !";
        }
        if(isset($_GET['error']) && ($_GET['error'] == 'falsePassword')){
           echo 'Les mots de passe ne correspondent pas !';
        }
        if(isset($_GET['error']) && ($_GET['error'] == 'maxSize')){
            echo 'Le fichier est trop lourd!';
         }
         if(isset($_GET['error']) && ($_GET['error'] == 'fileType')){
            echo 'L\'extension du fichier n\'est pas autorisée!';
         }
         if(isset($_GET['error']) && ($_GET['error'] == 'idTaken')){
            echo 'Ce nom d\'utilisateur est déjà pris!';
         }
          ?>  
        </div>
        <div class="retour"><a href="page_connexion.php"><p>Retour</h2></p></div>
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
                }, 0.2);
               
            





        });

   
    </script>
</body>
</html>




