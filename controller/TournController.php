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
    
/* 
    public function liste_inscrit() {
        $modJoueurs = $this->loadModel('Joueur');
        $d['joueurs'] = $modJoueurs->find();
        //$this->render('home');
		$this->set($d);
    }*/

    public function creaTournoi() {
        $modTournoi = $this->loadModel("Tournoi");
        $d['tournoi'] = $modTournoi->find();
    }
    
    // Choix du tournoi
    
    public function choix_tournoi(){
        $modTournoi = $this->loadModel("Tournoi");
        $d['tournois'] = $modTournoi->find();
        $this->set($d);
    }
    
    // Mise en session de l'id tournoi et redirection vers la gestion de ce tournoi
    
    public function tourn_valid($id_tournoi){
        $_SESSION['idtournoi'] = $id_tournoi;
        $this->redirect('/matchpoule/create/1');
        exit;
    }

}
