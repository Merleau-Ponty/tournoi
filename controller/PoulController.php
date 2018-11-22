<?php

class PoulController extends Controller
{
    public function compo(){
        
		$_SESSION["tab"] = true;
		
        //récupérer les joueurs
        $modJoueur = $this->loadModel("Joueur");
        $modPoule = $this->loadModel("Poule");
		
        $conditions = array('ETAT'=>'1','ID_TOURNOI'=>$_SESSION['idtournoi']);
        $param = array('conditions'=>$conditions);
		$joueurs = $modJoueur->find($param);
		$j = $joueurs[0];
		
		
		if ($j->ID_POULE == null) {

		
		$tab = shuffle($joueurs);
	
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
            $cle = array('ID_JOUEUR'=>$joueur->ID_JOUEUR);
            $param = array('donnees' => $donnes,'cle' =>$cle);
            $modJoueur->update($param);
        }
        $d['poule_joueur'] = $poule_joueur;
        
        if($num_poule != 8){
            $_SESSION['info'] = 'Il y a un problème dans la composition des poules, veuillez consulter l\'administrateur ! danger';
        } else {
            $_SESSION['info'] = 'La composition des poules a bien été effectuée, voici un récapitulatif : success';
        }
        
        $this->set($d);
		var_dump($joueurs["ID_POULE"]);
        }
		else {
			$_SESSION["tab"] = false;
			$_SESSION["info"] = "Les joueurs sont déjà dans des poules ! info";
			$poule_joueur[] = array();
		}
    }
    
}

?>
