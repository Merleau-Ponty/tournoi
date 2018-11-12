<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <nav>
                <ul class="pagination">
                    <li class="page-item disabled"><a class="page-link" href="#">Poule n°</a></li>
                    <?php
                    for ($i = 1; $i <= 8; $i++):
                        ?>
                        <li class="page-item
                        <?php
                        if ($num_poule == $i) {
                            echo ' active';
                        }
                        ?>
                            "><a class="page-link" href="<?= BASE_URL ?>/matchpoule/liste/<?= $i ?>"><?= $i ?></a></li>
                    <?php endfor; ?>
                </ul>
            </nav>
            <h1>Poule n°<?= $num_poule ?></h1>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Match n°</th>
                        <th>Horaire</th>
                        <th>Joueurs</th>
                        <th>Scores</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($match_poule as $ligne):
                        ?>
                        <tr>
                            <td><?= $ligne->ID_MATCH; ?></td>
                            <td><?= $ligne->DATE_HEURE; ?></td>
                            <td><?= $ligne->JOUEURS; ?></td>
                            <td><?= $ligne->SCORES; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table> 
        </div>

