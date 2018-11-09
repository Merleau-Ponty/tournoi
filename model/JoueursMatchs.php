<?php

class JoueursMatchs extends Model {
    
    public $table = " matchs inner join joueurs on matchs.id_poule=joueurs.id_poule";
    
    public function getTable(){
        return $this->table;
    }    
}
?>
