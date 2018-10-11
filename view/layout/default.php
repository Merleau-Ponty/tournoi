
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Gestion Tournoi Jeux Vidéos</title>
<link href="<?= BASE_SITE ?>/css/style.css" rel="stylesheet" type="text/css">
</head>
<div id="header">
<h1 id="bandeau"><img id="ea" src="<?= BASE_SITE ?>/img/ea.png" width="80" height="80" alt="Electronic Arts"/><a href="home.php" style="text-decoration:none; color: white;">Gestion Tournoi Jeux Vidéos</a><a href="acceuil_organisateur"><img id="login" src="<?= BASE_SITE ?>/img/logo.png" width="190" height="80" alt=""/></a></h1>
</div>
<body>

</body>
</html>
<!doctype html>
 
<body id="appli">
    <p id="label">
        <span id="inscription_logol"><a href="inscription_visiteur.php" style="text-decoration:none; color: black;">S’inscrire en ligne</span></a> 
<span id="liste_joueurl"><a href="liste_inscrit.php" style="text-decoration:none; color: black;">Lister les Inscrits</span></a>
<span id="liste_tournoil"><a href="liste_match.php" style="text-decoration:none; color: black;">Lister les matchs</span></a>
    </p>
    <p id="choixjoueur">
    <span id="inscription_logo">    
        <a href="<?= BASE_URL ?>/tourn/inscription_visiteur" style="text-decoration:none; color: black;"><img src="<?= BASE_SITE ?>/img/Capture1.PNG" width="200" height="200" alt=""/></a>
    </span>
    <span id="liste_joueur">
        <a href="<?= BASE_URL ?>/tourn/liste_inscrit" style="text-decoration:none; color: black;"><img src="<?= BASE_SITE ?>/img/Capture2.PNG" width="200" height="200" alt=""/></a>
    </span>
    <span id="liste_tournoi">
        <a href="<?= BASE_URL ?>/tourn/liste_match" style="text-decoration:none; color: black;"><img src="<?= BASE_SITE ?>/img/Capture3.PNG" width="200" height="210" alt=""/></a>
    </span>
    </p>
    

     
                    <?= $content_for_layout ?>
        
</body>
</html>
