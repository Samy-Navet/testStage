indication : 

�tape 1 : importer le fichier sql dans un serveur pouvant gerer des bases de donn�es mySQL et cr�ez une base de donn�e au nom 'renduSOLIVE'.

�tape 2 : importer le dossier 'renduSOLIVE' en entier � la racine de l'arborescence du serveur(generalement www/).

�tape 3 : aller dans le dossier 'traitementsPHP' et ouvrer le fichier 'database.php'. Ce dossier est celui qui fait appel � la base de donn�es. modifier alors les identifiants en mettant ceux qui vous permettent d'acceder � votre phpMyAdmin.

�tape 4 : pour commencer la d�mo, utilisez l'url suivant : "http://nomdedomaine/renduSOLIVE/page_connexion.php". exemple : "http://localhost/renduSOLIVE/page_connexion.php".


etape 5 : si il y a un probl�me lors des pr�c�dentes �tape, mon projet est disponible � l'adresse suivante : "www.samy-navet.com/renduSOLIVE/page_connexion.php".

notes critiques : 

Il est compliqu� de voir tous les utilisateurs connect�s en localhost donc il vaut mieux tester le code sur un vrai serveur. 
J'ai essay� de respecter au maximum le d�lai de 4 heures pass�es.
Avec plus de temps, j'aurai pu par exemple mettre dans la table "session" de la base de donn�e une entit� dur�e pour d�truire une session si elle est rest� active trop longtemps.
Am�liorer le front-end.