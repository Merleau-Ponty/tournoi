<?php
	if ($_SESSION["tab"] == true) {
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1>Composition des poules :</h1>
            <p>Nombre de joueurs : <?=$nb_joueur?>
            <br>Nombre de poules : 8 </p>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Poule n°</th>
                        <th>Joueurs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($poule_joueur as $ligne):
                        ?>
                        <tr>
                            <td><?= $ligne['poule'] ?></td>
                            <td><?= $ligne['joueur'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table> 
        </div>
	<?php
	}
	else {}
	unset($_SESSION["tab"]);
	?>
