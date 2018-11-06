<div class="arrondi">
<h1 style="text-align: center;">Liste Principale</h1>

 <?php foreach ($joueurs as $ligne):?>
    
<?php if ($ligne->ETAT==1){
    echo '
    <table style="margin-left: 48%;">
    <tr class="tableau arrondi " >


        <td class="tableau arrondi" style="text-align: center;">'.$ligne->PSEUDO.'</td>
     

    </tr>
    </table>';
    
}
else {
    }
?>
<?php endforeach;?>
<h1 style="text-align: center;">Liste Secondaire</h1>

<?php foreach ($joueurs as $ligne):?>
<?php if ($ligne->ETAT==0){
    echo '

    <table style="margin-left: 48%;" >

       <th> <td class=" arrondi" style="margin-left: 48%; font-family:verdana, sans-serif;
    font-size:100%;
    color:orange;
    text-align:center;
    background-color:transparent;
    border-color:orange;
    border-style:solid;
    border-width:3px;">'.$ligne->PSEUDO.'</td>

    </tr>
    </table>';
    
}
else {
    }
?>
<?php endforeach;?>
 
</div>    



