<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 class matchController extends Controller  {
     
     public function score($id_match) {
        
        if (isset($_POST["Score_1"])){
            $modScore = $this->loadModel('Score');
            $donnes = array ('SCORE'=>$_POST["Score_1"]);
            $conditions = array(" ID_MATCH"=>$id_match," ID_JOUEUR"=>$_POST["J_1"]);
            $params = array('donnees' => $donnes,'conditions' =>$conditions);
            $modScore->update($params);
            $modScore = $this->loadModel('Score');
            $donnes = array ('SCORE'=>$_POST["Score_2"]);
            $conditions = array(" ID_MATCH"=>$id_match," ID_JOUEUR"=>$_POST["J_2"]);
            $params = array('donnees' => $donnes,'conditions' =>$conditions);
            $modScore->update($params);
            $redirect = $_SESSION['redirect'];
            unset($_SESSION['redirect']);
            $this->redirect($redirect);
            exit();
        }
        else {
            $modScore = $this->loadModel('ScoreJoueur');
            $projection = 'joueurs.ID_JOUEUR,joueurs.PSEUDO';
            $conditions = array("scores.ID_MATCH"=>$id_match);
            $params = array('projection' => $projection,'conditions' =>$conditions);
            $d['scores'] = $modScore->find($params);
            $d['id_match'] = $id_match;
            $this->set($d);
        }
    }
    

 }    
    