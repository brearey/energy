<?php  
require "db_connect.php";
$data = $_POST;
if( isset($data['do_signup']) )
{
	//здесь делаем проверки на пустоту логина
	$errors = array();
	
	if ($data['email'] =='') {
		$errors[] = 'Введите email !';
	}

	if ($data['fio'] =='') {
		$errors[] = 'Введите ФИО !';
	}

	if ($data['phone'] =='') {
		$errors[] = 'Введите телефон !';
	}

	if ($data['organization'] =='') {
		$errors[] = 'Введите название организации !';
	}

	if ($data['password'] =='') {
		$errors[] = 'Введите пароль !';
	}

	if ($data['password_2'] !=$data['password']) {
		$errors[] = 'Пароли не совпадают !';
	}

  // исключаем два одинаковых мейла

	if (R::count('users', "email = ?", array($data['email']))>0)
	{
		$errors[] = 'Пользователь с таким Email существует !';
	}

	//здесь регистрируем
	if (empty($errors)) 
	{
	// все хорошо, регисирируем в Базе Данных
	// Ред Бин исключает SQL иньекции
		$user = R::dispense('users');
		$user->email=$data['email'];
		$user->fio=$data['fio'];
		$user->phone=$data['phone'];
		$user->organization=$data['organization'];
		$user->password= password_hash($data['password'], PASSWORD_DEFAULT);
		$user->join_date=time();
		R::store($user);
		echo '<div style = "color: green;">Вы успешно зарегистрированы! </div><hr>';
	} else 
	{
		echo'<div id="errors">'.array_shift($errors). '</div><hr>';
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

		input {
			padding: 2px;
			text-align: center;
			width: 300px;
			margin-bottom: 4px;
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
			<a href="#" class="mr-4 p-2"><i class="fas fa-home"></i> Главная</a>
			<a href="#" class="mr-4 p-2"><i class="fas fa-leaf"></i> Об энергосервисе</a>
			<a href="#" class="mr-4 p-2"><i class="fas fa-file-upload"></i> Внести данные</a>
			<a href="login.php" class="mr-4 p-2"><i class="fas fa-sign-in-alt"></i> Войти в личный кабинет	</a>
		</div>
		<hr>
		<!-- MENU -->

		<!-- CONTENT -->
		<div class="d-flex px-2">
			<!-- REGISTER FORM -->
			<div class="col-9 rounded shadow-sm bg-white p-2">
			<p>Для регистрации заполните ниже поля:</p>
				<form action="signup.php" method="POST" class="text-center">
						<input placeholder="email" class="rounded border" type="email" name="email" value = "<?php echo @$data['email'];?>"><br>
						<input placeholder="Фамилия Имя Отчество" class="rounded border" type="text" name="fio" value = "<?php echo @$data['fio'];?>"><br>
						<input placeholder="79141231212" class="rounded border" type="phone" name="phone" value = "<?php echo @$data['phone'];?>"><br>
						<input placeholder="Наименование Вашей организации" class="rounded border" type="text" name="organization" value = "<?php echo @$data['organization'];?>"><br>
						<input placeholder="Пароль" class="rounded border" type="password" name="password" value = "<?php echo @$data['password'];?>"><br>
						<input placeholder="Повторите пароль" class="rounded border" type="password" name="password_2" value = "<?php echo @$data['password_2'];?>"><br>
						<button class="rounded border btn-primary p-2" type="submit" name = "do_signup">Зарегистрироваться</button>
				</form>
			</div>
			<!-- REGISTER FORM -->

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