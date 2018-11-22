<?php

class PoulController extends Controller
{
    public function compo()
    {
        //récupérer les joueurs
        $modJoueur = $this->loadModel("Joueur");
		$d["joueurs"] = $modJoueur->find();
	
        //mélanger les joueurs
        $tab = shuffle($d["joueurs"]);
        
        //mise à jour
        $d["info"] = "";
        $i = 0;
        $nbJoueurs = 8;
        $numPoule = 1;
        foreach ($d["joueurs"] as $ligne) {
            $i++;
            if ($i % $nbJoueurs == 0 && $i<$nbJoueurs) {
                $numPoule = $numPoule + 1;
                echo "Poule n°".$numPoule;
                $i = 0;
            }
            $cle = array("ID_JOUEUR"=>$ligne->ID_JOUEUR);
            $donnees = array("ID_POULE"=>$numPoule);
            $req = array("donnees"=>$donnees,"cle"=>$cle);
            $d["info"] = $modJoueur->update($req);
        }
        $this->set($d);
        //find avec les joueurs et le numéro de tournoi pour avoir le numéro renseigné
        //affichage
    }
    
}

?>
