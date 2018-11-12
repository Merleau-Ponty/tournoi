<?php

class poulesController extends Controller
{
    //page d'accueil
    public function accueil(){}
    
    //affectation des joueurs
    public function affectation(){
        //liste des joueurs
        $modJoueur = $this->loadModel("Joueur");
	$d["joueurs"] = $modJoueur->find();
	$this->set($d);
    }
    
    public function compo()
    {
        //récupérer le nombre de joueurs
        $modJoueur = $this->loadModel("Joueur");
	$d["joueurs"] = $modJoueur->find();
	$this->set($d);
    }
    
}

?>