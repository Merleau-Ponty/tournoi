<h1>Création de tournoi</h1>

<?php
    if(isset($info)){
        echo "<h4>$info</h4>";
    }
?>

<form  name="monForm" method="post" class="form-horizontal" action="<?= BASE_URL ?>/tourn/creaTournoi" >
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nomTournoi">Nom du tournoi </label>  
  <div class="col-md-4">
  <input id="nomTournoi" name="NOM" type="text" placeholder="Nom" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="JEU">Jeu du tournoi</label>  
  <div class="col-md-4">
  <input id="JEU" name="JEU" type="text" placeholder="Smash Bros Ultimate" class="form-control input-md">
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="DATEDEBUT">Date de début du tournoi</label>  
  <div class="col-md-4">
  <input id="DATEDEBUT" name="DATEDEBUT" type="date" placeholder="JJ/MM/AAAA" class="form-control input-md">
   
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="DATEFIN">Date de fin du tournoi</label>  
  <div class="col-md-4">
  <input id="DATEFIN" name="DATEFIN" type="date" placeholder="JJ/MM/AAAA" class="form-control input-md">
    
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="PRIX">Cash Prize</label>  
  <div class="col-md-4">
      <input id="PRIX" name="PRIX" type="number" placeholder="" class="form-control input-md" min="0" step="1">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="DATELIMITE_INSCR">Date limite d'inscription</label>  
  <div class="col-md-4">
  <input id="DATELIMITE" name="DATELIMITE_INSCR" type="date" placeholder="JJ/MM/AAAA" class="form-control input-md">
    
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Validation"></label>
  <div class="col-md-8">
    <button class="btn btn-primary" type='submit' name='creatournoi' value='creer'> Créer</button>
  </div>
</div>

</fieldset>
</form>