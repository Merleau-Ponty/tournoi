<?php
//Paramètres pour la connexion à la base de données.
class Conf {

    static $debug = 1;
    static $databases = array(
        'default' => array(
            'host' => 'localhost',
            'database' => 'tournoi',
            'login' => 'root',
            'password' => ''
        )
    );

}
