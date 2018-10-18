<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JoueurController
 *
 * @author Maxime GLOD
 */
class JoueurController extends Controller{
     public function home() {
   //$this->render('home');
}
        public function inscription_joueur() {
   $modJoueurs= $this->loadModel('Joueurs');
        $d['joueurs']=$modJoueurs->find();
        $this->set($d);

        $d['nom'] = '';
        $d['prenom']='';
        $d['pseudo'] = '';
        $d['tournoi'] = '';
         $d['info'] = '';
        $score=0;
        $victoires=0;
         $inscription = false;
         $valid = true;
        $modTournois= $this->loadModel('Tournois');
        $d['tournois']=$modTournois->find();
//cas ou le formulaire a été soumis
        if (isset($_POST['nom'])) {
            $d['nom'] = $_POST['nom'];
            $d['prenom'] = $_POST['prenom'];
            $d['pseudo']=$_POST['pseudo'];
            $d['tournoi']=$_POST['tournoi'];
            
            if (isset($_POST['inscription'])) {
                $inscription = true;
            }
           
//validation des données

            if (empty($d['nom'])) {
            $valid = false;
                $d['info'] = $d['info'] . "<br>Le nom est obligatoire ! ";
            }

            if (empty($d['prenom'])) {
             $valid = false;
                $d['info'] = $d['info'] . "<br>Le prénom est obligatoire ! ";
            }
             if (empty($d['pseudo'])) {
             $valid = false;
                $d['info'] = $d['info'] . "<br>Le pseudo est obligatoire ! ";
            }
             

//on prépare la requête SQL si les données sont valides
            if ($valid && $inscription) {
      
                $modJoueurs = $this->loadModel('Joueurs');
                $colones = array('ID_TOURNOI','NOM', 'PRENOM','PSEUDO','SCORE_TOTAL','NB_VICTOIRES');
                $valeurs = array($d['tournoi'], $d['nom'], $d['prenom'], $d['pseudo'],$score,$victoires);
                
                $id = $modJoueurs->insertAI($colones, $valeurs);
                $d['info'] .= 'Merci pour votre inscription '.$d['pseudo'].' !';
            }

   
        }
        $this->set($d);
    }
}
