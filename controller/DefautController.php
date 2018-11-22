<?php

/**
 * Description of defautController
 *
 * @author Maxime GLOD
 */
class DefautController extends Controller {

    //méthode appelée par défaut
    function index() {
        $url = "Location: http://" . SERVER . BASE_URL . '/tourn/home';
        header($url);
    }

}
