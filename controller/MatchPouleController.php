<?php

class MatchPouleController extends Controller {
    
    public function create($num_poule_current){
        
        // Définition du context
        $_SESSION['idtournoi'] = 1;
        $_SESSION['datedebut'] = '2016-10-20 12:12:00';
        $tmp = explode(' ', $_SESSION['datedebut']);
        $_SESSION['date'] = $tmp[0];
        $_SESSION['time'] = $tmp[1];
        $_SESSION['datefin'] = '2020-10-20 12:12:00';
        
        //unset($_SESSION['poule_created']);
        // Pour charger les joueurs d'une poule et renvoie un tableau de matchs
        $d['num_poule'] = $num_poule_current;
               
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
            // Si toutes les données sont valides, on insert les données 
            if ($valid == TRUE){
                foreach ($matchs as $match){
                    //Matchs
                    $colonnes = array('id_tournoi','id_poule','type_match','date_heure');
                    $values = array($_SESSION['idtournoi'],$num_poule_current,'0',$match['date_heure']);
                    $id_match = $modelMatchs->insertAI($colonnes,$values);
                    //Scores
                    $colonnes = array('id_joueur','id_match');
                    $values = array($match['joueur1'],$id_match);
                    $modelScores->insertAI($colonnes,$values);
                    $values = array($match['joueur2'],$id_match);
                    $modelScores->insertAI($colonnes,$values);  
                }
                
                // Affichage de l'info dans la prochaine view
                $_SESSION['info'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                        Les matchs de la poule numéro '.$num_poule_current.' ont bien été créés.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
                
                // Gestion de la création des poules qui va servir à la redirection
                // Si c'est la première fois qu'on arrive dans les création des matchs
                if(!isset($_SESSION['poule_created'])){
                    // On crée la variable de session on enregistrant la poule créée
                    $poule_created[] = $num_poule_current;
                    $_SESSION['poule_created'] = $poule_created;
                } else {
                    // Sinon on récupère les poules créées et on ajoute celle-ci
                    $poule_created = $_SESSION['poule_created'];
                    $poule_created[] = $num_poule_current;
                    $_SESSION['poule_created'] = $poule_created;
                }
                
                // Gestion des redirections
                // Si tous les matchs ne sont pas créés on gère automatiquement la redirection de page
                if(count($_SESSION['poule_created'])<8){
                    // Cette variable va déterminer les poules qui reste à créées
                    $poules = ['1','2','3','4','5','6','7','8'];
                    // Pour chaque poule créée on supprime dans $poules sa correspondance
                    foreach ($_SESSION['poule_created'] as $num){
                        foreach ($poules as $cle => $poule){
                            if ($num == $poule){
                                unset($poules[$cle]);
                            }
                        }
                    }
                    // On récupère le premier numéro du tableau de poules restantes
                    $num_poule = (array_shift(array_keys($poules))+1);
                    // Redirection vers la poule qui reste à faire
                    $this->redirect('/matchpoule/create/'.($num_poule));
                    // Permet d'arrêter l'exécution du code pour effectuer la redirection
                    exit();
                } else {
                    // Toutes les matchs de poule sont créés
                    $this->redirect('/matchpoule/liste/1');
                    // Permet d'arrêter l'exécution du code pour effectuer la redirection
                    // Utilisé dans le cadre que le code de la view n'affecte pas le traitement après la redirection
                    exit();                
                }
            } else {
                // Affichage de l'info dans la prochaine view
                $_SESSION['info'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        Il y a une erreur dans le formulaire, veillez resaisir les données !
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
                // On vide le $_POST pour recharger le formulaire
                unset($_POST);
                // Une données est invalide, on renvoie donc sur le formulaire de la même poule
                $this->redirect('/matchpoule/create/'.($num_poule_current));
                // Permet d'arrêter l'exécution du code pour effectuer la redirection
                exit();
            }
        // Chargement du formulaire
        } else {
            
            //On charge le model JoueurPoule pour rechercher les joueurs qui sont dans la poule désignée
            $model = $this->loadModel('JoueurPoule');
            $projection = 'Joueurs.id_joueur,Joueurs.pseudo,Poules.numero';
            $condition = array("Poules.numero"=>$num_poule_current);
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