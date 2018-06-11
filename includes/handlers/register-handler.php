<?php

	function cleanUpUsername($item) {
		$newItem = strip_tags($item);
		$newItem = str_replace(" ", "", $newItem);
		return $newItem;
	}

	function cleanUpString($item) {
		$newItem = strip_tags($item);
		$newItem = str_replace(" ", "", $newItem);
		$newItem = ucfirst(strtolower($newItem));
		return $newItem;
	}

	function cleanUpPassword($item) {
		$newItem = strip_tags($item);
		return $newItem;
	}

	if(isset($_POST['registerButton'])) {
		// register button pressed
		$username = cleanUpUsername($_POST['rUsername']);
		$firstname = cleanUpString($_POST['rFirstname']);
		$lastname = cleanUpString($_POST['rLastname']);
		$email1 = cleanUpString($_POST['rEmail']);
		$email2 = cleanUpString($_POST['r2Email']);
		$password = cleanUpPassword($_POST['rPassword']);
		$password2 = cleanUpPassword($_POST['r2Password']);

		$registrationSuccessful = $account->register($username, $firstname, $lastname, $email1, $email2, $password, $password2);

		if($registrationSuccessful) {
			header("Location: index.php");
		}


	}


?>