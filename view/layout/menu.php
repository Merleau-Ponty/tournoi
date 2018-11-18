<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <!-- MENU -->
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>/tourn/liste_inscrit">Liste des joueurs inscrits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>/poul/compo">Composition des poules</a>
                </li>
                <li class="nav-item dropdown ml-md-auto">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">Phase de poule</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?= BASE_URL ?>/matchpoule/create/1">Créer les matchs de poule</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= BASE_URL ?>/matchpoule/liste/1">Liste des matchs de poule</a>
                        <a class="dropdown-item" href="<?= BASE_URL ?>/poule/liste">Liste des joueurs par poule</a>
                </li>
                <li class="nav-item dropdown ml-md-auto">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">Phase finale</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?= BASE_URL ?>/matchfin/createPH1">Quart</a>
                        <a class="dropdown-item" href="<?= BASE_URL ?>/matchfin/createPH2">Demi</a>
                        <a class="dropdown-item" href="<?= BASE_URL ?>/matchfin/createPH3">Finale</a> 
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= BASE_URL ?>/matchfin/listePH">Liste des matchs de phase finale</a>					
                </li>
                <li class="nav-item">
                    <a href="<?= BASE_URL ?>/tourn/home">Retour au menu principal</a>
                </li>
            </ul>
        </div>
        <div class="col-md-10">
            <?php
            if (isset($_SESSION['info'])) {
                echo $_SESSION['info'];
                unset($_SESSION['info']);
            }
            ?>

