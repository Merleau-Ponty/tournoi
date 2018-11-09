<?php

class ScoreJoueur extends Model{
    //put your code here
    public $table='scores inner join joueurs on joueurs.ID_JOUEUR=scores.ID_JOUEUR';
}