<?php
$compt = 0;
?>
<h2>Scores du match <?= $id_match?></h2>

<form method="post" action="<?= BASE_URL ?>/match/score/<?=$id_match?>">

<table border="5px">
    <tr>
        <td>Id Joueur</td>
        <td>Joueur</td>
        <td>Score</td>
    </tr>
    <?php foreach ($scores as $ligne):
        $compt++;
        ?>
    <tr>    
       
       <td><?=$ligne->ID_JOUEUR?></td>
       <input type="hidden" value="<?=$ligne->ID_JOUEUR?>" name="J_<?=$compt?>">
       <td><?=$ligne->PSEUDO?></td>
       <td> <input type="text" name="Score_<?=$compt?>"> </td> 
       
    </tr>
    <?php endforeach;?>
  
</table>
    
    <button type="submit" name="valider" value="Submit">Submit</button>
</form>