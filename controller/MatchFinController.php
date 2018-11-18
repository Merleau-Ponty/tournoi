<?php

class MatchFinController extends Controller {

    public function createPH3() {
//on rajoute le traitement du formulaire
//on initialise les variables
        $modJoueurs = $this->loadModel('Joueur');
        $condition = array('ID_TOURNOI'=>$_SESSION['idtournoi'],'ETAT'=>'1');
        $param = array('conditions'=>$condition);
        $d['joueurs']=$modJoueurs->find($param);

        $valid = true;
        
        $d['date'] = '';
        $d['time'] = '';
        $d['joueur1']='';
        $d['joueur2'] = '';
        $d['info'] = '';
        
        if (isset($_POST['date'])) {
            $d['date'] = $_POST['date'];
            $d['time'] = $_POST['time'];
            $d['joueur1'] = $_POST['joueur1'];
            $d['joueur2']=$_POST['joueur2'];
            
            if (empty($d['date'])) {
            $valid = false;
                $d['info'] = $d['info'] . "<br>La date est obligatoire ! ";
            }
            if (empty($d['time'])) {
            $valid = false;
                $d['info'] = $d['info'] . "<br>L'heure est obligatoire ! ";
            }

            if (empty($d['joueur1'])) {
             $valid = false;
                $d['info'] = $d['info'] . "<br>Vous devez entrer le joueur n°1 ! ";
            }
             if (empty($d['joueur2'])) {
             $valid = false;
                $d['info'] = $d['info'] . "<br>Vous devez entrer le joueur n°2 ! ";
            }
            
            
            if ($valid) {
      
                $modMatch = $this->loadModel('Match');
                $coloneMatch = array('ID_TOURNOI','TYPE_MATCH','ID_PHASE', 'DATE_HEURE');
                $valeurMatch = array($_SESSION['idtournoi'],'1',3, $d['date']);
                
                $id = $modMatch->insertAI($coloneMatch, $valeurMatch);
                $d['info'] .= 'Le match de finale a été crée !';
                
                $modScore = $this->loadModel('Score');
                $colones = array('ID_MATCH','ID_JOUEUR');
                $valeurs = array($id,$_POST['joueur1']);
                $modScore->insert($colones, $valeurs);
                $valeurs = array($id,$_POST['joueur2']);
                $modScore->insert($colones, $valeurs);
            }
            
   
        }
        $this->set($d);
        
    }
    
    //ajouter un tournoi
    public function createPH2() {
//on rajoute le traitement du formulaire
//on initialise les variables
        $modJoueurs = $this->loadModel('Joueur');
        $condition = array('ID_TOURNOI'=>$_SESSION['idtournoi'],'ETAT'=>'1');
        $param = array('conditions'=>$condition);
        $d['joueurs']=$modJoueurs->find($param);

        $valid = true;
        
        $d['date'] = '';
        $d['time'] = '';
        $d['joueur1']='';
        $d['joueur2'] = '';
        $d['joueur3'] = '';
        $d['joueur4'] = '';
        $d['info'] = '';
        
        if (isset($_POST['date'])) {
            $d['date'] = $_POST['date'];
            $d['time'] = $_POST['time'];
            $d['joueur1'] = $_POST['joueur1'];
            $d['joueur2']=$_POST['joueur2'];
            $d['joueur3']=$_POST['joueur3'];
            $d['joueur4']=$_POST['joueur4'];
            
            if (empty($d['date'])) {
            $valid = false;
                $d['info'] = $d['info'] . "<br>La date est obligatoire ! ";
            }
            if (empty($d['time'])) {
            $valid = false;
                $d['info'] = $d['info'] . "<br>L'heure est obligatoire ! ";
            }

            if (empty($d['joueur1'])) {
             $valid = false;
                $d['info'] = $d['info'] . "<br>Vous devez entrer le joueur n°1 ! ";
            }
             if (empty($d['joueur2'])) {
             $valid = false;
                $d['info'] = $d['info'] . "<br>Vous devez entrer le joueur n°2 ! ";
            }
            if (empty($d['joueur3'])) {
             $valid = false;
                $d['info'] = $d['info'] . "<br>Vous devez entrer le joueur n°3 ! ";
            }
            if (empty($d['joueur4'])) {
             $valid = false;
                $d['info'] = $d['info'] . "<br>Vous devez entrer le joueur n°4 ! ";
            }
            
            
            if ($valid) {
      
                $modMatch = $this->loadModel('Match');
                $coloneMatch = array('ID_TOURNOI','TYPE_MATCH','ID_PHASE', 'DATE_HEURE');
                $valeurMatch = array($_SESSION['idtournoi'],'1',2, $d['date']);
                
                $id = $modMatch->insertAI($coloneMatch, $valeurMatch);
                
                $modScore = $this->loadModel('Score');
                $colones = array('ID_MATCH','ID_JOUEUR');
                $valeurs = array($id,$_POST['joueur1']);
                $modScore->insert($colones, $valeurs);
                $valeurs = array($id,$_POST['joueur2']);
                $modScore->insert($colones, $valeurs);
                
                $id = $modMatch->insertAI($coloneMatch, $valeurMatch);
                $modScore = $this->loadModel('Score');
                $colones = array('ID_MATCH','ID_JOUEUR');
                $valeurs = array($id,$_POST['joueur3']);
                $modScore->insert($colones, $valeurs);
                $valeurs = array($id,$_POST['joueur4']);
                $modScore->insert($colones, $valeurs);
                
                $d['info'] .= 'Les matchs de demi-finale ont été crées !';
            }

   
        }
        $this->set($d);
        
    }
    
    //ajouter un tournoi
    public function createPH1() {
//on rajoute le traitement du formulaire
//on initialise les variables
        $modJoueurs = $this->loadModel('Joueur');
        $condition = array('ID_TOURNOI'=>$_SESSION['idtournoi'],'ETAT'=>'1');
        $param = array('conditions'=>$condition);
        $d['joueurs']=$modJoueurs->find($param);

        $valid = true;
        
        $d['date'] = '';
        $d['time'] = '';
        $d['joueur1']='';
        $d['joueur2'] = '';
        $d['joueur3'] = '';
        $d['joueur4'] = '';
        $d['joueur5'] = '';
        $d['joueur6'] = '';
        $d['joueur7'] = '';
        $d['joueur8'] = '';
        $d['info'] = '';
        
        if (isset($_POST['date'])) {
            $d['date'] = $_POST['date'];
            $d['time'] = $_POST['time'];
            $d['joueur1'] = $_POST['joueur1'];
            $d['joueur2']=$_POST['joueur2'];
            $d['joueur3']=$_POST['joueur3'];
            $d['joueur4']=$_POST['joueur4'];
            $d['joueur5']=$_POST['joueur5'];
            $d['joueur6']=$_POST['joueur6'];
            $d['joueur7']=$_POST['joueur7'];
            $d['joueur8']=$_POST['joueur8'];
            $d['tournoi']=1;
            
            if (empty($d['date'])) {
            $valid = false;
                $d['info'] = $d['info'] . "<br>La date est obligatoire ! ";
            }
            
            if (empty($d['time'])) {
            $valid = false;
                $d['info'] = $d['info'] . "<br>L'heure est obligatoire ! ";
            }

            if (empty($d['joueur1'])) {
             $valid = false;
                $d['info'] = $d['info'] . "<br>Vous devez entrer le joueur n°1 ! ";
            }
             if (empty($d['joueur2'])) {
             $valid = false;
                $d['info'] = $d['info'] . "<br>Vous devez entrer le joueur n°2 ! ";
            }
            if (empty($d['joueur3'])) {
             $valid = false;
                $d['info'] = $d['info'] . "<br>Vous devez entrer le joueur n°3 ! ";
            }
            if (empty($d['joueur4'])) {
             $valid = false;
                $d['info'] = $d['info'] . "<br>Vous devez entrer le joueur n°4 ! ";
            }
            if (empty($d['joueur5'])) {
             $valid = false;
                $d['info'] = $d['info'] . "<br>Vous devez entrer le joueur n°5 ! ";
            }
            if (empty($d['joueur6'])) {
             $valid = false;
                $d['info'] = $d['info'] . "<br>Vous devez entrer le joueur n°6 ! ";
            }
            if (empty($d['joueur7'])) {
             $valid = false;
                $d['info'] = $d['info'] . "<br>Vous devez entrer le joueur n°7 ! ";
            }
            if (empty($d['joueur8'])) {
             $valid = false;
                $d['info'] = $d['info'] . "<br>Vous devez entrer le joueur n°8 ! ";
            }
            
            
            if ($valid) {
                
                $modMatch = $this->loadModel('Match');
                $coloneMatch = array('ID_TOURNOI','TYPE_MATCH','ID_PHASE', 'DATE_HEURE');
                $valeurMatch = array($_SESSION['idtournoi'],'1',1, $d['date']." ".$d['time']);
                
                $id = $modMatch->insertAI($coloneMatch, $valeurMatch);
                
                $modScore = $this->loadModel('Score');
                $colones = array('ID_MATCH','ID_JOUEUR');
                $valeurs = array($id,$_POST['joueur1']);
                $modScore->insert($colones, $valeurs);
                $valeurs = array($id,$_POST['joueur2']);
                $modScore->insert($colones, $valeurs);
                
                $id = $modMatch->insertAI($coloneMatch, $valeurMatch);
                $modScore = $this->loadModel('Score');
                $colones = array('ID_MATCH','ID_JOUEUR');
                $valeurs = array($id,$_POST['joueur3']);
                $modScore->insert($colones, $valeurs);
                $valeurs = array($id,$_POST['joueur4']);
                $modScore->insert($colones, $valeurs);
                
                $id = $modMatch->insertAI($coloneMatch, $valeurMatch);
                $modScore = $this->loadModel('Score');
                $colones = array('ID_MATCH','ID_JOUEUR');
                $valeurs = array($id,$_POST['joueur5']);
                $modScore->insert($colones, $valeurs);
                $valeurs = array($id,$_POST['joueur6']);
                $modScore->insert($colones, $valeurs);
                
                $id = $modMatch->insertAI($coloneMatch, $valeurMatch);
                $modScore = $this->loadModel('Score');
                $colones = array('ID_MATCH','ID_JOUEUR');
                $valeurs = array($id,$_POST['joueur7']);
                $modScore->insert($colones, $valeurs);
                $valeurs = array($id,$_POST['joueur8']);
                $modScore->insert($colones, $valeurs);
                
                $d['info'] .= 'Les matchs de demi-finale ont été crées !';
            }

   
        }
        $this->set($d);
    }

    public function listePH() {
        
        $modPFMatchScoreJoueur = $this->loadModel('PFMatchScoreJoueur');
        $projection = 'matchs.ID_MATCH, matchs.DATE_HEURE,phases_finales.LIBELLE,GROUP_CONCAT(joueurs.PSEUDO SEPARATOR " vs ") AS JOUEURS, GROUP_CONCAT(CONCAT(joueurs.PSEUDO, " = ",IFNULL(scores.SCORE, "Pas de score")) SEPARATOR " | ") AS SCORES';
        $conditions = array('matchs.ID_TOURNOI'=>$_SESSION['idtournoi'],'matchs.TYPE_MATCH'=>'1');
        $groupby = 'matchs.ID_MATCH';
        $param = array('projection'=>$projection,'groupby'=>$groupby,'conditions'=>$conditions);
        $d['matchs'] = $modPFMatchScoreJoueur->find($param);
        $this->set($d);
    }
}
