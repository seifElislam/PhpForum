<?php
// require_once '../init.php';

class Thread {

	private $id;
	private $title;
	private $description;
	private $forum_id ;
	private $user_id ;
	private $locked;
	private $sticky ;

	function __construct($id, $title, $description, $forum_id, $user_id, $locked = 0,$sticky=0) {

		$this->db = new DBManager();
		$this->id = $id;
		$this->title = $title ;
		$this->description = $description ;
		$this->forum_id = $forum_id ;
		$this->user_id = $user_id ;
		$this->locked = $locked ;
		$this->sticky = $sticky;
	}

	function __set($field, $value) {
		$this->$field = $value;
	}

	function __get($field) {
		return $this->$field;
	}

	function addThread() {
         $this->db->makeQuery(
         	"INSERT into thread VALUES(
         	null,
         	'".$this->title."',
         	'".$this->description."',
         	'".$this->locked."',
         	'".$this->forum_id."',
         	'".$this->user_id."',0,null,null)");
	}

	function deleteThread() {

		$this->db->makeQuery("DELETE FROM `thread` where id ='" . $this->id . "'");
	}

	function editThread() {

		$this->db->makeQuery("UPDATE thread SET
			`title`='".$this->title."',
			`description`='".$this->description."',
			`forum_id`='".$this->forum_id."',
			`locked` ='".$this->locked."',
			`user_id`='".$this->user_id."',
			`sticky`='".$this->sticky."'
			 WHERE  `id` = '".$this->id."'");
	}
}


?>