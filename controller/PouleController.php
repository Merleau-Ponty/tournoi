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
        $modTournoi = $this->loadModel('Tournois');
        $modPoule = $this->loadModel('Poules');
        if (isset($_POST['nb_joueurs'])) {

            $joueur = $_POST['joueurs'];
            $poule = $_POST['poules'];
            $id_tournoi = $_POST['tournois'];
            $id_poule = 1;

            while ($id_poule <= (int) $poule) {
                $modPoule->insertAI(['NUMERO', 'ID_TOURNOI'], [$id_poule, $id_tournoi]);

                $id_poule = $id_poule + 1;
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

}
