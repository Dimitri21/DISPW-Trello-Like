## PROJET N° 2  - TRELLO LIKE
___

Membres du groupe : 

* Cecile EVEZI
* Dimitri HERTZ
* Duramana KALUMVUATI

Ce project a été fait avec ces technologies : 

- HTML5
- CSS3 (SASS)
- Javascript (JQuery)
- PHP
- MySQL

Pour la gestion de version : 

- git (en local)
- github (en remote)

Pour installer ce projet sur vos machines, vous devez suivre ces étapes suivantes :

1. Installer le serveur Wampp : 
>https://www.wampserver.com/#wampserver-64-bits-php-5-6-25-php-7

2. Installer aussi git :
>https://git-scm.com/downloads
3. Cloner ce depot en ligne par ce lien :

```sh 
git clone https://github.com/Dimitri21/DISPW-Trello-Like.git
```
Normalement, vous aurez un repertoire ayant ce nom _"DISPW-Trello-Like"_.

4. Après avoir cloné ou même téléchargé le projet, Veuillez créer un VHost avec ce nom : _trellolike.webo/_, qui ciblera _DISPW-Trello-Like/public_.
5. Après cette étape, il vous reste encore trois choses à faire, après c'est bon. Vous devez mettre en place une base de données. Pour cela, vous trouverez un fichier situant dans cet endroit  : _DISPW-Trello-Like/app/sprinto.php_. Vous y trouverez les informations concernant la base de données. A changer ou à utiliser, c'est à vous d'en décider. Donc, vous allez créer sur votre MySQL :
   1. un utilisateur : nom : _..._ et password : _..._
   2. base de données : _..._ en localhost
Après, veuillez renseigner ces informations dans ce fichier _sprinto.php_.
6. Installer _composer_ afin d'éviter les erreurs de autoload :
>https://getcomposer.org/download/ ou https://getcomposer.org/Composer-Setup.exe.
Après avoir installé _composer_ sur vos machine, il vous restera de faire lancer cette commande sur le repertoire du projet : 

```sh
composer install
```
 
7. En fin, veuillez trouver sur ce repertoire _DISPW-Trello-Like/app/Migration_ un fichier nommé _sprinto.sql_ soit _DISPW-Trello-Like/app/Migration/sprinto.sql_. vous allez l'importer sur la base de données que vous venez de créer.
8. Enjoy trellolike sur : http://trellolike.webo/

NB : si vous avez de problème d'installation ou autres, n'hésitez surtout pas de nous écrire sur ce mail :
duramana.kalumvuati@laposte.net.

Nous vous remerçions.
