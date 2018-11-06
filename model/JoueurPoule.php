<?php

class JoueurPoule extends Model{
    //put your code here
     var $table='joueurs inner join poules on joueurs.ID_POULE = poules.ID_POULE';
}
?>
