
Skip to content

    Pull requests
    Issues
    Marketplace
    Explore

    @nolanmrq

2
1

    0

Merleau-Ponty/tournoi
Code
Issues 0
Pull requests 0
Projects 0
Wiki
Insights
tournoi/controller/MatchController.php
4d400b2 8 days ago
Nolan Messages d'info généralisés de toutes les view via un affichage dans …
62 lines (54 sloc) 2.43 KB
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class matchController extends Controller {
    public function score($id_match) {
        $valid = TRUE;
        $d['id_match'] = $id_match;
        if (isset($_POST["Score_1"]) && isset($_POST["Score_2"])) {
            $s1 = $_POST["Score_1"];
            $s2 = $_POST["Score_2"];
            if (!empty($s1) || !empty($s2)) {
                if (preg_match('/^[0-9]+$/', $s1) == 0 || preg_match('/^[0-9]+$/', $s2) == 0) {
                    $valid = FALSE;
                    $info = 'Afficher l\'erreur';
                }
            } else {
                $valid = FALSE;
                $info = 'Afficher l\'erreur';
            }
        } else {
            $valid = FALSE;
        }
        
        if ($valid == TRUE) {
            $modScore = $this->loadModel('Score');
            $donnes = array('SCORE' => $_POST["Score_1"]);
            $conditions = array(" ID_MATCH" => $id_match, " ID_JOUEUR" => $_POST["J_1"]);
            $params = array('donnees' => $donnes, 'conditions' => $conditions);
            $modScore->update($params);
            $modScore = $this->loadModel('Score');
            $donnes = array('SCORE' => $_POST["Score_2"]);
            $conditions = array(" ID_MATCH" => $id_match, " ID_JOUEUR" => $_POST["J_2"]);
            $params = array('donnees' => $donnes, 'conditions' => $conditions);
            $modScore->update($params);
            $redirect = $_SESSION['redirect'];
            unset($_SESSION['redirect']);
            $_SESSION['info'] = 'Les scores des joueurs n°' . $_POST["J_1"] . ' et n°' . $_POST['J_2'] . ' pour le match n°' . $id_match . ' ont bien été enregistrés success';
            $this->redirect($redirect);
            exit();
        } else {
            if (isset($info)) {
                $_SESSION['info'] = 'Il y a une erreur dans le formulaire<br>Veuillez rentrer tous les champs avec des caractères numériques danger';
            }
            $modScore = $this->loadModel('ScoreJoueur');
            $projection = 'joueurs.ID_JOUEUR,joueurs.PSEUDO';
            $conditions = array("scores.ID_MATCH" => $id_match);
            $params = array('projection' => $projection, 'conditions' => $conditions);
            $d['scores'] = $modScore->find($params);
            $this->set($d);
        }
    }
}