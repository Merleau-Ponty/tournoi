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

        //Traitement
        if (isset($_POST['nb_joueurs'])) {

            $poule = $_POST['nb_poule'];
            $ID_TOURNOI = $_POST['tournoi'];
            $d['info'] = '';
            $ID_POULE = 1;


            while ($ID_POULE <= (int) $poule) {
                $modPoule->insertAI(['NUMERO', 'ID_TOURNOI'], [$ID_POULE, $_SESSION['id']]);

                $ID_POULE = $ID_POULE + 1;
            }
            unset($_SESSION['id']);
            $this->redirect('/tourn/home');
        }
    }

    public function liste() {

        $modJoueurPoule = $this->loadModel('JoueurPoule');
        $projection = 'poules.NUMERO,joueurs.*';
        $conditions = array('joueurs.ID_TOURNOI'=>$_SESSION['idtournoi'], 'joueurs.ETAT'=>'1');
        $param = array('projection'=>$projection,'conditions'=>$conditions);
        $d['joueurs'] = $modJoueurPoule->find($param);
        
        $this->set($d);
    }

}
