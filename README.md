# Carnet d'adresses
____

Un projet Symfony2

# Installation
____

Cloner le projet 

```
git clone git@github.com:azianfr/Symfony2TestProject.git
cd Symfony2TestProject
```
Installer les dépendences avec [composer](https://getcomposer.org/).
```
composer install
```
Le nom de la base de données par défaut est `symfony`, à modifier si besoin dans `parameters.yml`
Afin de mettre à jour la base de données, lancez la commande suivante :
```
php app/console doctrine:schema:update --force
```
Installer les assetics
```
php app/console assetic:dump
php app/console assets:install
```

Lancer le serveur et c'est parti ! :)
```
php app/console server:run
```