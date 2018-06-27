<?php
namespace Core;
use PDO;

class ORM{
	private $bdd;
	
	public function __construct(){
		try {
			$this->bdd = new \PDO('mysql:host=localhost;dbname=PiePHP;charset=utf8', 'root', '');	
		}
		catch (PDOexception $e) {
			die('Erreur : ' . $e->getMessage());
		}
	}
	
	// retourne un id
	public function create() {
		$table = $this->table; // users
		$fields = $this->getPublicVars(); // array

		$i = 0;
		$insert = "(";
		$values = "(";
		while($i < (count($fields))){
			++$i;
			$insert .= "`".key($fields)."`";
			$values .= ":".key($fields)."";
			next($fields);

			if($i != (count($fields))){
				$insert .= ", ";
				$values .= ", ";
			}
		}
		$insert .= ")";
		$values .= ")";

		$query = "INSERT INTO " . $table . " " . $insert . " 
		VALUES " . $values . ";";

		$exec = $this->bdd->prepare($query);
		reset($fields);

		$i = 0;	
		$bind = [];
		while($i < (count($fields))) {
			++$i;
			$bind[key($fields)] = current($fields);
			next($fields);
		}

		if($exec->execute($bind)){
			return $this->bdd->lastInsertId();
		}
		else {
			return false;
		}
	}

	// retourne un tableau
	public function read($id, $table = null) {
		if($table == null) {
			$table = $this->table;
		}
		
		$select = "WHERE id = :id";
		$query = "SELECT * FROM " . $table . " " . $select . "";
		$exec = $this->bdd->prepare($query);
		if($exec->execute(array('id' => $id))) {
			if($row = $exec->fetch(PDO::FETCH_ASSOC)){
				return $row;
			}
			else {
				return false;
			}
		}
	}
	
	// retourne un booléen
	public function update() {
		$table = $this->table;
		$fields = $this->getPublicVars(); // Usefull in future
		
		$where = "WHERE id = :id";
		
		$set = '';
		$i = 0;
		while($i < (count($fields))) {
			++$i;
			$set .= key($fields) ." = '". current($fields) . "'";
			next($fields);
			
			if($i != (count($fields))){
				$set .= ", ";
			}
		}
		$query = "UPDATE ".$table." SET ".$set. " ". $where;
		$exec = $this->bdd->prepare($query);
		if($exec->execute(array('id' => $this->id))) {
			return true;
		}
		else {
			return false;
		}
	}
	
	// retourne un booléen
	public function delete() {
		$table = $this->table;
		
		$query = "DELETE FROM ".$table . " WHERE id = :id";
		$exec = $this->bdd->prepare($query);

		if($exec->execute(array('id' => $this->id))){
			return true;
		}
		else {
			return false;
		}
	}
	
	// retourne un tableau d'enregistrements
	public function find($params = array(
		'WHERE' => '1', 'ORDER BY' => 'id ASC', 'LIMIT' => ''), $table = null) {
		if($table == null) {
			$table = $this->table;
		}
			
		$query = "SELECT * FROM ".$table." ";
		foreach ($params as $key => $value) {
			if($value != ""){
				$query .= $key." ".$value." ";
			}
		}
		$exec = $this->bdd->prepare($query);
		
		if($exec->execute()){	
			return $exec->fetchAll(PDO::FETCH_ASSOC);
		}
		else {
			return false;
		}
	}
	
	public function getPublicVars(){
		function get($object) {
			return get_object_vars($object);
		}
		return get($this);
	}
}
