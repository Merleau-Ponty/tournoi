<?php

class PoulController extends Controller
{
    public function compo(){
        
        //récupérer les joueurs
        $modJoueur = $this->loadModel("Joueur");
        $modPoule = $this->loadModel("Poule");
        $conditions = array('ETAT'=>'1','ID_TOURNOI'=>$_SESSION['idtournoi']);
        $param = array('conditions'=>$conditions);
	$joueurs = $modJoueur->find($param);
	
        $d['nb_joueur'] = count($joueurs);
        $j_par_p = $d['nb_joueur'] / 8;
        
        $num_poule = 0;
        foreach ($joueurs as $cle => $joueur){
            if($cle % $j_par_p == 0){
                $num_poule = $num_poule + 1;
            }
            
            $projection = 'ID_POULE';
            $conditions = array('ID_TOURNOI'=>$_SESSION['idtournoi'],'NUMERO'=>$num_poule);
            $param = array('projection'=>$projection,'conditions'=>$conditions);
            $result = $modPoule->find($param);            
            
            foreach ($result as $id){
                $id_poule=intval($id->ID_POULE);
            }
            
            $poule_joueur[] = array("joueur"=>$joueur->PSEUDO,"poule"=>$num_poule);
            
            $donnes = array('ID_POULE'=>intval($id_poule));
            $conditions = array('ID_JOUEUR'=>$joueur->ID_JOUEUR);
            $param = array('donnees' => $donnes,'conditions' =>$conditions);
            $modJoueur->update($param);
        }
        $d['poule_joueur'] = $poule_joueur;
        $this->set($d);
        //find avec les joueurs et le numéro de tournoi pour avoir le numéro renseigné
        //affichage
    }
    
}

?>