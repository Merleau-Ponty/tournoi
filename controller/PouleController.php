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

    // function permettant la création des poules
    public function creaPoule() {

        $modTournoi = $this->loadModel('Tournoi');
        $modPoule = $this->loadModel('Poule');

        //Traitement
        if (isset($_POST['nb_poule'])) {

            $poule = $_POST['nb_poule'];
            $ID_POULE = 1;
            
            while ($ID_POULE <= (int) $poule) {
                $modPoule->insertAI(['NUMERO', 'ID_TOURNOI'], [$ID_POULE, $_SESSION['id']]);

                $ID_POULE = $ID_POULE + 1;
            }
//Mise en session de l'id poule et redirection vers la page d'accueil de l'application
            unset($_SESSION['id']);
            $_SESSION['info'] = 'Les poules du tournoi "'.$_SESSION['nom'].'" ont bien été crées success';
            unset($_SESSION['nom']);
            $this->redirect('/tourn/home');
            exit();
        }
    }

    // function permettant la crétion d'un tableau montrant les joueurs en fonction de leurs poules
    public function liste() {

        $modJoueurPoule = $this->loadModel('JoueurPoule');
        $projection = 'poules.NUMERO,joueurs.*';
        $orderby = 'poules.NUMERO';
        $conditions = array('joueurs.ID_TOURNOI'=>$_SESSION['idtournoi'], 'joueurs.ETAT'=>'1');
        $param = array('projection'=>$projection,'conditions'=>$conditions, 'orderby'=>$orderby);
        $d['joueurs'] = $modJoueurPoule->find($param);
        
        $this->set($d);
    }

}