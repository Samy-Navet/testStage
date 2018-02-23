indication : 

étape 1 : importer le fichier sql dans un serveur pouvant gerer des bases de données mySQL et créez une base de donnée au nom 'renduSOLIVE'.

étape 2 : importer le dossier 'renduSOLIVE' en entier à la racine de l'arborescence du serveur(generalement www/).

étape 3 : aller dans le dossier 'traitementsPHP' et ouvrer le fichier 'database.php'. Ce dossier est celui qui fait appel à la base de données. modifier alors les identifiants en mettant ceux qui vous permettent d'acceder à votre phpMyAdmin.

étape 4 : pour commencer la démo, utilisez l'url suivant : "http://nomdedomaine/renduSOLIVE/page_connexion.php". exemple : "http://localhost/renduSOLIVE/page_connexion.php".


etape 5 : si il y a un problème lors des précédentes étape, mon projet est disponible à l'adresse suivante : "www.samy-navet.com/renduSOLIVE/page_connexion.php".

notes critiques : 

Il est compliqué de voir tous les utilisateurs connectés en localhost donc il vaut mieux tester le code sur un vrai serveur. 
J'ai essayé de respecter au maximum le délai de 4 heures passées.
Avec plus de temps, j'aurai pu par exemple mettre dans la table "session" de la base de donnée une entité durée pour détruire une session si elle est resté active trop longtemps.
Améliorer le front-end.