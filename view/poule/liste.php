<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1>Liste des joueurs par poule</h1>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Poule n°</th>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Pseudo</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($joueurs as $player):
                        ?>
                        <tr>
                            <td><?= $player->NUMERO ?></td>
                            <td><?= $player->ID_JOUEUR ?></td>
                            <td><?= $player->NOM ?></td>
                            <td><?= $player->PRENOM ?></td>
                            <td><?= $player->PSEUDO ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table> 
            </div>