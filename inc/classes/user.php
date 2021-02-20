<?php

class user{
	private $status;
	public $con;

	private $f_name;
	private $l_name;
	private $email;
	private $password;

	public function __construct($f_name, $l_name, $email, $password){
		// Validate Data
		if ($this->validate_f_name($f_name) && $this->validate_l_name($l_name) && $this->validate_email($email) && $this->validate_password($password) == TRUE ) {

			$this->con = mysqli_connect("localhost", "root", "root", "e-shop");
				if (!$this->con) {
					echo 'Database Connection Error '.mysqli_connect_error($this->con);
				}

			$this->f_name = $f_name;
			$this->l_name = $l_name;
			$this->email = $email;
			$this->password = $password;

			$this->status = true;
		}
	}




						/*GET functions*/
	public function get_f_name(){
		return $this->f_name;
	}
	public function get_l_name(){
		return $this->l_name;
	}
	public function get_email(){
		return $this->email;
	}
	public function get_password(){
		return $this->password;
	}
	public function get_status(){
		return $this->status;
	}
						/* ! GET functions ! */




						/*SET functions*/
	public function set_f_name($f_name){
		$this->f_name = $f_name;
	}
	public function set_l_name($l_name){
		$this->l_name = $l_name;
	}
	public function set_email($email){
		$this->email = $email;
	}
	public function set_password($password){
		$this->password = $password;
	}
						/* ! SET functions ! */


	

	public function insert_user($table_name, $first_name, $last_name, $email, $password){
		$sql = "INSERT INTO ".$table_name." (firstname, lastname, email, password, CreatedAt, UpdatedAt) VALUES ('".$first_name."', '".$last_name."','".$email."', '".$password."', now(), now())";

		if (mysqli_query($this->con, $sql)) {
			return true;
		}else{
			echo mysqli_error($this->con);
		}
	}

	public function isEmpty(){
		if (is_null($this->f_name)) {
			return false;
		}
		if (is_null($this->l_name)) {
			return false;
		}
		if (is_null($this->email)) {
			return false;
		}
		if (is_null($this->password)) {
			return false;
		}
		return true;
	}

	public function validate_f_name($f_name){
		if (!isset($f_name)) {
    	return false;
	  }
	  if (strlen(trim($f_name)) < 3 ) {
	    return false;
	  }
	  return true;
	}

	public function validate_l_name($l_name){
		if (!isset($l_name)) {
    	return false;
	  }
	  if (strlen(trim($l_name)) < 3 ) {
	    return false;
	  }
	  return true;
	}

	public function validate_email($email){
		if (!isset($email)) {
      return false;
    }
    if (strlen(trim($email)) < 6) {
      return false;
    }
    if (!strpos($email, '@')) {
      return false;
    }
    if (!strpos($email, '.')) {
      return false;
    }
    return true;
	}

	public function validate_password($password){
		if (!isset($password)) {
      return false;
    }
    if (strlen(trim($password)) < 6) {
      return false;
    }
    if (strtoupper($password) == $password || strtolower($password) == $password) {
    	return false;
    }
    return true;
	}



}



?>