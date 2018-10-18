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
}
    public function nouveau() {
//on rajoute le traitement du formulaire
//on initialise les variables
        $d['nom'] = '';
        $d['prenom']='';
        $d['pseudo'] = '';
        $d['tournoi'] = '';
         $d['info'] = '';
        $inscription = false;
        $modTournois= $this->loadModel('Tournois');
        $d['tournois']=$modTournois->find();
//cas ou le formulaire a été soumis
        if (isset($_POST['nom'])) {
            $d['nom'] = $_POST['nom'];
            $d['prenom'] = $_POST['prenom'];
            $d['pseudo']=$_POST['pseudo'];
            
            if (isset($_POST['inscription'])) {
                $inscription = true;
            }
           
//validation des données

            if (empty($d['nom'])) {
            
                $d['info'] = $d['info'] . "<br>Le nom est obligatoire";
            }

            if (empty($d['prenom'])) {
             
                $d['info'] = $d['info'] . "<br>Le prénom est obligatoire";
            }
             if (empty($d['pseudo'])) {
             
                $d['info'] = $d['info'] . "<br>Le pseudo est obligatoire";
            }
             

//on prépare la requête SQL si les données sont valides
            if ($inscription) {
                $message_prep = addslashes($d['joueurs']);
                $modJoueur = $this->loadModel('Joueur');
                $colones = array('ID_TOURNOI','NOM', 'PRENOM','PSEUDO',);
                $valeurs = array($d['tournois'], $d['nom'], $d['prenom'], $d['pseudo']);
                $id = $modJoueur->insertAI($colones, $valeurs);
                $d['info'] .= 'Joueur n°' . $id . ' bien inséré';
            }

   
        }
        $this->set($d);
    }
}
