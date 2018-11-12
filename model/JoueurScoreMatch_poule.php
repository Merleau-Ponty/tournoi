<?php

class JoueurScoreMatch_poule extends Model {
    
    public $table = "joueurs 
        INNER JOIN scores on scores.ID_JOUEUR = joueurs.ID_JOUEUR 
        INNER JOIN match_poule ON match_poule.ID_MATCH = scores.ID_MATCH";
}

/*
 * CREATE VIEW match_poule AS
 * SELECT poules.ID_TOURNOI, poules.NUMERO, matchs.ID_MATCH, matchs.DATE_HEURE
 * from poules INNER JOIN matchs ON poules.ID_POULE = matchs.ID_POULE
 * 
 */

?>