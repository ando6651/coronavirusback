<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/css/login.css" />
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/utils.js"></script>
	<style>
		canvas {
			-moz-user-select: none;
			-webkit-user-select: none;
			-ms-user-select: none;
		}
	</style>
	<title>Login Administrateur du site coronavirus</title>
</head>

<body>
	<div class="login-page">
		<div class="form">
			<img src="<?php echo $base_url; ?>assets/images/coronavirus.png" alt="coronavirus" style="width: 130px;"></br></br>
			<form class="login-form" action="<?php echo $base_url; ?>login.login" method="post">
				<input name="username" type="text" placeholder="username" />
				<input name="mdp" type="password" placeholder="mot de passe" />
				<button>login</button>
				<?php if ($error == 1) { ?>
					</br>
					</br>
					<h6> mot de passe ou username incorrecte !</h6>
				<?php	} ?>
			</form>
		</div>
	</div>
</body>

</html>