<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Task 2</title>
</head>
<body>
  <form action="index.php" method="post">
    <label>File name:
			<div><input type="text" name="name" required></div>
		</label>
    <label>File content:
			<div><textarea name="content" rows="10" cols="30" required></textarea></div>
		</label>
    <input type="submit" value="Submit">
  </form>
</body>
</html>

<?php
/*
	Питання: У випадку коли дані зберігаються в файл їх потрібно фільтрувати?
	Бо я шось не дуже доганяю, як тут може використовуватись xss :)
*/
if (isset($_POST['name'], $_POST['content'])) {
	$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	$content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
	$fp = fopen($name, "w+");
	fwrite($fp, $content);
}
?>