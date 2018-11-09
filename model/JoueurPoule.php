<?php

class JoueurPoule extends Model {
    
    public $table = " joueurs inner join poules on joueurs.ID_JOUEUR=poules.ID_POULE";
    
    public function getTable(){
        return $this->table;
    }    
}
?>
