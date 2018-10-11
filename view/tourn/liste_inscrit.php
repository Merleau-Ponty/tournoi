<!-- on affiche les lignes de la table messages ($d['messages'])=>$messages)-->
<table style="margin-left: 45%;">
    <tr><td>NOM</td><td>PRENOM</td><td>PSEUDO</td></tr>
    <?php foreach ($joueurs as $ligne):?>

    <tr class="tableau arrondi">

        <td class="tableau arrondi"><?= $ligne->NOM; ?></td>
        <td class="tableau arrondi"><?= $ligne->PRENOM; ?></td>
        <td class="tableau arrondi"><?= $ligne->PSEUDO; ?></td>

    </tr>
    <?php endforeach;?>
</table>
