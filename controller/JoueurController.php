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
   $modJoueurs= $this->loadModel('Joueur');
        $d['joueurs']=$modJoueurs->find();
        $this->set($d);

        $d['nom'] = '';
        $d['prenom']='';
        $d['pseudo'] = '';
        $d['tournoi'] = '';
         $d['info'] = '';
        $score=0;
        $victoires=0;
        $etat=0;
         $inscription = false;
         $valid = true;
        $modTournois= $this->loadModel('Tournoi');
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
      
                $modJoueurs = $this->loadModel('Joueur');
                $colones = array('ID_TOURNOI','NOM', 'PRENOM','PSEUDO','ETAT','SCORE_TOTAL','NB_VICTOIRES');
                $valeurs = array($d['tournoi'], $d['nom'], $d['prenom'], $d['pseudo'],$etat,$score,$victoires);
                
                $id = $modJoueurs->insertAI($colones, $valeurs);
                $d['info'] .= 'Merci pour votre inscription '.$d['pseudo'].' !';
            }

   
        }
        $this->set($d);
        
        
             $d['info']='';
 
   $modJoueurs= $this->loadModel('Joueur');
   
   
   
//        $params = array();
//        $projection = 'COUNT(ETAT)';
//        $conditions = 'ETAT=1';
//         $params = array( 'projection' => $projection, 'conditions' => $conditions);
//         $d['lp'] =$modJoueurs->find($params);
//        $this->set($d);
//   echo ($d['lp']);
//   
//   
      $modListeP= $this->loadModel('ListeP');
            $ligneP = $modListeP->find('ETAT');
                
                $listeprincipale=count($ligneP);
   
                      $modListeS= $this->loadModel('ListeS');
            $ligneS = $modListeS->find('ETAT');
            
                $listesecondaire=count($ligneS);
                       
        if ( $listesecondaire>=8 && $listesecondaire%8==0 && $listeprincipale<64 ){
            $d['info']="info dans le if";
             $condition=array("ETAT"=>0);
        //valeur a mettre à jour
        $donnees=array("ETAT"=>1);
        //a mettre dans un seul tabnleau
        $requete=array("donnees"=>$donnees,"conditions"=>$condition);
        $d['info']=$modJoueurs->update($requete);
        
        $this->set($d);
        }

        
    }
}
