<?php

/**
 * Description of TournController
 *
 * @author Maxime GLOD
 */
class TournController extends Controller {

    public function home() {
    }

    //Méthode pour lister les inscrits
    public function liste_inscrit() {
        $modJoueurs = $this->loadModel('Joueur'); //On charge le modèle de Joueur
        $condition = array("ID_TOURNOI" => $_SESSION['idtournoi']); //On récupère dans la session l'id du tournoi pour afficher la liste correspondante à l'id de la session
        $params['conditions'] = $condition;
        $d['joueurs'] = $modJoueurs->find($params); //On liste les joueurs selon nos conditions
        $this->set($d);
    }

    public function creaTournoi() {
        $modTournoi = $this->loadModel('Tournoi');
        $d['NOM'] = '';
        $d['JEU'] = '';
        $d['DATEDEBUT'] = '';
        $d['DATEFIN'] = '';
        $d['DATELIMITE_INSCR'] = '';
        $d['PRIX'] = '';
        $info = '';
        $valid = true;

//Cas ou le formulaire a été soummis
        if (isset($_POST['NOM'])) {
            $d['NOM'] = $_POST['NOM'];
            $d['JEU'] = $_POST['JEU'];
            $d['DATEFIN'] = $_POST['DATEFIN'];
            $d['DATEDEBUT'] = $_POST['DATEDEBUT'];
            $d['DATELIMITE_INSCR'] = $_POST['DATELIMITE_INSCR'];
            $d['PRIX'] = $_POST['PRIX'];

//Validation des données 

            if (empty($d['NOM'])) {
                $valid = false;
                $info = $info . "Le nom est obligatoire<br>";
            }
            if (empty($d['JEU'])) {
                $valid = false;
                $info = $info . "Le nom du jeu est obligatoire<br>";
            }
            if (empty($d['DATEDEBUT'])) {
                $valid = false;
                $info = $info . "La date de début du tournoi est obligatoire<br>";
            }
            if (empty($d['DATEFIN'])) {
                $valid = false;
                $info = $info . "La date de fin du tournoi est obligatoire<br>";
            }
            if (empty($d['PRIX'])) {
                $valid = false;
                $info = $info . "Le prix du tournoi est obligatoire<br>";
            }
            if (empty($d['DATELIMITE_INSCR'])) {
                $valid = false;
                $info = $info . "La date limite d'inscription doit être renseigné<br>";
            }

            //on prépare la requête SQL si les données sont valides
            if ($valid) {
                $colonnes = array('NOM', 'JEU', 'DATEFIN', 'DATEDEBUT', 'DATELIMITE_INSCR', 'PRIX');
                $valeurs = array($d['NOM'], $d['JEU'], $d['DATEFIN'], $d['DATEDEBUT'], $d['DATELIMITE_INSCR'], $d['PRIX']);
                $_SESSION['id'] = $modTournoi->insertAI($colonnes, $valeurs);
                $_SESSION['nom'] = $d['NOM'];
                $_SESSION['info'] = 'Le tournoi "'.$d['NOM'].'" a bien été créé success';
                $this->redirect('/poule/creaPoule');
                exit();   
            }
            $_SESSION['info'] = $info . ' danger';
        }
        $this->set($d);
    }

    // Choix du tournoi
    public function choix_tournoi() {
        $modTournoi = $this->loadModel("Tournoi");
        $d['tournois'] = $modTournoi->find();
        $this->set($d);
    }

    // Mise en session de l'id tournoi et redirection vers la gestion de ce tournoi
    public function tourn_valid($id_tournoi) {
        $_SESSION['idtournoi'] = $id_tournoi;
        unset($_SESSION['poule_created']);
        $_SESSION['info'] = 'Vous êtes dans la gestion du tournoi n°'.$id_tournoi.' info'; 
        $this->redirect('/tourn/liste_inscrit');
        exit;
    }

}
