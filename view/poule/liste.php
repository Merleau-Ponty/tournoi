<?php
if (!isset($tournoi)) {
    die("Pas de tournoi envoyer !");
}

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($joueurs)) {
    ?>

    <table style="width:90%; margin-left: 5%; margin-right:5%" class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Poule</th> 
                <th>Nom</th>
                <th>Prenom</th>
                <th>Pseudo</th>
            </tr>
        </thead>

        <?php
        $table = "";
        foreach ($joueurs as $player) {
            $table = $table . "<tr>"
                    . "<td>" . $player->ID_JOUEUR . "</td>"
                    . "<td>" . $player->ID_POULE . "</td>"
                    . "<td>" . $player->NOM . "</td>"
                    . "<td>" . $player->PRENOM . "</td>"
                    . "<td>" . $player->PSEUDO . "</td>"
                    . "</tr>";
        }
        echo $table;
        ?>

    </table>

<a href="./acceuil_organisateur" class="btn btn-sucess" style="padding:0% 47%; margin: 1%">Retour</a>

    <?php
} else {
    ?>
    <form method="post">
        <div class="form-group">
            <label class="col-md-4 control-label" for="tournoi">Tournoi</label>
            <div class="col-md-4">
                <?php
                $vide = true;
                $option = "";
                foreach ($tournoi as $tour) {
                    if (isset($tour->NOM)) {
                        $option = $option . '<option value="' . $tour->ID_TOURNOI . '">' . $tour->NOM . '</option>';
                        $vide = false;
                    }
                }
                if ($vide !== true) {
                    echo '<select id="tournoi" name="tournoi" class="form-control">';
                    echo $option;
                    echo '</select>';
                } else {
                    echo 'Aucun tournoi disponible !!';
                }
                ?>
            </div>
        </div>

        <!-- Button (Double) -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="Valider"></label>
            <div class="col-md-8">
                <?= $vide ? '' : '<button id="Valider" name="Valider" class="btn btn-success">Valider</button>' ?>
                <button id="Annuler" name="Annuler" class="btn btn-danger">Annuler</button>
            </div>
        </div>
    </form>
    <?php
}