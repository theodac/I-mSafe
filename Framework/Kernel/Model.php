<?php
/**
 * Created by PhpStorm.
 * User: WEBENOO
 * Date: 07/11/2018
 * Time: 17:21
 */

class Model
{
    private static $connect = null;
    private $bdd;
    private $chat;
    public function __construct(){

        $strBddServeur = "localhost";
        $strBddLogin = "root";
        $strBddPassword = "123456";
        $strBddBase = "groupe";


        try{
            $this->bdd = new PDO('mysql:host='.$strBddServeur.';dbname='.$strBddBase,$strBddLogin,$strBddPassword,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
    }
    public function getInstance() {

        if(is_null(self::$connect)) {
            self::$connect = new Model();
        }
        return self::$connect;
    }

    // Permet d'effectuer une requête SQL. Retourne le résultat (s'il y en a un) de la requête sous forme d'objet
    public function requete($req){
        $query = $this->bdd->query($req);


        return $query;

    }

    public function select($table,$where = '',$orderby ='',$limit=''){
        $requete="SELECT * FROM $table ".$where.$orderby.$limit;
        $resultat=$this->bdd->query($requete);
        return $resultat;
    }
    public function delete($table,$where = ''){
        $requete="DELETE  FROM $table". $where;
        $resultat=$this->bdd->query($requete);
        return $resultat;
    }
    public function insert($table,$fields,$data){
        $requete = "INSERT INTO $table "."(".$fields.") VALUES (".$data.")"or die();
        $resultat= $this->bdd->query($requete);
        return $resultat;
    }
    public function update($table , $data , $where =''){
        $requete = "UPDATE ".$table." SET ".$data."".$where;
        $resultat = $this->bdd->query($requete);
        return $resultat;
    }

    // Permet de préparer une requête SQL. Retourne la requête préparée sous forme d'objet
    public function preparation($req){
        $query = $this->bdd->prepare($req);
        return $query;
    }

    // Permet d'exécuter une requête SQL préparée. Retourne le résultat (s'il y en a un) de la requête sous forme d'objet
    public function execution($query, $tab){
        $req = $query->execute($tab);
        return $req;
    }

    // Retourne l'id de la dernière insertion par auto-incrément dans la base de données
    public function dernierIndex(){
        return $this->bdd->lastInsertId();
    }

}
