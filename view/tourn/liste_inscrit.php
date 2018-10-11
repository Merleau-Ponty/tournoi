<h1>Liste Secondaire</h1>
<td>PSEUDO</td></tr>
<?php foreach ($joueurs as $ligne):?>
<?php if ($ligne->ETAT==0){
    echo '
    <table style="margin-left: 55%;">
    <tr class="tableau arrondi ">

        <td class="tableau arrondi">'.$ligne->PSEUDO.'</td>
        <td class="tableau arrondi">'.$ligne->ETAT.'</td>

    </tr>
    </table>';
    
}
else {
    }
?>
<?php endforeach;?>
  <h1>Liste Principale</h1>
<td>PSEUDO</td></tr>  
 <?php foreach ($joueurs as $ligne):?>
    
<?php if ($ligne->ETAT==1){
    echo '
    <table style="margin-left: 55%;">
    <tr class="tableau arrondi ">


        <td class="tableau arrondi">'.$ligne->PSEUDO.'</td>
        <td class="tableau arrondi">'.$ligne->ETAT.'</td>

    </tr>
    </table>';
    
}
else {
    }
?>
<?php endforeach;?>
       


