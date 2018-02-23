# testStage
indications : 

étape 1 : créer une base de données et importer le fichier rendusolive.sql dans un serveur pouvant gerer des bases de données mySQL.

étape 2 : importer le dossier 'renduSOLIVE' en entier à la racine de l'arborescence du serveur(generalement www/ ou http/).

étape 3 : aller dans le dossier 'traitementsPHP' et ouvrez le fichier 'database.php'. Ce dossier est celui qui fait appel à la base de données. modifier alors :
-l'hote du serveur 
- nom de la base de données
- identifiant
-mot de passe
$pdo = new PDO('mysql:host=MON_HOTE;dbname=NOM_DE_LA_BASE','IDENTIFIANT','MOT_DE_PASSE');

étape 4 : pour commencer la démo, utilisez l'url suivant : "http://nomdedomaine/renduSOLIVE/page_connexion.php". exemple : "http://localhost/renduSOLIVE/page_connexion.php". 


etape 5 : s'il y a un problème lors des précédentes étapes, mon projet est disponible à l'adresse suivante : "www.samy-navet.com/renduSOLIVE/page_connexion.php".

