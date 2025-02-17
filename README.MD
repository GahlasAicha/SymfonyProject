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


        
