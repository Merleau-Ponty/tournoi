<?php

class JoueursScoresMatch_poule extends Model {
    
    public $table = "joueurs 
        INNER JOIN scores on scores.ID_JOUEUR = joueurs.ID_JOUEUR 
        INNER JOIN match_poule ON match_poule.ID_MATCH = scores.ID_MATCH";
    
}
?>
