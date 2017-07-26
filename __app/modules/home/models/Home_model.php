<?php

class Home_model extends CI_Model {
  private $tm_user  = "tm_user";
    public function __construct() {
        parent::__construct();
    }

    
	public function cek_login($username){
		
		$this->db->where("username",$username);
		
		
		return $this->db->get($this->tm_user);
		
		
	}
	
	
	
}
