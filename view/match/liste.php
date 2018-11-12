<h2>Liste des matchs</h2>



<table border="5px">
    <tr>
        <td>Id Match</td>  
        <td>Modifier le score</td>
    </tr>
    <?php foreach ($matchs as $ligne):?>
    <tr>    
       <td><?=$ligne->ID_MATCH;?></td>

       
       
       <td>
           <a href="<?= BASE_URL ?>/match/score/<?= $ligne->ID_MATCH?>">Modifier</a>
       </td>       

       
    </tr>
    
    <?php endforeach;?>
  
</table>