<?php
include('database.php');

if(!empty($_GET['username']) && !empty($_GET['password'])){
   $user = $_GET['username']; 
   $password = $_GET['password'];    
$queryUsername = 'SELECT username FROM user WHERE username = "'.$user.'"';
$prepareUsername = $pdo->prepare($queryUsername);
$prepareUsername->bindValue(1, $user, PDO::PARAM_STR);
$resultUsername = $prepareUsername->execute();
$verifyUser = $prepareUsername->rowCount();
var_dump($verifyUser);

if($verifyUser > 0){
    $queryPassword = 'SELECT id_user, password FROM user WHERE username = "'.$user.'"';
    // var_dump($queryPassword);
    $preparePassword = $pdo->prepare($queryPassword);
    $preparePassword->execute();
    $données = $preparePassword->fetch(PDO::FETCH_ASSOC);
    var_dump($données['password']);
    if($password == $données['password']) {
        // VERIFICATION SI JE SUIS DEJA CONNECTE SUR UN AUTRE NAVIGATEUR
        $querySession = 'SELECT id_ext_user FROM sessions WHERE id_ext_user = "'.$données['id_user'].'"';
        $prepareSession = $pdo->query($querySession);
        $prepareSession->execute();
        $verifySession = $prepareSession->rowCount();
        if($verifySession == 0){
        $queryConnexion = 'INSERT INTO sessions (id_ext_user) VALUES (?)';
        var_dump($données['id_user']);
        $prepareConnexion = $pdo->prepare($queryConnexion);
        $prepareConnexion->bindValue(1,$données['id_user'],PDO::PARAM_INT);
        // var_dump($queryConnexion);
        $prepareConnexion->execute();
    }
        session_start();
        $_SESSION['id_user'] = $données['id_user'];
        // var_dump($_SESSION['id_user']);
         header('Location:../page_liste.php'); 

// LES ELSES RENVOIE DES MESSAGE D'ERREURS

    }else{
        header('Location:../page_connexion.php?error=false'); 
    }
}else{
    header('Location:../page_connexion.php?error=false');  
}
}else{
    header('Location:../page_connexion.php?error=missingInfo'); 

}
?>