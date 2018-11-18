<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1>Matchs de phases finales :</h1>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Match n°</th>
                        <th>Phase</th>
                        <th>Horaires</th>
                        <th>Joueurs</th>
                        <th>Scores</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $_SESSION['redirect'] = "/matchfin/listePH";
                    foreach ($matchs as $ligne):
                        ?>
                        <tr>
                            <td><?= $ligne->ID_MATCH; ?></td>
                            <td><?= $ligne->LIBELLE; ?></td>
                            <td><?= $ligne->DATE_HEURE; ?></td>
                            <td><?= $ligne->JOUEURS ?></td>
                            <td><?= $ligne->SCORES; ?></td>
                            <td><a href="<?= BASE_URL ?>/match/score/<?= $ligne->ID_MATCH; ?>"><button type="button" class="btn btn-primary">Modifier les scores</button></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table> 
        </div>

