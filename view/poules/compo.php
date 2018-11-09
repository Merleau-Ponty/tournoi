<h3 style="text-decoration: underline;">Composition des poules</h3>

<div>Nombre de joueurs :
<?php
$nb = 2; //nombre de joueurs par poules
$i = 0;
foreach ($joueurs as $ligne) {
    $i++;
}
echo $i;
?>
</div>

<div>Nombre de poules :
<?php
    $j = intval($i / $nb);
    echo $j;
?>
</div>

<div>Personnes en liste d'attente :
<?php
    $k = $i % 8;
    echo $k;
?>
</div>
<br>

<form  name="new" method="post" action="<?= BASE_URL ?>/poules/compo">
    <div>
        <input type='submit' name='new' value='Nouveau tirage' />
    </div>
</form>

<?php
    $m = 1;
    $p = 0;
    ?><div style="font-weight:bold;">Poule n°<?=$m;?></div><?php
    $tab = shuffle($joueurs);
    foreach ($joueurs as $ligne) {
        $p++;
        ?><div><?=$ligne->PSEUDO;?></div><?php
        if ($p % $nb == 0 && $p<$i) {
            $m = $m + 1;
            ?><div style="font-weight:bold;">Poule n°<?=$m;?></div><?php
        }
    }
?>