<?php require "db_connect.php";?>
<?php if (isset($_SESSION['logged_user'])){}else{header('Location: /energy/login.php');}?>

<?php
if (isset($_POST['upload1'])) {
		// Перезапишем переменные для удобства
	$fileName = $_FILES['document1']['name'];
	$filePath  = $_FILES['document1']['tmp_name'];
	$type = $_FILES['document1']['type'];
	$errorCode = $_FILES['document1']['error'];
	$blacklist = ['.php','.phtml', '.php3', '.php4', '.html', '.htm', '.svg', '.js', '.py', '.exe', '.bat', '.cmd'];

	// Проверим на ошибки
	if ($errorCode !== UPLOAD_ERR_OK || !is_uploaded_file($filePath)) {

	    // Массив с названиями ошибок
	    $errorMessages = [
	        UPLOAD_ERR_INI_SIZE   => 'Размер файла превысил значение upload_max_filesize в конфигурации PHP.',
	        UPLOAD_ERR_FORM_SIZE  => 'Размер загружаемого файла превысил значение MAX_FILE_SIZE в HTML-форме.',
	        UPLOAD_ERR_PARTIAL    => 'Загружаемый файл был получен только частично.',
	        UPLOAD_ERR_NO_FILE    => 'Файл не был загружен.',
	        UPLOAD_ERR_NO_TMP_DIR => 'Отсутствует временная папка.',
	        UPLOAD_ERR_CANT_WRITE => 'Не удалось записать файл на диск.',
	        UPLOAD_ERR_EXTENSION  => 'PHP-расширение остановило загрузку файла.',
	    ];

	    // Зададим неизвестную ошибку
	    $unknownMessage = 'При загрузке файла произошла неизвестная ошибка.';

	    // Если в массиве нет кода ошибки, скажем, что ошибка неизвестна
	    $outputMessage = isset($errorMessages[$errorCode]) ? $errorMessages[$errorCode] : $unknownMessage;

	    // Выведем название ошибки
	    die($outputMessage);
	}

	foreach ($blacklist as $item) {
		if(preg_match("/$item$/", $fileName)) echo ("Запрещенный файл!!");
	}
	 //$type = getimagesize($filePath);
	if ($type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" || $type == "application/pdf" || $type == "application/msword") {
	 	if (!move_uploaded_file($filePath, __DIR__ . '/uploads/' . $fileName)) {
	    die('При записи файла на диск произошла ошибка.');
		}
		else {
			echo "Файл успешно загружен!";
		}
	 }
	else {
		echo "Файл не подходит!";
	}
}

if (isset($_POST['upload2'])) {
		// Перезапишем переменные для удобства
	$fileName = $_FILES['document2']['name'];
	$filePath  = $_FILES['document2']['tmp_name'];
	$type = $_FILES['document2']['type'];
	$errorCode = $_FILES['document2']['error'];
	$blacklist = ['.php','.phtml', '.php3', '.php4', '.html', '.htm', '.svg', '.js', '.py', '.exe', '.bat', '.cmd'];

	// Проверим на ошибки
	if ($errorCode !== UPLOAD_ERR_OK || !is_uploaded_file($filePath)) {

	    // Массив с названиями ошибок
	    $errorMessages = [
	        UPLOAD_ERR_INI_SIZE   => 'Размер файла превысил значение upload_max_filesize в конфигурации PHP.',
	        UPLOAD_ERR_FORM_SIZE  => 'Размер загружаемого файла превысил значение MAX_FILE_SIZE в HTML-форме.',
	        UPLOAD_ERR_PARTIAL    => 'Загружаемый файл был получен только частично.',
	        UPLOAD_ERR_NO_FILE    => 'Файл не был загружен.',
	        UPLOAD_ERR_NO_TMP_DIR => 'Отсутствует временная папка.',
	        UPLOAD_ERR_CANT_WRITE => 'Не удалось записать файл на диск.',
	        UPLOAD_ERR_EXTENSION  => 'PHP-расширение остановило загрузку файла.',
	    ];

	    // Зададим неизвестную ошибку
	    $unknownMessage = 'При загрузке файла произошла неизвестная ошибка.';

	    // Если в массиве нет кода ошибки, скажем, что ошибка неизвестна
	    $outputMessage = isset($errorMessages[$errorCode]) ? $errorMessages[$errorCode] : $unknownMessage;

	    // Выведем название ошибки
	    die($outputMessage);
	}

	foreach ($blacklist as $item) {
		if(preg_match("/$item$/", $fileName)) echo ("Запрещенный файл!!");
	}
	 //$type = getimagesize($filePath);
	if ($type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" || $type == "application/pdf" || $type == "application/msword") {
	 	if (!move_uploaded_file($filePath, __DIR__ . '/uploads/' . $fileName)) {
	    die('При записи файла на диск произошла ошибка.');
		}
		else {
			echo "Файл успешно загружен!";
		}
	 }
	else {
		echo "Файл не подходит!";
	}
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="fontawesome/css/all.css">
	<title>Терминал ввода данных - Энергосервис</title>
	<style>
		hr {
			-moz-border-bottom-colors: none;
			-moz-border-left-colors: none;
			-moz-border-right-colors: none;
			-moz-border-top-colors: none;
			border-color: #ccc;
			border-style: solid none;
			border-width: 1px;
			border-radius: 1px;
			margin: 14px 0;
		}
		.menu a {
			color: black;
		}
		.menu a:hover {
			border-radius: 5px;
			color: white;
			background-color: #2196f3;
			text-decoration: none;
		}
	</style>
</head>
<body class="bg-light">
	<div class="container bg-white shadow p-3 mb-2 mt-4 rounded">
		<!-- HEADER -->
		<?php require_once("page/header.html") ?>
		<!-- HEADER -->

		<!-- MENU -->
		<div class="menu">
			<a href="main.php" class="mr-4 p-2"><i class="fas fa-home"></i> Главная</a>
			<a href="#" class="mr-4 p-2"><i class="fas fa-leaf"></i> Об энергосервисе</a>
			<a href="upload.php" class="mr-4 p-2 text-success"><i class="fas fa-file-upload"></i> Внести данные</a>
			<a href="logout.php" class="mr-4 p-2"><i class="fas fa-sign-out-alt"></i> Выйти	</a>
		</div>
		<hr>
		<!-- MENU -->

		<!-- CONTENT -->
		<div class="d-flex">
			<div class="col-9 rounded shadow-sm bg-white p-2">
				<h5>Терминал ввода данных</h5>
				<form action="upload.php" method="post" enctype="multipart/form-data">
					<span><b>Загрузите первый документ организации:</b></span>
					<br>
					<input type="file" name="document1">
					<input type="submit" value="Загрузить" name="upload1">
					<br>
					<br>
					<span><b>Загрузите второй документ организации:</b></span>
					<br>
					<input type="file" name="document2">
					<input type="submit" value="Загрузить" name="upload2">
				</form>
			</div>
			<!-- OLDER POSTS -->
			<div class="col-3 rounded shadow-sm bg-white p-2 ml-3">
				<h5>Здравствуйте! <?php echo $_SESSION['logged_user']->fio; ?>.</h5>
				<p>Ваша организация: <?php echo $_SESSION['logged_user']->organization; ?></p>
			</div>
			<!-- OLDER POSTS -->

		</div>
		<!-- CONTENT -->
	</div>
	<!-- FOOTER -->
	<?php require_once("page/footer.html"); ?>
	<!-- FOOTER -->
</body>
</html>