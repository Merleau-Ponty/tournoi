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
        $modJoueurs = $this->loadModel('Joueur');
        $d['joueurs'] = $modJoueurs->find();
        //$this->render('home');
		$this->set($d);
    }

    public function acceuil_organisateur() {

        $this->render("acceuil_organisateur");
    }

    public function creaTournoi() {
        $modTournoi = $this->loadModel("Tournoi");
        $d['tournoi'] = $modTournoi->find();
    }

}
