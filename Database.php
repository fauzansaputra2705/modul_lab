<?php 
	class Database
	{
	    public $db;

	    public function connect()
	    {
	    	try {
	    		$this->db = new PDO('mysql:host=localhost;dbname=laboratorium','root', '');
	    		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    	} catch (PDOException $e) {
	    		echo $e->getMessage();
	    	}
	    }
	}
?>