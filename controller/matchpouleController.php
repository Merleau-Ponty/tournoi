<?php

class pouleController extends Controller {
    
    public function create($num_poule){
        
        // Définition du context
        $_SESSION['idtournoi'] = 1;
        $_SESSION['datedebut'] = '2016-10-20 12:12:00';
        $tmp = explode(' ', $_SESSION['datedebut']);
        $_SESSION['date'] = $tmp[0];
        $_SESSION['time'] = $tmp[1];
        $_SESSION['datefin'] = '2020-10-20 12:12:00';
        
        // unset($_SESSION['poule_created']);
        // Pour charger les joueurs d'une poule et renvoie un tableau de matchs
        $d['num_poule'] = $num_poule;

        //Test pour savoir si on rentre pour la première fois sur la page et charger les joueurs
        //Si le formulaire est existant on fait les insert sinon on charge le form
        if(isset($_POST['date_0'])){
            
            $modelMatchs = $this->loadModel('Matchs');
            $modelScores = $this->loadModel('Scores');
            
            // Variable servant à la validation du formulaire
            $valid = TRUE;
            
            // Récupération du nombre de match qui va service pour traîter le formulaire
            $nb_m = $_SESSION['nb_m'];
            unset($_SESSION['nb_m']);
            
            // Algorithme traitant le form
            for ($i = 0; $i < $nb_m; $i++){
                // Calcule l'id des joueurs donné dans le name du form
                $idJ1 = $i * 2 + 1;
                $idJ2 = $i * 2 + 2;
                
                // Récupération de l'id_joueur (clé primaire du joueur) stocké dans le form avec hidden
                $joueur1 = $_POST['joueur_'.$idJ1];
                $joueur2 = $_POST['joueur_'.$idJ2];
                
                // On récupère l'horaire
                $datetime = $_POST['date_'.$i].' '.$_POST['time_'.$i];
                
                // On test si les champs;ont bien étaient saisies
                if ($_POST['date_'.$i] != '' and $_POST['time_'.$i] != ''){
                    // Vérification des horaires
                    // On passe par l'objet DateTime pour pouvoir les comparer plus facilement
                    $dateMatch = new DateTime($datetime);
                    $datedebut = new DateTime($_SESSION['datedebut']);
                    $datefin = new DateTime($_SESSION['datefin']);
                    if($dateMatch < $datedebut or $dateMatch > $datefin ){
                        $valid = FALSE;
                    }
                } else {
                    $valid = FALSE; 
                }
                // On stock toutes les données pour ensuite toutes les insérer en même temps pour préserver l'intégrité des données
                $matchs[]= array('date_heure'=>$datetime,'joueur1'=>$joueur1,'joueur2'=>$joueur2);
            }
            var_dump($valid);
            // Si toutes les données sont valides, on insert les données 
            if ($valid == TRUE){
                foreach ($matchs as $match){
                    //Matchs
                    $colonnes = array('id_tournoi','id_poule','date_heure');
                    $values = array($_SESSION['idtournoi'],$num_poule,$match['date_heure']);
                    $id_match = $modelMatchs->insertAI($colonnes,$values);
                    //Scores
                    $colonnes = array('id_joueur','id_match');
                    $values = array($match['joueur1'],$id_match);
                    $modelScores->insertAI($colonnes,$values);
                    $values = array($match['joueur2'],$id_match);
                    $modelScores->insertAI($colonnes,$values);  
                }
                // Si on est à la poule 8, on dirige l'utilisateur vers la liste des matchs
                if ($num_poule == 8){
                    $this->redirect('/poule/liste/1');
                } else {
                    // Gestion des pages pour éviter que l'utilisateur refasse la même poule plusieurs fois
                    if(isset($_SESSION['poule_created'])){
                        $poule_created = $_SESSION['poule_created'];
                    }
                    $poule_created[] = $num_poule;
                    $_SESSION['poule_created'] = $poule_created;
                    // Redirection vers la poule d'après
                    $this->redirect('/poule/create/'.($num_poule+1));
                } 
            } else {
                // On vide le $_POST pour recharger le formulaire
                unset($_POST);
                // Une données est invalide, on revoie donc sur le formulaire de la même poule
                $this->redirect('/poule/create/'.$num_poule);
            }
        // Chargement du formulaire
        } else {        
        
            //On charge le model JoueurPoule pour rechercher les joueurs qui sont dans la poule désignée
            $model = $this->loadModel('JoueurPoule');
            $projection = 'Joueurs.id_joueur,Joueurs.pseudo,Poules.numero';
            $condition = array("Poules.numero"=>$num_poule);
            $params = array( 'projection' => $projection,'conditions'=>$condition);
            $result = $model->find($params); // Récupération des joueurs

            // On attribut à chaque joueurs tous les combats contre les joueurs de sa poule
            for ($i = 0; $i <= (count($result)-1);$i++){
                $joueur1 = $result[$i];
                for ($y = $i+1; $y <= (count($result)-1);$y++){
                    $joueur2 = $result[$y];
                    $matchs[] = array('joueur1'=>$joueur1,'joueur2'=>$joueur2);
                }
            }
            // Tableau multidimmensionnel
            // $matchs = array -> match1, match2, etc...
            // chaque match = array -> joueur1, joueur2
            // chaque joueur = array -> id_joueur, pseudo, etc... (à modifier dans la projection de la requête)
            $d['matchs'] = $matchs;
        }
        $this->set($d);
    } 
    
    public function liste($num_poule){
        
    }    
}
?>