<p align="center">
  <img width="200" height="200" src="https://github.com/vincentmartin84/bibliothe_guinot.git/asset/imagesdesign/logo_guinot.png">
</p>
<h align="center">1Bibliothèque Guinot</h1>
<p>

Bibliothèque Guinot est un projet collectif, dévélloppé pour l'année\_ 2023/2024 dans le cadre de notre formation développeur web et web mobile au sein de l'ESRP Paul et Liliane Guinot "24 boulevard chastenet de gery 94800 Villejuif"
C'est un projet réaliser avec le framework symfony dans saversion 6.1 utilisant le langage php à partir de la version 8.1

</p>

# Installation de symfony

`Set-ExecutionPolicy RemoteSigned -scope`
`CurrentUser`
`iwr -useb get.scoop.sh | iex`
`scoop install symfony-cli`

# Installation de composer

<a href="http://getcomposer.org/"><strong> Composer</strong></a>

## Bibliotheque Guinot

Installer le projet via le lien github :
`https://github.com/vincentmartin84/bibliothe_guinot.git`
puis mettre le projet a jour en faisant `composer update`

## database

utiliser la commande `php bin/console d:d:c`
Faites le schema de la database `php bin/console d:s:u --force`
Faites la migration de la database
`php bin/console make:migration`
Enregistrer les donnees dans la database
`php bin/console doctrine:migrations:migrate`

## Fixtures

Installer
`composer require --dev orm-fixtures`
Faire
`php bin/console d:f:l`
repondre yes pour avoir le jeu de donnee

## Contributeur

_Arsène Ouanyou_ _Bilel El Amrani_ et _Vincent Martin_

### Remerciement

Nous remercions le formateur de la formation
m. _Igor Palakot_
Votre soutien nous a permis a ce projet de voir le jour.
