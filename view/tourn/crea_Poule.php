<php>
    

<form class="form-horizontal" method="POST" action="">
    <!-- Select Basic -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="nb_poule">Nombre de poule</label>
        <div class="col-md-4">
            <select id="nb_poule" name="nb_poule" class="form-control">
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="nb_joueurs">Nombre de joueurs</label>
        <div class="col-md-4">
            <select id="nb_joueurs" name="nb_joueurs" class="form-control">
                <option value="16">16</option>
                <option value="24">24</option>
                <option value="32">32</option>
                <option value="40">40</option>
                <option value="48">48</option>
                <option value="56">56</option>
                <option value="64">64</option>
            </select>
        </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="nb_joueurs">Tournoi</label>
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

</php>