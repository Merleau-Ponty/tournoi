DROP TABLE IF EXISTS `SCORES`;
DROP TABLE IF EXISTS `MATCHS`;
DROP TABLE IF EXISTS `PHASES_FINALES`;
DROP TABLE IF EXISTS `JOUEURS`;
DROP TABLE IF EXISTS `POULES`;
DROP TABLE IF EXISTS `TOURNOIS`;
# -----------------------------------------------------------------------------
#       TABLE : SCORES
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS SCORES
 (
   ID_JOUEUR smallint(6) ,
    ID_MATCH smallint(6) ,
    SCORE int
  
 ) 
  ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
  
  
# -----------------------------------------------------------------------------
#       TABLE : JOUEURS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS JOUEURS
 (
   ID_JOUEUR smallint(6) NOT NULL AUTO_INCREMENT   PRIMARY KEY ,
   ID_TOURNOI smallint(6)  ,
   ID_POULE smallint(6)  ,
   NOM VARCHAR(50) NULL  ,
   PRENOM VARCHAR(50) NULL  ,
   PSEUDO VARCHAR(15) NULL  ,
   ETAT CHAR(1) NULL ,
   SCORE_TOTAL INT,
   NB_VICTOIRES INT
  
 ) 
 ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
 

# -----------------------------------------------------------------------------
#       TABLE : MATCH
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS MATCHS
 (
   ID_MATCH smallint(6) NOT NULL AUTO_INCREMENT   PRIMARY KEY ,
   TYPE_MATCH CHAR(1),
  ID_TOURNOI smallint(6)  ,
   ID_POULE smallint(6)  ,  
   ID_PHASE smallint(6),
   DATE_HEURE DATETIME  
  
 ) 
 ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


# -----------------------------------------------------------------------------
#       TABLE : POULES
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS POULES
 (
   ID_POULE smallint(6) NOT NULL AUTO_INCREMENT   PRIMARY KEY,
   NUMERO  tinyint(1),
   ID_TOURNOI smallint(6))
 ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


# -----------------------------------------------------------------------------
#       TABLE : TOURNOIS
# -----------------------------------------------------------------------------


CREATE TABLE IF NOT EXISTS TOURNOIS
 (
   ID_TOURNOI smallint(6) NOT NULL AUTO_INCREMENT   PRIMARY KEY,
   NOM VARCHAR(40),
   JEU VARCHAR(50),
   DATELIMITE_INSCR DATE,
   DATEDEBUT DATETIME  ,
   DATEFIN DATETIME  ,
   PRIX FLOAT  
    ) 
ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


# -----------------------------------------------------------------------------
#       TABLE : PHASES_FINALES
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PHASES_FINALES
 (
   ID_PHASE smallint(6) NOT NULL AUTO_INCREMENT   PRIMARY KEY ,
   LIBELLE VARCHAR(50) NULL   
  
 ) 
 ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE POULES 
  ADD FOREIGN KEY FK_POULES_TOURNOIS (ID_TOURNOI)
      REFERENCES TOURNOIS (ID_TOURNOI) ;


ALTER TABLE JOUEURS 
  ADD FOREIGN KEY FK_JOUEURS_TOURNOIS (ID_TOURNOI)
      REFERENCES TOURNOIS (ID_TOURNOI) ;


ALTER TABLE JOUEURS 
  ADD FOREIGN KEY FK_JOUEURS_POULES (ID_POULE)
      REFERENCES POULES (ID_POULE) ;


ALTER TABLE MATCHS 
  ADD FOREIGN KEY FK_MATCHS_POULES (ID_POULE)
      REFERENCES POULES (ID_POULE) ;


ALTER TABLE MATCHS
  ADD FOREIGN KEY FK_MATCHS_PHASE_PHASES_FINALES (ID_PHASE)
      REFERENCES PHASES_FINALES (ID_PHASE) ;


ALTER TABLE MATCHS 
  ADD FOREIGN KEY FK_MATCHS_TOURNOIS (ID_TOURNOI)
      REFERENCES TOURNOIS (ID_TOURNOI) ;

ALTER TABLE SCORES
 ADD PRIMARY KEY (ID_JOUEUR, ID_MATCH);


ALTER TABLE SCORES 
  ADD FOREIGN KEY FK_SCORES_JOUEURS (ID_JOUEUR)
      REFERENCES JOUEURS (ID_JOUEUR) ;


ALTER TABLE SCORES 
  ADD FOREIGN KEY FK_SCORES_MATCHS (ID_MATCH)
      REFERENCES MATCHS (ID_MATCH) ;


# -----------------------------------------------------------------------------
#       CREATION DE LA VIEW
# -----------------------------------------------------------------------------

CREATE VIEW match_poule AS
SELECT poules.ID_TOURNOI, poules.NUMERO, matchs.ID_MATCH, matchs.DATE_HEURE
from poules INNER JOIN matchs ON poules.ID_POULE = matchs.ID_POULE
