<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1>Match de finale :</h1>
            <form method="post" action="<?= BASE_URL ?>/matchfin/createPH3">
                <div class="form-group row">
                    <label for="example-date-input" class="col-2 col-form-label">Date</label>
                    <div class="col-10">
                        <input class="form-control" type="date" name="date" id="example-date-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-time-input" class="col-2 col-form-label">Heure</label>
                    <div class="col-10">
                        <input class="form-control" type="time" name="time" id="example-time-input">
                    </div>
                </div>
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>
                                Match
                            </th>
                            <th>
                                Joueur
                            </th>
                            <th>
                                VS
                            </th>
                            <th>
                                Joueur
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                1
                            </td>
                            <td>
                                <select name="joueur1" required="required" id="joueur1">
                                    <?php foreach ($joueurs as $joueur1): ?>
                                        <option value="<?= $joueur1->ID_JOUEUR ?>"><?= $joueur1->PSEUDO ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                <select name="joueur2" required="required" id="joueur2">
                                    <?php foreach ($joueurs as $joueur2): ?>
                                        <option value="<?= $joueur2->ID_JOUEUR ?>"><?= $joueur2->PSEUDO ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                </tbody>
                </table> 
                <input class="btn btn-primary" type="submit" value="Enregistrer">    
            </form>
        </div>
    </div>
</div>
