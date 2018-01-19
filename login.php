<?php 
session_start();
require_once dirname(__FILE__)."/includes/class.user.php"; 
$user = new User();
$error = '';

if (isset($_REQUEST['submit'])) {
	extract($_REQUEST);
	$login = $user->check_login($emailusername, $password);

	if ($login) {
		// Registration Success
	   header("location:home.php");
	} else {
		// Registration Failed
		$error = 'Wrong username or password';
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="http://voky.com.ua/showcase/sky-forms-pro/examples/css/sky-forms.css">
		<script src="http://voky.com.ua/showcase/sky-forms-pro/examples/js/jquery.min.js"></script>
		<script src="http://voky.com.ua/showcase/sky-forms-pro/examples/js/jquery.validate.min.js"></script>
		<style>
		.body {
			max-width: 600px;
			margin: 0 auto;
			padding: 40px;
		}
		</style>
		<title>Document</title>
	</head>
	<body>
		<!-- Red color scheme -->
		<div class="body">
		
		<form method="post" id="login-form" name="login" class="sky-form" />
			<header>Login</header>
			<fieldset>
			<section>
				<span class="error"><?php echo $error; ?></span>
			</section>
			<section>
				<span class="message"><?php echo $error; ?></span>
			</section>
			<section>
				<label class="label">Username</label>
				<label class="input">
					<input type="text" placeholder="Username" name="emailusername"/>
				</label>
			</section>
			<section>
				<label class="label">Password</label>
				<label class="input">
					<input type="password" placeholder="Password" name="password"/>
				</label>
			</section>
			</fieldset>
			<footer>
				<button type="submit" name="submit" class="button">Submit</button>
				<button type="reset"  class="button button-secondary">Reset</button>
				<a href="registration.php">Sign up</a>
			</footer>
		</form>
		</div>
	</body>
	<script type="text/javascript">
		$(function()
		{
			// Validation
			$("#login-form").validate(
			{					
				// Rules for form validation
				rules:
				{
					emailusername:
					{
						required: true
					},
					password:
					{
						required: true
					}
				},
									
				// Messages for form validation
				messages:
				{
					required:
					{
						required: 'Please enter something'
					}
				},					
				// Do not change code below
				errorPlacement: function(error, element)
				{
					error.insertAfter(element.parent());
				}
			});
		});			
	</script>
</html>