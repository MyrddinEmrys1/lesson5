<?php
session_start();
$_SESSION['login'] = FALSE;
$error = '';
if (isset($_GET['q']) && $_GET['q'] == 'exit') {
	session_destroy ();
}
if (isset($_POST['login'], $_POST['password'])){
	$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
	$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
	if ($login == 'admin' && $password == 'qwerty'){
		$_SESSION['login'] = TRUE;
	}
	else {
		$error = 'Wrong username or password.';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Task 1</title>
</head>
<body>
	<?php 
		if ($_SESSION['login'] == TRUE) {
			print '<h1>Welcome!</h1>';
			echo '<br><a href="index.php?q=exit">Exit</a>';
		}
		else {
			if (!empty($error)) {
				echo $error;
			}
	?>
			<form action="index.php" method="post">
				<label>Login:
					<div><input type="text" name="login" required></div>
				</label>
				<label>Password:
					<div><input type="password" name="password" required></div>
				</label>
				<input type="submit" value="Submit">
			</form>
	<?php } ?>
</body>
</html>
