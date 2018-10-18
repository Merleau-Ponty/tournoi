<?php

class JoueurPoule extends Model{
    //put your code here
     var $table='joueurs inner join poules on joueurs.id_poule = poules.id_poule';
}
?>
