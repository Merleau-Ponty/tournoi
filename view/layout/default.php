

<!DOCTYPE html>

<!--test sur les téléphones portables -->
<html>
    <head>
<!--        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?php echo isset($title_for_layout) ? $title_for_layout : 'Gestion des tournois'; ?></title>
       <link href='<?php echo BASE_SITE . DS . '/css/style.css' ?>' rel="stylesheet">

        <style type="text/css">
            /* Style pour l'exemple*/

        </style>
    </head>
    <body >


        <header  >
          
            <h1 > BTS SIO Gestion des tournois</h1>
        </header>
        a rajouter 
        <div >
            fin 
            <ul >
                <li class="active" ><a href="<?= BASE_URL ?>lien"> Accueil </a> </li>
                

            </ul>
        </div>

        <section >

        </section>-->
<?php
$test=include (BASE_URL .'/tourn/header.php');
echo $test;
?>
<!doctype html>
<body id="appli">
    <p id="label">
        <span id="inscription_logol"><a href="inscription_visiteur.php" style="text-decoration:none; color: black;">S’inscrire en ligne</span></a> 
<span id="liste_joueurl"><a href="liste_inscrit.php" style="text-decoration:none; color: black;">Lister les Inscrits</span></a>
<span id="liste_tournoil"><a href="liste_match.php" style="text-decoration:none; color: black;">Lister les matchs</span></a>
    </p>
    <p id="choixjoueur">
    <span id="inscription_logo">    
        <a href="<?= BASE_URL ?>/tourn/inscription_visiteur" style="text-decoration:none; color: black;"><img src="webroot/img/Capture1.PNG" width="200" height="200" alt=""/></a>
    </span>
    <span id="liste_joueur">
        <a href="<?= BASE_URL ?>/tourn/liste_inscrit" style="text-decoration:none; color: black;"><img src="webroot/img/Capture2.PNG" width="200" height="200" alt=""/></a>
    </span>
    <span id="liste_tournoi">
        <a href="<?= BASE_URL ?>/tourn/liste_match" style="text-decoration:none; color: black;"><img src="webroot/img/Capture3.PNG" width="200" height="210" alt=""/></a>
    </span>
    </p>
    

        <footer>Site réalisé par l'équipe SIO17LMP</footer>
                    <?= $content_for_layout ?>
</body>
</html>
