A propos:
===========

Cette application reflète le concept du Multitenancy. Elle utilise une base de données principale qui fournit les informations sur les tenants (name, db, pswd…) et une base de données spécifique à l’application par tenant.
L'idée principale est d'avoir plusieurs bases de données, avec le même schéma et le même comportement, mais séparés les unes des autres. Cela peut être une exigence d'optimisation ou de sécurité pour certaines applications.
Pour se faire, j’ai configuré deux connexions dans config.yml « default » et  « tenant ». Quand une requête arrive on capture le paramètre « ag » via un listener qui représente l’id du tenant, cela nous permet de récupérer les informations du tenant de la base principale et de forcer le switch vers la nouvelle connexion.

L’idée:
===========

L’idée de ce projet est de développer un site web pour plusieurs agences avec des thèmes (couleurs pour le moment) et contenu différents. Donc un tenant peut faire l’inscription en fournissant les informations nécessaires (couleur du thème, slogan, services, portfolio, équipe…), une inscription qui doit être validé par un administrateur pour la création dynamique de la base de données du tenant.
Le projet représente juste le concept de base de l’idée générale du projet.


Screencapture tenant Nore:
===========================

![alt tag](https://github.com/skhachoum/multi-agencies/blob/develop/web/img/screencapture-api-agenciessas-development-2018-07-30-17_07_06.png "Nore")

Screencapture tenant Sora:
===========================

![alt tag](https://github.com/skhachoum/multi-agencies/blob/develop/web/img/screencapture-api-agenciessas-development-2018-07-30-17_08_11.png "Sora")

Screencapture tenant Roka:
===========================

![alt tag](https://github.com/skhachoum/multi-agencies/blob/develop/web/img/screencapture-api-agenciessas-development-2018-07-30-17_08_35.png "Roka")

