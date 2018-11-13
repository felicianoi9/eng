<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="shortcut icon" href="<?php echo BASE;?>assets/images/favicon.ico" /> 
	<link rel="stylesheet" type="text/css" href="<?php echo BASE;?>assets/css/login.css">
</head>
	<body>

		<?php if(isset($error) && !empty($error) ):?>

			<div class="warning"><?php echo $error;?></div>

		<?php endif;?>

		<?php if(isset($ok) && !empty($ok) ):?>

			<div class="ok"><?php echo $ok;?></div>

		<?php endif;?>

		<div class="login_area">

			<div class="name_company">
				<img height="100" src="<?php echo BASE;?>assets/images/favicon2.png">
			

			</div> 

			

			<form method="POST">
				<input type="email" placeholder="Digite seu email" name="email" required />
				<input type="password" placeholder="Digite sua senha"  name="password" required  />
				<input type="submit" name="send" value="Entrar" />

				

			</form>
		</div>
	</body>
</html>