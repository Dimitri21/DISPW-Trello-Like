## PROJET N° 2  - TRELLO LIKE
___

Membres du groupe : 

* Cécile EVEZI
* Dimitri HERTZ
* Duramana KALUMVUATI

Ce project a été fait avec les technologies suivantes : 

- HTML5
- CSS3 (SASS)
- Javascript (JQuery)
- PHP
- MySQL

Pour la gestion de version, on a utilisé: 

- git (en local)
- github (en remote)

Pour installer ce projet sur vos machines, vous pouvez suivre les étapes suivantes (ou pas):

### I. Windows

1. Installer le serveur Wampp : 
>https://www.wampserver.com/#wampserver-64-bits-php-5-6-25-php-7

2. Installer  _composer_ :
>https://getcomposer.org/download/ ou https://getcomposer.org/Composer-Setup.exe.

3. Installer _git_ :
>https://git-scm.com/downloads

4. Cloner le depôt en ligne en utilisant la commande (SH) :

⚠️ Vous devez être connecté sut github

```sh 
git clone https://github.com/Dimitri21/DISPW-Trello-Like.git
```

Normalement, vous aurez un repertoire ayant le nom de _"DISPW-Trello-Like"_.
Etant dans ce dernier, vous lancez la commande ci-dessous : 

```sh
composer install 🎼
```

5. Pendant que composer serait en train d'installer les paquets, Veuillez créer un VHost avec ce nom : _trellolike.webo/_, qui ciblera le repertoire _DISPW-Trello-Like/public_.
6. Après cette étape, il vous reste encore deux choses à fair après c'est bon 😇. Vous devez mettre en place une base de données. Pour cela, vous trouverez un fichier situant dans cet endroit  : _DISPW-Trello-Like/app/sprinto.php_. Vous y trouverez les informations concernant la base de données. A changer ou à utiliser, c'est à vous d'en décider. Donc, vous allez créer sur votre _phpmyadmin_ :
   1. un utilisateur : nom : _..._ et password : _..._ en localhost
   2. une base de données : _..._ 

Après, veuillez renseigner ces informations dans le fichier _sprinto.php_.

7. En fin, veuillez trouver sur ce repertoire _DISPW-Trello-Like/app/Migration_ un fichier nommé _sprinto.sql_ soit _DISPW-Trello-Like/app/Migration/sprinto.sql_. Vous allez l'importer sur la base de données que vous venez de créer (Réf. 6.2).
8. Enjoy ✔️  trellolike sur : http://trellolike.webo/ 💻

### Linux :

Vous devez installer exactement les mêmes outils, mais en utilisant vos depots. 

1. https://www.apachefriends.org/fr/index.html
2. Composer et git (norlement, il est déjà installé)
```sh
sudo apt install composer git
```
3. Cloner le dépot ci-dessus.
4. Mise en place l'utilisateur et la base de données.
5. Lancer la commande : 

```sh 
composer install
```
6. Faire un lien symbolique ave cette commande : 

```sh
sudo ln -s ~/DISPW-Trello-Like/public /opt/lampp/htdocs/public
```

7. Faire les points 6,7 de la partie Windows.
8. Aller sur localhost/public

NB : si vous avez de problème d'installation ou autres, n'hésitez surtout pas de nous écrire ✏️  sur ce mail :
✉️ duramana.kalumvuati@laposte.net.

Nous vous remerçions.
