<?php

class MatchPouleController extends Controller {
    
    public function create($num_poule){
        
        $num_poule = 1;
        //On charge le model JoueurPoule pour rechercher les joueurs qui sont dans la poule désigner
        $model = $this->loadModel('JoueurPoule');
        $projection = 'Joueurs.id_joueur,Joueurs.pseudo,Poules.numero';
        $condition = array("Poules.numero"=>$num_poule);
        $params = array( 'projection' => $projection,'conditions'=>$condition);
        $result = $model->find($params); // Récupération des joueurs

        // On attribut à chaque joueurs tous les combats contre les joueurs de sa poule
        for ($i = 0; $i <= (count($result)-1);$i++){
            $joueur1 = $result[$i];
            for ($y = $i+1; $y <= (count($result)-1);$y++){
                $joueur2 = $result[$y];
                $matchs[] = array('joueur1'=>$joueur1,'joueur2'=>$joueur2);
            }
        }
        // Tableau multidimmensionnel
        // $matchs = array -> match1, match2, etc...
        // chaque match = array -> joueur1, joueur2
        // chaque joueur = array -> id_joueur, pseudo, etc... (à modifier dans la projection de la requête)
        $d['matchs'] = $matchs;
        $d['joueurpoule'] = $result;
        
        
        
        $this->set($d);
    } 
    
    //Liste les matchs de poules
    public function liste($num_poule){
        


         
        //Permet de lister les matchs dans une poule avec le pseudo des joueurs, leur scores et l'horaire des matchs.
        $modelmatch_poule = $this->loadModel('JoueursScoresMatch_poule');
        $projection ='match_poule.numero, match_poule.id_match, match_poule.date_heure, GROUP_CONCAT(joueurs.PSEUDO) AS joueurs, GROUP_CONCAT(CONCAT(joueurs.PSEUDO, " ",IFNULL(scores.SCORE,0))) AS SCORES';
        $groupby = 'match_poule.id_match';
        $condition = array('numero'=>$num_poule);
        $params = array( 'projection' => $projection,'groupby'=>$groupby,'conditions' => $condition);
        $listematch = $modelmatch_poule->find($params);
        $idmatch = 'match_poule.id_match';
        $d['match_poule'] = $listematch;
        $d['num_poule'] = $num_poule;
        $d['num_match'] = $idmatch;
        
       $this->set($d);
        
       
       
        /*
        
         SQL : Permet d'afficher dans chaque poule, chaque match, avec l'horaire du match et de ces joueurs
        select match_poule.numero, match_poule.id_match, match_poule.date_heure, GROUP_CONCAT(joueurs.PSEUDO) AS joueurs, GROUP_CONCAT(CONCAT(joueurs.PSEUDO, ' ',IFNULL(scores.SCORE,0))) AS SCORES
        FROM joueurs 
        INNER JOIN scores on scores.ID_JOUEUR = joueurs.ID_JOUEUR 
        INNER JOIN match_poule ON match_poule.ID_MATCH = scores.ID_MATCH 
        GROUP BY match_poule.id_match
        ORDER BY match_poule.numero

        */
       
        
  
        
    }
    
    }
       

?>