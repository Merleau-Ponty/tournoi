<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of defautController
 *
 * @author Maxime GLOD
 */
class defautController extends Controller{
    //méthode appelée par défaut
    function index(){
        $url="Location: http://".SERVER.BASE_URL.'/tourn/home';
        header($url);
        
    }
}
