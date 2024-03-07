<?php
include 'config.php';
require('../Admin/function.inc.php');
error_reporting(0);

if (isset($_POST['submit'])) {
	$msg = '';
	$email =  get_safe_value($conn, $_POST['email']);
	$password = get_safe_value($conn, $_POST['password']);

	$email_search = "SELECT * FROM users where email='$email'";
	$query = mysqli_query($conn, $email_search);

	$sql = "select * from users where email='$email'";
	$res = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($res);
	if ($count > 0) {
		$_SESSION['ADMIN_LOGIN'] = 'yes';
		$_SESSION['ADMIN_EMAIL'] = $email;
	}
	$email_count = mysqli_num_rows($query);

	if ($email_count) {
		$email_pass = mysqli_fetch_assoc($query);

		$db_pass = $email_pass['password'];

		$pass_decode = password_verify($password, $db_pass);
		if ($pass_decode) {
			$msg = "Login sucessfull";
			//echo "<script>alert('Login sucessfull.');</script>";
?>
			<script>
				location.replace("../Admin/categories.php");
			</script>
<?php
		} else {
			$msg = "Password is incorrect";
			//echo "<script>alert('Password is incorrect.');</script>";
		}
	} else {
		$msg = "Invalid Email";
		//echo "<script>alert('Invalid Email.');</script>";
	}
}
?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Login Form</title>
</head>

<body>
	<div class="container">
		<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $_POST["email"]; ?>" required />
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST["password"]; ?>" required />
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<div style="color:red;font-weight:500;display: block;text-align: center; margin-block-start: 1em;margin-block-end: 1em;margin-inline-start: 0px;margin-inline-end: 0px;">
				<P><?php echo $msg ?></P>
				<?php $msg = ''; ?>
			</div>
			<!-- <p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p> -->
			<!-- <p class="login-register-text">Yo!Forgot Your Password? <a href="Forget.php">Click Here</a>.</p> -->
		</form>
	</div>
</body>

</html>