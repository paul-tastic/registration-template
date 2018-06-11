<?php
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");
	$account = new Account();

	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

	function getInputValues($name) {
		if(isset($_POST[$name])) {
			echo $_POST[$name];
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>NMP Registration Page</title>
</head>
<body>
		<div id="inputContainer">
			<form id="loginForm" action="register.php" method="POST">
				<h2>Login to your account</h2>
				<p>
					<label for="username">Username:</label>
					<input id="username" type="text" name="loginUsername" placeholder="username" required>
				</p>
				<p>
					<label for="password">Password:</label>
					<input id="password" type="password" name="password" placeholder="password" required>
				</p>
				<button type="submit" name="loginButton">Log In</button>
			</form>

			<form id="registerForm" action="register.php" method="POST">
				<h2>Login to your account</h2>
				<p>
					<?php echo $account->getError(Constants::$usernameLength); ?>
					<label for="rUsername">Username:</label>
					<input id="rUsername" type="text" name="rUsername" placeholder="username" value="<?php getInputValues('rUsername') ?>" required>
				</p>
				<p>
					<?php echo $account->getError(Constants::$firstnameLength); ?>
					<label for="rFirstname">First Name:</label>
					<input id="rFirstname" type="text" name="rFirstname" placeholder="first name" value="<?php getInputValues('rFirstname') ?>" required>
				</p>
				<p>
					<?php echo $account->getError(Constants::$lastnameLength); ?>
					<label for="rLastname">Last Name:</label>
					<input id="rLastname" type="text" name="rLastname" placeholder="last name" value="<?php getInputValues('rLastname') ?>" required>
				</p>
				<p>
					<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
					<?php echo $account->getError(Constants::$emailInvalid); ?>
					<label for="rEmail">Email:</label>
					<input id="rEmail" type="email" name="rEmail" placeholder="email" value="<?php getInputValues('rEmail') ?>" required>
				</p>
				<p>
					<label for="r2Email">Confirm Email:</label>
					<input id="r2Email" type="email" name="r2Email" placeholder="confirm email" value="<?php getInputValues('r2Email') ?>" required>
				</p>
				<p>
					<?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
					<?php echo $account->getError(Constants::$passwordComposition); ?>
					<?php echo $account->getError(Constants::$passwordLength); ?>
					<label for="rPassword">Password:</label>
					<input id="rPassword" type="password" name="rPassword" placeholder="password" required>
				</p>
				<p>
					<label for="r2Password">Confirm Password:</label>
					<input id="r2Password" type="password" name="r2Password" placeholder="confirm password" required>
				</p>
				<button type="submit" name="registerButton">Sign Up</button>
			</form>
		</div>
</body>
</html>