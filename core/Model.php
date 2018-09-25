<?php

/*
 * 25/09/2018 amelioration de la class
 */

/**
 * Description of Controller
 *
 * @author travail
 */
class Model {

    static $connections = array();
    public $conf = 'default';
    public $table = false;
    public $db;

    function __construct() {
        //connexion à la base
        $conf = Conf::$databases[$this->conf];
        if (isset(Model::$connections[$this->conf])) {
            $this->db = Model::$connections[$this->conf];
        }

        try {
            $pdo = new PDO('mysql:host=' . $conf['host'] . ';dbname=' . $conf['database'] . ';', $conf['login'], $conf['password'], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
            );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            Model::$connections[$this->conf] = $pdo;
            $this->db = Model::$connections[$this->conf];
        } catch (PDOException $e) {
            if (Conf::$debug >= 1) {
                die($e->getMessage());
            } else {
                die('impossible de se connecter à la base de données');
            }
        }
        //initialisation de variables
        if ($this->table === false) {
            $this->table = strtolower(get_class($this)) . 's';
        }
    }

    function find($req = '') {
        $sql = 'select ';
        //si la projection est renseignée on l'utilise sinon on met toutes les colonnes (*)
        if (isset($req['projection'])) {
            $sql .= $req['projection'] . ' ';
        } else {
            $sql .= '* ';
        }
        $sql .= ' from ' . $this->table . ' ';
        //construction de la condition

        if (isset($req['conditions'])) {
            $sql .= 'where ';
            if (!is_array($req['conditions'])) {
                $sql .= $req['conditions'];
            } else {
                $cond = array();
                foreach ($req['conditions'] as $k => $v) {
                    if (!is_numeric($v)) {
                        $v = $this->db->quote($v);
                    }
                    $cond[] = "$k = $v ";
                }
                $sql .= implode(' AND ', $cond);
            }
            $sql .= ' ';
        }
        // si le group by est renseigné on l'ajoute à la requete
        if (isset($req['groupby'])) {
            $sql .= 'group by ';

            $sql .= $req['groupby'];
        }

        $pre = $this->db->prepare($sql);
        $pre->execute();

        return $pre->fetchall(PDO::FETCH_OBJ);
    }

    function findFirst($req) {
        return current($this->find($req));
    }

    function delete($req) {
        $sql = 'delete from ' . $this->table . ' ';
        //construction de la condition

        if (isset($req['conditions'])) {
            $sql .= 'where ';
            if (!is_array($req['conditions'])) {
                $sql .= $req['conditions'];
            } else {
                $cond = array();
                foreach ($req['conditions'] as $k => $v) {
                    if (!is_numeric($v)) {
                        $v = $this->db->quote($v);
                    }
                    $cond[] = "$k = $v ";
                }
                $sql .= implode(' AND ', $cond);
            }
        }
        $info = null;
        try {
            $pre = $this->db->prepare($sql);
            $pre->execute();


//on traite l'exception dans le catch
        } catch (PDOException $e) {
            $info = $e->getMessage();
        }
        return $info;
    }

    function update($req) {
        $sql = 'update ' . $this->table . ' set ';
        //on récupère les données à mettre à jour dans $req['donnees'] et la clef primaire dans $req['cle']
        //on met des quotes aux chaines de caractères
        $cond = array();
        foreach ($req['donnees'] as $k => $v) {
            if (!is_numeric($v)) {
                $v = $this->db->quote($v);
            }
            $cond[] = "$k = $v ";
        }
        $sql .= implode(',', $cond);
        $sql .= ' where ';
        $cle = array();
        foreach ($req['cle'] as $k => $v) {
            if (!is_numeric($v)) {
                $v = $this->db->quote($v);
            }
            $cle[] = "$k = $v ";
        }

        $sql .= implode('AND', $cle);

        $pre = $this->db->prepare($sql);
        $pre->execute();
    }

    //inserer une ligne avec une colonne en ai
    function insertAI($colonnes, $donnees) {
        $sql = 'insert into ' . $this->table . ' ( ';
        $sql .= implode(',', $colonnes);
        $sql .= ') values(';
        //on récupère les données à mettre à jour dans $req['donnees'] et la clef primaire dans $req['cle']
        //on met des quotes aux chaines de caractères
        $cond = array();
        foreach ($donnees as $v) {
            if (!is_numeric($v)) {
                $v = $this->db->quote($v);
            }
            $cond[] = $v;
        }
        $sql .= implode(',', $cond);

        $sql .= ');';


        $pre = $this->db->prepare($sql);
        $pre->execute();
        $tab = $this->db->query('SELECT LAST_INSERT_ID() as last_id');
        $tab1 = $tab->fetchALL(PDO::FETCH_ASSOC);
        $last_id = $tab1[0]['last_id'];
        return $last_id;
    }

}
