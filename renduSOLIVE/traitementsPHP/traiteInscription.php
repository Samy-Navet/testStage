<?php
include('database.php');

// VERIFCATION DE L'ENVOI DE DONNEES
if(isset($_POST['username']) && isset($_POST['first_name']) && isset($_POST['name']) && isset($_POST['password']) && isset($_POST['password2']) &&
!empty($_POST['username']) && !empty($_POST['first_name']) && !empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['password2'])){
   // VERIFICATION QUE LES MOTS DE PASSE CORRESPONDENT
   $queryUsername = 'SELECT username FROM user WHERE username = ?';
   $prepareUsername = $pdo->prepare($queryUsername);
   $prepareUsername->bindValue(1,$_POST['username'],PDO::PARAM_STR);
   $prepareUsername->execute();
   $verifyUsename = $prepareUsername->rowCount();
   var_dump($verifyUsename);
   if($verifyUsename == 0){
    if($_POST['password'] == $_POST['password2']){
    $queryInscription = 'INSERT INTO user (username, first_name, name, avatar, password) VALUES (?,?,?,?,?)';
    $prepareInscription = $pdo->prepare($queryInscription);
    $prepareInscription->bindValue(1,$_POST['username'], PDO::PARAM_STR);
    $prepareInscription->bindValue(2,$_POST['first_name'], PDO::PARAM_STR);
    $prepareInscription->bindValue(3,$_POST['name'], PDO::PARAM_STR);
    $prepareInscription->bindValue(5,$_POST['password'], PDO::PARAM_STR);
    // VERIFICATION SI ERREUR LORS DE L'UPLOAD HORS POIDS
if ($_FILES['avatar']['error'] <= 2) {
    $maxsize = 1000000;
    // VERIFICATION POIDS
    if ($_FILES['avatar']['size'] <= $maxsize && $_FILES['avatar']['error'] != 1 && $_FILES['avatar']['error'] != 2){
        // VERIFICATION FORMAT
        $extensions = array( 'jpeg' , 'jpg' , 'png' , 'gif' );

$extension_upload = strtolower(  substr(  strrchr($_FILES['avatar']['name'], '.')  ,1)  );

if ( in_array($extension_upload,$extensions) ){
    // CREATION IMAGE UNIQUE + INSERTION DU CHEMIN IMAGE DANS LA BDD + REDIRECTION PAGE CONNEXION
    $id_avatar = md5(rand() * time()); 
    var_dump($_FILES['avatar']['tmp_name']);
    $chemin = $_SERVER['DOCUMENT_ROOT'].'/renduSOLIVE/img/'.$id_avatar.'.'.$extension_upload.'';
    $fichierDatabase = $id_avatar.'.'.$extension_upload;
    move_uploaded_file($_FILES['avatar']['tmp_name'],$chemin);
    $prepareInscription->bindValue(4,$fichierDatabase, PDO::PARAM_STR);
    $prepareInscription->execute();
    header('Location:../page_connexion.php');

// LES ELSE RENVOIENT UNE ERREUR SI UN DES CRITERES PRECEDENT N'A PAS ETE PRIS EN COMPTE

}else{
    header('Location:../page_inscription.php?error=fileType');
   
}
    }else{
        header('Location:../page_inscription.php?error=maxSize');
    }
    }else{
        // DONNE UN AVATAR PAR DEFAUT SI UN UTILISATEUR N'A PAS MIS D'AVATAR OU ERREUR D'UPLOAD 
        $prepareInscription->bindValue(4,'../img/avatar.png', PDO::PARAM_STR);
        $prepareInscription->execute();
        header('Location:../page_connexion.php?error=upload');
    }
    
    
    }else{
        header('Location:../page_inscription.php?error=falsePassword');
    }
}else{
    header('Location:../page_inscription.php?error=idTaken');
}
    }else{
        header('location:../page_inscription.php?error=missingInfo');
    }