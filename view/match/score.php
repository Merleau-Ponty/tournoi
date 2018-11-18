<?php
$compt = 0;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1>Scores du match <?= $id_match ?></h1>
            <form method="post" action="<?= BASE_URL ?>/match/score/<?= $id_match ?>">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Identifiants</th>
                            <th>Joueurs</th>
                            <th>Scores</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($scores as $ligne):
                            $compt++;
                            ?>
                            <tr>
                                <td><?= $ligne->ID_JOUEUR ?></td>
                                <input type="hidden" value="<?= $ligne->ID_JOUEUR ?>" name="J_<?= $compt ?>">
                                <td><?= $ligne->PSEUDO ?></td>
                                <td> <input type="text" name="Score_<?= $compt ?>"> </td> 
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <button type="submit" name="valider" value="Submit">Submit</button>
            </form>
        </div>