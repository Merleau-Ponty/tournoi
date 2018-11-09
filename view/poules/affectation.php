<h3 style="text-decoration: underline;">Page d'affectation des joueurs aux poules</h3>

<div style="text-decoration: underline;">Liste des joueurs :</div>
<table>
    <?php foreach ($joueurs as $ligne) : ?>
    <tr>
        <td><?=$ligne->PSEUDO;?></td>
    </tr>
    <?php endforeach; ?>
</table>

<form  name="compo" method="post" action="<?= BASE_URL ?>/poules/compo">
    <div>
        <input type='submit' name='compo' value='Affecter les joueurs aux poules' />
    </div>
</form>