<h1 style="margin-left: 42%;">Liste Secondaire</h1>

<?php foreach ($joueurs as $ligne):?>
<?php if ($ligne->ETAT==0){
    echo '

    <table style="margin-left: 48%;" style="margin-left: 48%;">

       <th> <td class="tableau arrondi" style="margin-left: 48%; ">'.$ligne->PSEUDO.'</td>

    </tr>
    </table>';
    
}
else {
    }
?>
<?php endforeach;?>
  <h1 style="margin-left: 42%;">Liste Principale</h1>

 <?php foreach ($joueurs as $ligne):?>
    
<?php if ($ligne->ETAT==1){
    echo '
    <table style="margin-left: 48%;">
    <tr class="tableau arrondi ">


        <td class="tableau arrondi">'.$ligne->PSEUDO.'</td>
     

    </tr>
    </table>';
    
}
else {
    }
?>
<?php endforeach;?>
       


