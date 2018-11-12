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
class PouleController extends Controller {

    public function creaPoule() {
        $modTournoi = $this->loadModel('Tournoi');
        $modPoule = $this->loadModel('Poule');
        if (isset($_POST['nb_joueurs'])) {

            //$joueur = $_POST['joueurs'];
            $poule = $_POST['nb_poule'];
            $ID_TOURNOI = $_POST['tournoi'];
            $ID_POULE = 1;

            while ($ID_POULE <= (int) $poule) {
                $modPoule->insertAI(['NUMERO', 'ID_TOURNOI'], [$ID_POULE, $ID_TOURNOI]);

                $ID_POULE = $ID_POULE + 1;
            }
            //$modPoule->delete(['conditions'=>"ID_POULE = 1"]);
        }


        $Tournoi = $modTournoi->find();
        $Poule = $modPoule->find();
        $d['tournoi'] = [];
        $idTour = [];
        foreach ($Poule as $poul) {
            if (isset($poul->ID_TOURNOI)) {
                array_push($idTour, $poul->ID_TOURNOI);
            }
        }


        foreach ($Tournoi as $tour) {
            if (array_search($tour->ID_TOURNOI, $idTour) == FALSE && array_search($tour->ID_TOURNOI, $idTour) !== 0) {
                array_push($d['tournoi'], $tour);
            }
        }

        $this->set($d);
        $this->render("creaPoule");
    }

    public function acceuil_organisateur() {
        $this->render("acceuil_organisateur");
    }

    public function liste() {
        $modTournoi = $this->loadModel('Tournoi');
        $d['tournoi'] = $modTournoi->find();

        if (isset($_POST['Valider'])) {
            $joueur = $this->loadModel('Joueurs');
            $joueur = $joueur->find();

            $d['joueurs'] = [];

            foreach ($joueur as $player) {
                if ($player->ID_TOURNOI == $_POST['tournoi']) {
                    array_push($d['joueurs'], $player);
                }
            }
        }
        $this->set($d);
        $this->render("liste");
    }

}
