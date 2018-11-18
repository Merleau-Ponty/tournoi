<h1>Création des poules du tournoi <?=$_SESSION['nom']?></h1>
<?php unset($_SESSION['nom']); ?>
<form class="form-horizontal" method="POST" action="<?= BASE_URL ?>/poule/creaPoule">

    <div class="form-group">
        <label class="col-md-4 control-label" for="nb_poule">Nombre de poules</label>
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
    <div class="form-group">
        <label class="col-md-4 control-label" for="Valider"></label>
        <div class="col-md-8">
           <button id="Valider" name="Valider" class="btn">Valider</button>
        </div>
    </div>
</form>
