<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <!-- HEADER -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <!-- MENU -->
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Messages</a>
                </li>
                <li class="nav-item dropdown ml-md-auto">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown">Dropdown link</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider">
                        </div> <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-md-10">
            <?php
            if(isset($_SESSION['info'])){
                echo $_SESSION['info'];
                unset($_SESSION['info']);
            }
            ?>
            
<!--*************************** CONTENT ********************************* -->
            
<?php
$j = 0;
$compt = 0;
?>
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
                        if(isset($_SESSION['poule_created'])){
                            foreach ($_SESSION['poule_created'] as $numero){
                                if ($numero == $i){
                                    echo ' disabled';
                                }
                            }
                        }
                        ?>
                    "><a class="page-link" href="<?= BASE_URL ?>/matchpoule/create/<?= $i ?>"><?= $i ?></a></li>
                <?php endfor;?>
                </ul>
            </nav>
            <h1>Horaires à entrer pour les matchs de la poule <?= $num_poule ?></h1>
            <form method="post" action="<?= BASE_URL ?>/matchpoule/create/<?= $num_poule ?>">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>
                                Match
                            </th>
                            <th>
                                Horaire
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($matchs as $match):
                            $compt = $compt + 1;
                            ?>
                            <tr>
                                <td>
                                    <p style="font-size: 22px">
                                    <?php
                                    foreach ($match as $joueur):
                                        $j = $j + 1;
                                        if ($j % 2 != 0) {
                                            echo '<span class="badge badge-pill badge-dark">' . $joueur->PSEUDO . "</span> VS ";
                                        } else {
                                            echo '<span class="badge badge-pill badge-dark">' . $joueur->PSEUDO;
                                        }
                                        ?>
                                        <input type="hidden" name="joueur_<?= $j ?>" value="<?= $joueur->ID_JOUEUR ?>"></input>
                                    <?php endforeach; ?>
                                    </p>
                                </td>
                                <td>
                                    <div class="form-group row">
                                        <label for="example-date-input" class="col-2 col-form-label">Date</label>
                                        <div class="col-10">
                                            <input class="form-control" type="date" name="date_<?= $compt - 1 ?>" value="<?= $_SESSION['date']?>" id="example-date-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-time-input" class="col-2 col-form-label">Heure</label>
                                        <div class="col-10">
                                            <input class="form-control" type="time" name="time_<?= $compt - 1 ?>" value="<?= $_SESSION['time']?>" id="example-time-input">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table> 
                <input class="btn btn-primary" type="submit" value="Enregistrer">    
            </form>
        </div>
    </div>
</div>
<?php $_SESSION['nb_m'] = $compt; ?>
