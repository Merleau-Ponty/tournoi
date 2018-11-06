<?php

class JoueurPoule extends Model {
    
    public $table = " joueurs inner join poules on joueurs.id_poule=poules.id_poule";
    
    public function getTable(){
        return $this->table;
    }    
}
?>
