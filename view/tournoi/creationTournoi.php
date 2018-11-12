<form  name="monForm" method="post" class="form-horizontal" action="<?= BASE_URL ?>/tournoi/creationTournoi" >
    
<fieldset>

<!-- Form Name -->
<legend>Création tournoi</legend>

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
  <input id="DATEDEBUT" name="DATEDEBUT" type="text" placeholder="JJ/MM/AAAA" class="form-control input-md">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="DATEFIN">Date de fin du tournoi</label>  
  <div class="col-md-4">
  <input id="DATEFIN" name="DATEFIN" type="text" placeholder="JJ/MM/AAAA" class="form-control input-md">
    
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="PRIX">Cash Prize</label>  
  <div class="col-md-4">
  <input id="PRIX" name="PRIX" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="DATELIMITE">Date limite d'inscription</label>  
  <div class="col-md-4">
  <input id="DATELIMITE" name="DATELIMITE" type="text" placeholder="JJ/MM/AAAA" class="form-control input-md">
    
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Validation"></label>
  <div class="col-md-8">
    <button id="Validation" name="Validation" class="btn btn-success">Valider</button>
    <button id="Réinitialisation" name="Réinitialisation" class="btn btn-danger">Réinitialiser</button>
  </div>
</div>

</fieldset>
</form>