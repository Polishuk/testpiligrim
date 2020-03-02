<html>
<head>
 <title>Test piligrim</title>
</head>
	<style>
		body{
			background: #f5f5f5;
			text-align: center;
			font-family: Arial;
			width: 300px;
			margin: 0 auto;
			display: flex;
			align-items: CENTER;
			align-content: CENTER;
			justify-content: center;
			flex-wrap: wrap
		}
		body form{
			display:block;
			text-align: left
		}
		input,select{
			padding: 8px 15px;
			background:#fff;
			width: 100%;
			display: block;
			border: 1px solid #cdcdcd;
			margin-bottom: 15px
		}
		button{
			padding: 8px 15px;
			background: #4CAF50;
			border: 1px solid #4CAF50;
			color:#fff;
			width: 100%;
			display: block;		
		}
		.bd_error{
			color:red;
			font-weight: bold;
			margin-bottom: 15px
		}
		.bd_good{
			color:#4CAF50;
			font-weight: bold;
			margin-bottom: 15px
		}
		table{
			border: 1px solid #cdcdcd;
			width: 100%
		}
		table thead tr{
			background:#cdcdcd
		}
		table thead tr th{
			padding: 5px;
		}
		table tr td{
			padding: 5px;
			border: 1px solid #cdcdcd
		}
		.home{
			background: #2196F3;
			color: #fff;
			padding: 10px 30px;
			border-radius: 4px;
			display: inline-block;
			text-decoration: none;			
		}
		.home:hover{
			 background: #3F51B5;
		}
	</style>
	<body>	
	
<?php 
	if (($_GET['rolename']) == true ){
		
		$db_host = "localhost"; 
		$db_user = "root"; // Логин БД
		$db_password = ""; // Пароль БД
		$db_base = 'test_piligrim'; // Имя БД		
		$db_table = "user_role"; // Имя Таблицы БД

		// Переменные с формы
		$rolename = $_GET['rolename']; 
		// Подключение к базе данных
		$mysqli = new mysqli($db_host,$db_user,$db_password,$db_base);
		
		// Если есть ошибка соединения, выводим её и убиваем подключение
		if ($mysqli->connect_error) {
			die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
		}
		
		$result = $mysqli->query("INSERT INTO ".$db_table." (rolename) VALUES ('$rolename')");
		 
		if ($result == true){
			echo "<div class='bd_good'>Информация занесена в базу данных</div>";
		}else{
			echo "<div class='bd_error'>Информация не занесена в базу данных</div>";
		}
	} else {
		echo "<div class='bd_error'>Заполните поле 'название роли'</div>";
	}
	?>
	<div><a class="home" href="/index.php">На главную</a></div>
	</body>
</html>	