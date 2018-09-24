

<!DOCTYPE html>

<!--test sur les téléphones portables -->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
        <!--a rajouter -->
        <div >
            <!--fin -->
            <ul >
                <li class="active" ><a href="<?= BASE_URL ?>lien"> Accueil </a> </li>
                

            </ul>
        </div>

        <section >
            <?= $content_for_layout ?>
        </section>
   
</body>
</html>
