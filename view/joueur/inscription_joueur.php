<form  style="text-align: center;" name="monForm" method="post" action="<?= BASE_URL ?>/joueur/inscription_joueur" >
    <!-- On initialise les données si le formulaire n'est pas encore submit --> 
    <?php
    if (isset($_POST['nom'])) {
        
    } else {
        $_POST['nom'] = '';
        $_POST['prenom'] = '';
        $_POST['pseudo'] = '';
    }
    ?>
    <div >
        <label for="nom">Nom</label>
        <br>
        <!-- Si on inscrit des données et que certaines sont fausse, on les recharge dans la page -->
        <input class="arrondi" type='text' maxlength="50" name='nom' value="<?php echo $_POST['nom']; ?>" size='15' id='nom' onkeypress="verifierCaracteres(event); return false;" />
    </div>
    <div>
        <label for="prenom">Prénom</label>
        <br>
        <!-- Si on inscrit des données et que certaines sont fausse, on les recharge dans la page -->
        <input class="arrondi" type='text'maxlength="50" name='prenom' value="<?php echo $_POST['prenom']; ?>" size='15' id='prenom' onkeypress="verifierCaracteres(event); return false;" />
    </div>
    <div>
        <label for="pseudo">Pseudo</label>
        <br>
        <!-- Si on inscrit des données et que certaines sont fausse, on les recharge dans la page -->
        <input class="arrondi" type='text' maxlength="15" name='pseudo' value="<?php echo $_POST['pseudo']; ?>" size='15' id='pseudo' />
    </div>
    <label for="tournoi">Tournoi</label>
    <br>
    <!-- Si on inscrit des données et que certaines sont fausse, on les recharge dans la page -->
    <select class="arrondi" style="padding: 0.5%;" name='tournoi' id="tournoi" >

        <?php foreach ($tournois as $tournoi): ?>

            <?php
            $selected = "";
            if ($tournoi->ID_TOURNOI == $_POST['tournoi']) {
                $selected = "selected";
            }
            ?>

            <option value="<?= $tournoi->ID_TOURNOI ?>" <?= $selected ?>><?= $tournoi->NOM ?></option>

        <?php endforeach; ?>

    </select>
    </input>

    <div >
        <br>
        <input class="btn" type='submit' name='inscription' value='Inscription' />
    </div>
</form>
<p style="text-align: center;"><strong><?= $info ?></strong></p>

<script type="text/javascript" language="javascript">

    function verifierCaracteres(event) {

        var keyCode = event.which ? event.which : event.keyCode;
        var touche = String.fromCharCode(keyCode);
        var champ = document.getElementById('mon_input');
        var caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        if (caracteres.indexOf(touche) >= 0) {
            champ.value += touche;
        }

    }
</script>