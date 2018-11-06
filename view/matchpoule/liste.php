

<!--On affiche les lignes de la table messages $d['messages']-->
<h1>Poule n°<?=$num_poule?></h1>

<table  border="1px">
     <tr>
        <th>Match n°</th>
        <th>Horaire</th>
        <th>Joueurs</th>
        <th>Scores</th>
    </tr>
    <!--<?php print_r ($match_poule);?>-->
    <?php foreach ($match_poule as $ligne):?>
   <tr>
        <td><?=$ligne->ID_MATCH;?></td>
        <td><?=$ligne->DATE_HEURE;?></td>
        <td><?=$ligne->joueurs;?></td>
        <td><?=$ligne->SCORES;?></td>
    </tr>
    <?php endforeach;?>
</table>

