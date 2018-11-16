<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1>Veuillez choisir un tournoi :</h1>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>
                            Identifiant
                        </th>
                        <th>
                            Nom
                        </th>
                        <th>
                            Jeu
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($tournois as $tournoi):
                        ?>
                        <tr>
                            <td>
                                <a href="<?= BASE_URL ?>/tourn/tourn_valid/<?= $tournoi->ID_TOURNOI ?>"><?= $tournoi->ID_TOURNOI ?></a>
                            </td>
                            <td>
                                <?= $tournoi->NOM ?>
                            </td>
                            <td>
                                <?= $tournoi->JEU ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table> 
        </div>
    </div>
</div>

