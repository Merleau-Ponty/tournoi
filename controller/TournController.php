<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TournController
 *
 * @author Maxime GLOD
 */
class TournController extends Controller {

    //put your code here
    public function home() {
        //$this->render('home');
    }

    public function liste_inscrit() {
        $modJoueurs = $this->loadModel('Joueurs');
        $d['joueurs'] = $modJoueurs->find();
        //$this->render('home');
    }

    public function acceuil_organisateur() {
        $this->render("acceuil_organisateur");
    }

    /* public function creaTournoi() {
      $modTournoi = $this->loadModel("Tournois");
      $d['tournoi'] = $modTournoi->find();
      } */

    public function creaTournoi() {
//on rajoute le traitement du formulaire
//on initialise les variables
        $modTournoi = $this->loadModel('Tournoi');
        $d['NOM'] = '';
        $d['JEU'] = '';
        $d['DATEDEBUT'] = '';
        $d['DATEFIN'] = '';
        $d['DATELIMITE_INSCR'] = '';
        $d['PRIX'] = '';
        $d['info'] = '';
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
                $d['info'] = $d['info'] . "<br>Le nom est obligatoire";
            }
            if (empty($d['JEU'])) {
                $valid = false;
                $d['info'] = $d['info'] . "<br>Le nom du jeu est obligatoire";
            }
            if (empty($d['DATEDEBUT'])) {
                $valid = false;
                $d['info'] = $d['info'] . "<br>La date de début du tournoi est obligatoire";
            }
            if (empty($d['DATEFIN'])) {
                $valid = false;
                $d['info'] = $d['info'] . "<br>La date de fin du tournoi est obligatoire";
            }
            if (empty($d['DATELIMITE_INSCR'])) {
                $valid = false;
                $d['info'] = $d['info'] . "<br>La date limite d'inscription doit être renseigné";
            }

            //on prépare la requête SQL si les données sont valides
            if ($valid) {
                $colonnes = array('NOM', 'JEU', 'DATEFIN', 'DATEDEBUT', 'DATELIMITE_INSCR', 'PRIX');
                $valeurs = array($d['NOM'], $d['JEU'], $d['DATEFIN'], $d['DATEDEBUT'], $d['DATELIMITE_INSCR'], $d['PRIX']);
                $id = $modTournoi->insertAI($colonnes, $valeurs);
                $d['info'] .= 'Votre tournoi à bien été crée';
            }
        }
        $this->set($d);
    }

}
