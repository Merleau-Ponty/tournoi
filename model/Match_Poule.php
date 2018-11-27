
<?php

class Match_Poule extends Model {
    
    public $table = "match_poule";
    
}
?>


<!--
SQL :

CREATE VIEW match_poule AS
SELECT poules.NUMERO, matchs.ID_MATCH,  matchs.DATE_HEURE
FROM poules
INNER JOIN matchs ON poules.ID_POULE = matchs.ID_POULE


-->