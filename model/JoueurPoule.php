<?php

class JoueurPoule extends Model {
    
    public $table = "joueurs INNER JOIN poules ON joueurs.ID_POULE = poules.ID_POULE";
    
    public function getTable(){
        return $this->table;
    }    
}
?>
