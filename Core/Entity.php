<?php 
namespace Core;

class Entity extends \Core\ORM{
	public function __construct($att = null) {
		parent::__construct();

		if(is_array($att)) {
			foreach($att as $key => $value){
				$this->{$key} = $value;
			}
		}
		elseif(is_int($att)){
			$user = $this->read($att);
			foreach($user as $key => $value){
				$this->{$key} = $value;
			}
			
			$relations = $this->getRelations();
			
			if(isset($relations['hasOne'])){
				$user_id = $_SESSION['id'];
				foreach($relations['hasOne'] as $relation){
					$this->{$relation} = $this->read($user_id, $relation);
				}
			}
			if(isset($relations['hasMany'])){
				$user_id = $_SESSION['id'];
				foreach($relations['hasMany'] as $relation){
					$this->{$relation} = $this->find(['WHERE' => "id_user = $user_id"], $relation);
				}
			}
		}
		
	}
}
