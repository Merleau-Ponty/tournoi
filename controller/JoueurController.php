<?php

/**
 * Description of JoueurController
 *
 * @author Maxime GLOD
 */
class JoueurController extends Controller {

//Inscription d'un joueur

    public function inscription_joueur() {

        $modJoueurs = $this->loadModel('Joueur'); //Charger le modèle de Joueur
        $d['joueurs'] = $modJoueurs->find(); //Mettre les données dans un tableau
        $this->set($d);

        //Initialisation des champs

        $d['nom'] = '';
        $d['prenom'] = '';
        $d['pseudo'] = '';
        $d['tournoi'] = '';
        $info = '';
        $score = 0;
        $victoires = 0;
        $etat = 0;
        $inscription = false;
        $valid = true;

        $modTournois = $this->loadModel('Tournoi'); //Charger le modèle de Tournoi
        $d['tournois'] = $modTournois->find(); //Mettre les données dans un tableau
        //cas ou le formulaire a été soumis

        if (isset($_POST['nom'])) {
            $d['nom'] = $_POST['nom'];
            $d['prenom'] = $_POST['prenom'];
            $d['pseudo'] = $_POST['pseudo'];
            $d['tournoi'] = $_POST['tournoi'];
            if (isset($_POST['inscription'])) {
                $inscription = true;
            }

            //validation des données du formulaire d'inscription

            if (empty($d['nom'])) {
                $valid = false;
                $info = $info . "Le nom est obligatoire !<br>";
            }

            if (empty($d['prenom'])) {
                $valid = false;
                $info = $info . "Le prénom est obligatoire !<br>";
            }
            if (empty($d['pseudo'])) {
                $valid = false;
                $info = $info . "Le pseudo est obligatoire !<br>";
            }


            //on prépare la requête SQL si les données sont valides
            if ($valid && $inscription) {

                $modJoueurs = $this->loadModel('Joueur'); //Charger le modèle de Joueur
                $colones = array('ID_TOURNOI', 'NOM', 'PRENOM', 'PSEUDO', 'ETAT', 'SCORE_TOTAL', 'NB_VICTOIRES');
                $valeurs = array($d['tournoi'], $d['nom'], $d['prenom'], $d['pseudo'], $etat, $score, $victoires);

                $id = $modJoueurs->insertAI($colones, $valeurs);
                $_SESSION['info'] = 'Merci pour votre inscription ' . $d['pseudo'] . ' ! success';
            } else {
                $_SESSION['info'] = $info . ' danger';
            }
        }
        $this->set($d);


        $info = '';

        $Joueur = $this->loadModel('Joueur');

        $p = 1; //Etat du joueur de liste principale

        $condition = array("ETAT" => $p, "ID_TOURNOI" => $d['tournoi']);
        $params['conditions'] = $condition;
        $ligneP = $Joueur->find($params);
        $listeprincipale = count($ligneP); //On compte le nombre de joueur en liste Principale


        $s = 0; //Etat du joueur de liste secondaire

        $condition2 = array("ETAT" => $s, "ID_TOURNOI" => $d['tournoi']);
        $params2['conditions'] = $condition2;
        $ligneS = $Joueur->find($params2);
        $listesecondaire = count($ligneS); //On compte le nombre de joueur en liste Secondaire
        //Mise à jour de l'état des joueurs lors de l'inscription d'un nouveau joueur

        if ($listesecondaire >= 8 && $listesecondaire % 8 == 0 && $listeprincipale < 64) { //Si le nombre de joueurs en liste secondaire est divisible par 8 et compris entre 8 et 64, alors on les met en liste principale si il reste de la place
            $condition = array("ETAT" => 0, "ID_TOURNOI" => $d['tournoi']);
            //valeur a mettre à jour
            $donnees = array("ETAT" => 1);
            //a mettre dans un seul tabnleau
            $requete = array("donnees" => $donnees, "conditions" => $condition);
            $info = $modJoueurs->update($requete);

            $this->set($d);
        }
    }

}
