<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Gestion Tournoi Jeux Vidéos</title>
<link href="<?= BASE_SITE ?>/css/style.css" rel="stylesheet" type="text/css">
<!-- Lien pour Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<div id="header">
<h1 id="bandeau"><img id="ea" src="<?= BASE_SITE ?>/img/ea.png" width="80" height="80" alt="Electronic Arts"/><a href="<?= BASE_URL ?>/tourn/home" style="text-decoration:none; color: white;">Gestion Tournoi Jeux Vidéos</a></h1>
</div>
<body>
<?php
    // liste des views où il ne faut pas afficher le menu
    $view_sans_menu = array("creaPoule","creaTournoi","home","inscription_joueur","choix_tournoi");
    $affich_menu = TRUE;
    // vérification que la vue qui va être chargé ne soit pas dans la liste
    foreach ($view_sans_menu as $vsm) {
        if (strcmp($vsm,$view) == 0){
            $affich_menu = FALSE;
        }
    }
    if ($affich_menu == TRUE){
        include 'menu.php';
    }
    //Gestion des messages d'info pour toutes les pages
    if (isset($_SESSION['info'])){
        $info = $_SESSION['info'];
        unset($_SESSION['info']);
        $alert = 'light';
        // Les différentes alertes que bootstrap intègrent, l'espace avant le mot est indispensable
        $alerts = [' primary',' secondary',' success',' danger',' warning',' info',' light',' dark'];
        $mot = substr($info,strrpos(trim($info),' ')); // Récupération du type d'alerte
        $position_espace = strrpos($info, " "); //on récupère l'emplacement du dernier espace dans la chaine, pour ne pas découper un mot.
        $info = substr($info, 0, $position_espace);  //on découpe à la fin du dernier mot
        foreach ($alerts as $a){
            if(strcmp($a,$mot) == 0){
                $alert = substr($mot,1); // Pour enlever l'espace devant le mot
            }
        }
        echo '<div class="alert alert-'.$alert.' alert-dismissible fade show" role="alert" id="info">';
        echo $info;
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }
?>
 

    

     
                    <?= $content_for_layout ?>
        
</body>
</html>
