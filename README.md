# SymfonyProject

## Membres du groupe
- GAHLAS Aicha
- AISSAT Fatima 
- SEFFAR Noredine 
- MIMOUN Ali 

## Commandes utilisées 
*** QUESTION 1 :
          docker-compose build
          docker-compose up -d
          docker ps
          docker exec-ti my-container bash
    --DANS LE CONTENEUR //
symfony new CcSymfony --webapp
cd CcSymfony
symfony server:start --no-tls --listen-ip=0.0.0.0 --d

---bootstrap et webpack
symfony composer require symfony/webpack-encore-bundle
npm install
npm install bootstrap
npm install bootstrap-icons
Dans assets/app.js, mettre
  import './styles/app.css';
  import 'bootstrap';
  import 'bootstrap/dist/css/bootstrap.min.css';
  import 'bootstrap-icons/font/bootstrap-icons.css';




***QUESTION2

je me deplcace vers le projet et je cree l'entite
symfony console make:entity Atelier
  creeation de la base des données
symfony console doctrine:database:create
creation  de la table dans la base de données 
symfony console make:migration
creattion de la table 
symfony console doctrine:migrations:migrate 
-----Pour verifier :: symfony console doctrine:schema:update --dump-sql

  

****Question 3
on doit deja installer Faker :
symfony composer require fakerphp/faker

symfony composer require orm-fixtures --dev
Pour créer une fixture : symfony console make:fixture
apres je modifie AteliersFixtures 
apres
Pour exécuter une fixture : symfony console doctrine:fixtures:load

concenrnant le controleur :
symfony console make:controller AtelierControleur
apres j'ai modifier AtelierController.php
apresje vais creer/modifier la vue pour l'affichage


*****Question 4
Création d’un CRUD :
symfony console make:crud Atelier
symfony console doctrine:migrations:migrate

***question 5 :
J'ai ajouté une barre de navigation réactive utilisant Bootstrap. Elle s'adapte aux différentes tailles d'écrans et permet aux utilisateurs de naviguer entre les pages principales de l'application. Le design a été amélioré en utilisant les classes de
Bootstrap pour offrir une interface moderne et élégante.