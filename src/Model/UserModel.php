<?php 
namespace src\Model;
use \Core\ORM;

class UserModel extends \Core\Entity {
// class UserModel{

	// relations
	private static $relations = ['hasMany' => ['articles'], 'hasOne' => ['comments']];
	protected $table = 'users';
	// private $params;
	
	// getter Relations pour transmettre la variable
	public function getRelations() {
		return self::$relations;
	}
	
	// public function __construct($params) {
	// 	$this->params = $params;
	// }
	
	// public function pieExec() {
		// $new = new ORM();
		// $new->create('users', $this->params); // OK
		// $new->read('users', INT); // OK
		// $new->update('users', INT, array('email' => '', 'password' => '')); //OK
		// $new->delete('users', INT); // OK
	// }
	
	public function connect() {
			echo __CLASS__ . " [Connexion OK]" . PHP_EOL;
	}

}
