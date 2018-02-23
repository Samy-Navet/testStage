<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400" rel="stylesheet">
    <link rel="stylesheet" href="css/page_liste.css">
    <title>Accueil</title>
</head>
<body>
<?php
include('traitementsPHP/database.php');
session_start();

// SITUATIONS OU LA SESSION A ETE SUPPRIME, cad DECONNEXION SUR UN AUTRE NAVIGATEUR PAR EXEMPLE
if(!isset($_SESSION['id_user'])){
    header('Location:page_connexion.php');
}
$queryMaConnexion = 'SELECT username, first_name, name, avatar FROM user, sessions WHERE id_user = '.$_SESSION['id_user'];
$prepareMaConnexion = $pdo->query($queryMaConnexion);
 $prepareMaConnexion->execute();
 $maConnexion = $prepareMaConnexion->rowCount();
if($maConnexion == 0){
    session_destroy();
    header('Location:page_connexion.php');
}

?>
<div class="header"><h1>Bienvenue sur SoFoot !</h1>
 <form action="page_liste.php"> 
<input type="hidden" name="deconnexion">
<input type="submit" value="Déconnexion"></form> </div>  
<div class="contenu">
<div class='connectedUser'> <div> <p>Avatar</p> <p>Utilisateur</p> <p>Nom</p>  <p>Prénom</p></div> 
<?php
$queryConnectés = 'SELECT username, first_name, name, avatar FROM user, sessions WHERE id_user = id_ext_user';
$prepareConnectés = $pdo->query($queryConnectés);
while( $afficheConnectés = $prepareConnectés->fetch(PDO::FETCH_ASSOC)){
    echo '<div> <div> <img src="img/'.$afficheConnectés['avatar'].'" alt="avatar"></div><p>'.$afficheConnectés['username'].'</p><p>'.$afficheConnectés['first_name'].'</p><p>
    '.$afficheConnectés['name'].'</p></div>';
}

?>
</table>
</div>  
</body>
</html>
<?php
if(isset($_GET['deconnexion'])){
    // DECONNEXION
$queryDeconnexion = 'DELETE FROM sessions WHERE id_ext_user = ?';
$prepareDeconnexion = $pdo->prepare($queryDeconnexion);
$prepareDeconnexion->bindValue(1,$_SESSION['id_user'], PDO::PARAM_STR);
$prepareDeconnexion->execute();
session_destroy();
header('Location:page_connexion.php');
}

?>