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
			margin: 0 auto
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
			cursor: pointer		;		
		}
			button:hover{
				background: green
			}
		.bd_error{
			color:red;
			font-weight: bold		
		}
		.bd_good{
			color:#4CAF50;
			font-weight: bold
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
	</style>
	<body>
	
	<?php
		// Параметры для подключения
		$db_host = "localhost"; 
		$db_user = "root"; // Логин БД
		$db_password = ""; // Пароль БД
		$db_base = 'test_piligrim'; // Имя БД
			
		$link = mysqli_connect($db_host, $db_user, $db_password, $db_base); // Соединяемся с базой	
		  // Ругаемся, если соединение установить не удалось
		  if (!$link) {
				echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
				exit;
		  }
	?>	
	
	 <h2>Добавление ролей</h2>
	 <form method="GET" action="send-role.php">
		<input name="rolename" type="text" placeholder="Название роли"/>
		<button>Добавить роль</button>
	 </form>

	 <h2>Добавление пользователей</h2>
	 
	 <form method="GET" action="send-user.php">
		<input name="username" type="text" placeholder="Имя пользователя"/>
		Роль пользователя
		<select name="role_id">
		<?php
		  //Получаем данные
		  $sql = mysqli_query($link, 'SELECT `id`, `rolename` FROM `user_role`');
		  while ($result = mysqli_fetch_array($sql)) {	
			 echo "<option value='{$result['id']}'>{$result['rolename']}</option>";
		  }
		?>	
		</select>
		<button>Добавить</button>
	 </form>
	
	 <h2>Все пользователи</h2>
	 <table>
		<thead>
			<th>Имя</th>
			<th>Роль</th>
		</thead>
		<tbody>
			<?php
				//Получаем данные
				
				$sql = mysqli_query($link, 'SELECT username,rolename FROM user_role, user WHERE user_role.id=role_id;');
				  while ($result = mysqli_fetch_array($sql)) {	
					 echo '<tr>';
					 echo "<td>{$result['username']}</td>";
					 echo "<td>{$result['rolename']}</td>";
					 echo '</tr>';
				 }
			?>	 
		</tbody>
	</table>
	 
	</body>
</html>