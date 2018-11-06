<table border="1px">
    <?php foreach ($joueurpoule as $ligne):?>
    <tr>
        <td><?=$ligne->id_joueur;?></td>
        <td><?=$ligne->pseudo;?></td>
        <td><?=$ligne->numero;?></td>
    </tr>
    <?php endforeach;?>
</table>
<br>
<table border="1px">
    <?php foreach ($matchs as $match):?>
        <tr>
            <?php foreach ($match as $joueur):?>
                <td><?=$joueur->pseudo?></td>
            <?php endforeach;?>
        </tr>
    <?php endforeach;?>
</table>