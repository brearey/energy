<?php

require "db_connect.php";

if (isset($_SESSION['logged_user'])) {
	header('Location: /energy/main.php');
}
else {
	header('Location: /energy/login.php');
}

?>