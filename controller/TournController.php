<?php

/**
 * Description of TournController
 *
 * @author Maxime GLOD
 */
class TournController extends Controller {

    public function home() {
        //$this->render('home');
    }

    //Méthode pour lister les inscrits

    public function liste_inscrit() {

        $modJoueurs = $this->loadModel('Joueur'); //On charge le modèle de Joueur
        $condition = array("ID_TOURNOI" => $_SESSION['idtournoi']); //On récupère dans la session l'id du tournoi pour afficher la liste correspondante à l'id de la session
        $params['conditions'] = $condition;
        $d['joueurs'] = $modJoueurs->find($params); //On liste les joueurs selon nos conditions
        $this->set($d);
    }

    public function acceuil_organisateur() {
        $this->render("acceuil_organisateur");
    }

    /* public function creaTournoi() {
      $modTournoi = $this->loadModel("Tournois");
      $d['tournoi'] = $modTournoi->find();
      } */

    public function creaTournoi() {
        $modTournoi = $this->loadModel("Tournoi");
        $d['tournoi'] = $modTournoi->find();
    }

}
