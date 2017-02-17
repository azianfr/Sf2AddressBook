# Carnet d'adresses

Un projet Symfony2

# Installation

Cloner le projet 

```
git clone git@github.com:azianfr/Sf2AddressBook.git
cd Sf2AddressBook
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

Génerer des utilisateurs

```
php app/console doctrine:fixtures:load [--append] // si on ne souhaite pas purger la bdd
```

Lancer le serveur et c'est parti ! :)

```
php app/console server:start
```

Allez maintenant sur [http://localhost:8000](http://localhost:8000)
