<?php
class PFMatchScoreJoueur extends Model{
    
    var $table = 'phases_finales'
            . ' INNER JOIN matchs ON phases_finales.ID_PHASE = matchs.ID_PHASE'
            . ' INNER JOIN scores ON matchs.ID_MATCH = scores.ID_MATCH'
            . ' INNER JOIN joueurs ON scores.ID_JOUEUR = joueurs.ID_JOUEUR';
    
}

