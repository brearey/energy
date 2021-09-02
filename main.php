<?php require "db_connect.php";?>
<?php if (isset($_SESSION['logged_user'])){}else{header('Location: /energy/login.php');}?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="fontawesome/css/all.css">
	<title>Главная - Энергосервис</title>
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
			<a href="main.php" class="mr-4 p-2 text-success"><i class="fas fa-home"></i> Главная</a>
			<a href="#" class="mr-4 p-2"><i class="fas fa-leaf"></i> Об энергосервисе</a>
			<a href="upload.php" class="mr-4 p-2"><i class="fas fa-file-upload"></i> Внести данные</a>
			<a href="logout.php" class="mr-4 p-2"><i class="fas fa-sign-out-alt"></i> Выйти	</a>
		</div>
		<hr>
		<!-- MENU -->

		<!-- CONTENT -->
		<div class="d-flex">
			<div class="col-9 rounded shadow-sm bg-white p-2">
				<h5>Здесь будут записи</h5>
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