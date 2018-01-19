<?php 
require_once dirname(__FILE__)."/includes/class.user.php";  
$user = new User(); // Checking for user logged in or not
$error = '';
$success = '';

if (isset($_REQUEST['submit'])){
	
	extract($_REQUEST);
	$register = $user->reg_user($fullname, $uname,$upass, $uemail);
	if ($register) {
		// Registration Success
		$success = 'Registration successful <a href="login.php">Click here</a> to login';
	} else {
		// Registration Failed
		$error = 'Registration failed. Email or Username already exits please try again';
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
		<title>Sign up</title>
	</head>
	<body>
		<!-- Red color scheme -->
		<div class="body">	
		<form method="post" id="registration-form" name="signup" class="sky-form">
			
			<header>Sign up</header>
			<fieldset>
				<section>
					<span class="<?php echo !empty($error) ? 'error' : 'success'; ?>"><?php echo !empty($error) ? $error : $success; ?></span>
				</section>
				<section>
					<label class="label">Full Name</label>
					<label class="input">
						<input type="text" placeholder="Full Name" name="fullname"/>
					</label>
				</section>
				<section>
					<label class="label">Username</label>
					<label class="input">
						<input type="text" placeholder="Username" name="uname"/>
					</label>
				</section>
				<section>
					<label class="label">Email</label>
					<label class="input">
						<input type="text" placeholder="Email" name="uemail"/>
					</label>
				</section>
				<section>
					<label class="label">Password</label>
					<label class="input">
						<input type="password" placeholder="Password" name="upass"/>
					</label>
				</section>
			</fieldset>
			<footer>
				<button type="submit" name="submit" class="button">Register</button>
				<button type="reset"  class="button button-secondary">Reset</button>
				<a href="login.php">Login</a>
			</footer>
		</form>
		</div>
	</body>
	<script type="text/javascript">
			$(function()
			{
				// Validation
				$("#registration-form").validate(
				{					
					// Rules for form validation
					rules:
					{
						fullname:
						{
							required: true
						},
						uname:
						{
							required: true
						},
						uemail:
						{
							required: true,
							email: true
						},
						upass:
						{
							required: true,
						}
					},
										
					// Messages for form validation
					messages:
					{
						required:
						{
							required: 'Please enter something'
						},
						email:
						{
							required: 'Please enter your email address'
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