<?php 

class Account {

	private $errorArray;

	public function __construct() {
		$this->errorArray = array();
	}

	public function register($username, $fname, $lname, $email1, $email2, $pass1, $pass2) {
		$this->validateUsername($username);
		$this->validateFirstname($fname);
		$this->validateLastname($lname);
		$this->validateEmails($email1, $email2);
		$this->validatePassword($pass1, $pass2);

		if(empty($this->errorArray)) {
			// inputs correct, no errors, register user!
			return true;
		} else {
			// errors in input, print out error message
			return false;
		}
	}

	public function getError($error) {
		// check error message to see if it exists
		if(!in_array($error, $this->errorArray)) {
			$error = "";
		}
		return "<span class='errorMessage'>$error</span>";
	}

	private function validateUsername($item) {
		// check length
		if ((strlen($item) < 5) || (strlen($item) > 20)) {
			array_push($this->errorArray, Constants::$usernameLength);
			return;
		}

	}

	private function validateFirstName($item) {
		if ((strlen($item) < 2) || (strlen($item) > 20)) {
			array_push($this->errorArray, Constants::$firstnameLength);
			return;
		}

	}

	private function validateLastName($item) {
		if ((strlen($item) < 2) || (strlen($item) > 20)) {
			array_push($this->errorArray, Constants::$lastnameLength);
			return;
		}

	}

	private function validateEmails($item1, $item2) {
		// 3 checks
		if($item1 != $item2) {
			array_push($this->errorArray, Constants::$emailsDoNotMatch);
			return;
		}
		if(!filter_var($item1, FILTER_VALIDATE_EMAIL)) {
			array_push($this->errorArray, Constants::$emailInvalid);
			return;
		}
		// check if email is already been used

	}

	private function validatePassword($item1, $item2) {
		// 3 checks
		if($item1 != $item2) {
			array_push($this->errorArray, Constants::$passwordsDoNotMatch);
			return;
		}
		// does it contain bad characters?
		if(preg_match('/[^A-Za-z0-9]/', $item1)) {
			array_push($this->errorArray, Constants::$passwordComposition);
			return;
		}
		if ((strlen($item1) < 5) || (strlen($item1)) > 20) {
			array_push($this->errorArray, Constants::$passwordLength);
			return;
		}
	}
	

}
?>