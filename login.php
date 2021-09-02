<?php
require "db_connect.php";

$data=$_POST;
	if(isset($data['do_login'])) // если была нажата кнопка
	{
		$errors = array();
		$user = R::findOne('users', 'email = ?', array($data['email']));
		if( $user )
		{
			// Когда  логин сушествует, проверяем пароль
			if(password_verify($data['password'], $user->password))
			{
		  //	echo 'Логинится';
			// Все хорошо, логиним пользователя
				$_SESSION['logged_user'] = $user;

				header('Location: /energy/main.php'); //Работает
				//echo '<div style = "color: green;">Вы Авторизованы! <br/> Можете перейти на <a href="index.php">главную</a> страницу!</div><hr>';

			} else {
				$errors[] = 'Пароль неправильно введен';
			}
		} else
		{
			$errors[] = 'Пользователь не найден!';
		}

		if (!empty($errors)) {
			echo'<div style="color:red;">'.array_shift($errors).'</div><hr>';
		} 
	}
	?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="fontawesome/css/all.css">
	<title>Авторизация - Энергосервис</title>
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
			<a href="#" class="mr-4 p-2"><i class="fas fa-file-upload"></i> Внести данные</a>
			<a href="#" class="mr-4 p-2 text-success"><i class="fas fa-sign-in-alt"></i> Войти в личный кабинет	</a>
		</div>
		<hr>
		<!-- MENU -->

		<!-- CONTENT -->
		<div class="d-flex px-2">
			<!-- LOGIN FORM -->
			<div class="col-9 rounded shadow-sm bg-white p-2 text-center">
				<form action="login.php" method="POST">
					<span>Электронная почта*</span><br>
					<input type="email" name="email" class="mb-2 px-2 rounded border border-primary" value="<?php echo @$data['email'];?>"><br>
					<span>Пароль*</span><br>
					<input type="password" name="password" class="mb-2 px-2 rounded border border-primary" value="<?php echo @$data['password'];?>"><br>
					<input type="submit" value="Войти" name="do_login" class="btn btn-primary mb-2">
				</form>
				<p>Впервые на сайте? <a href="signup.php">Регистрация</a></p>
			</div>
			<!-- LOGIN FORM -->

			<!-- OLDER POSTS -->
			<div class="col-3 rounded shadow-sm bg-white p-2 ml-3">
				<h5>Последние записи</h5>
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