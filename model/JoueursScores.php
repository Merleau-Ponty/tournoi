<?php

class JoueursScores extends Model {
    
    public $table = " joueurs inner join scores on joueurs.id_joueurs=scores.id_joueurs"; 
}
?>
