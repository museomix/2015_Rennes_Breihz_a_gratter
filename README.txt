BREIZH A GRATTER
----------------

breizhagratter est un prototype distribué sous la licence GPL V3.

Ses auteurs sont Nicolas Poulain aka tounoki, Rosine Bernez, Adrien Le Beller, Natasha Stocchi, Jerome Garnier, Alice Fernandez, Angélique Robert
novembre 2015 - mars 2016

http://www.museomix.org/prototypes/breizh-a-gratter/ 

INSTALLATION
------------

- base SQL

* importer dans une base bag-structure.sql
* modifier le fichier medoo_load.php pour spécifier table, user, mot de passe
* 2 tables :
  > questions : liste des questions
      qid	: ID de la question
      content	: contenu HTML de la question
  > opinions  : liste des réponses
      id	: ID de la réponse
      qid	: ID de la question correspondante
      comment	: commentaire saisi par l'utilisateur
      choix	: OK ou NOK (= d'accord/pas d'accord) pour le tri des opinions contraires
      timestamp : date de saisie de la réponse

- structure :

* index.php		: Page du projet
* medoo/		: Librairie pour gérer les appels à la base de donnée
* medoo_load.php	: Informations de connexion à la base de donnée
* get_question.php	: Récupère une question aléatoire dans la base de donnée. Renvoie un objet JSON.
* get_opinions.php	: Récupère 3 opinions contraires à celle de l'utilisateur. Renvoie un objet JSON.
			  Pour faire varier le nombre de réponse proposées, modifier
			  le paramètre LIMIT de la requête (LIMIT 0, 3 => LIMIT 0, X)
* submit_opinion.php    : Enregistre la réponse de l'utilisateur actuel
* fonts/, css/		: CSS et polices du thème Boostrap
* js/			: Fichiers JS du thème Boostrap + jQuery +…
* js/script.js		: C'est ici que se passent les appels aux endpoints php