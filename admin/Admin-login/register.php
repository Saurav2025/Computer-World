<?php

include 'config.php';


error_reporting(0);
function get_safe_value($conn, $str)
{
	if (($str != '')) {
		return mysqli_real_escape_string($conn, $str);
	}
}
session_start();

if (isset($_POST['submit'])) {
	$username = get_safe_value($conn, $_POST['username']);
	$email = get_safe_value($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

	$pass = password_hash($password, PASSWORD_BCRYPT);
	$cpass = password_hash($cpassword, PASSWORD_BCRYPT);

	$token = bin2hex(random_bytes(15));

	$emailquery = "SELECT * FROM users where email='$email'";
	$query = mysqli_query($conn, $emailquery);

	$emailcount = mysqli_num_rows($query);

	if ($emailcount > 0) {
		echo "<script>alert('Email alreday exist in our Database.');</script>";
	} else {
		if ($password === $cpassword) {



			$insertquery = "INSERT into users(username, email, password,token)values('$username','$email','$pass','$token')";
			$iquery = mysqli_query($conn, $insertquery);

			$username = "";
			$email = "";
			$_POST['password'] = "";
			$_POST['cpassword'] = "";

			if ($iquery) {
?>
				<script>
					alert("Insertion Sucessfully");
					location.replace("index.php");
				</script>
			<?php
			} else {
			?>
				<script>
					alert("Not Inserted");
				</script>
			<?php
			}
		} else {
			?>
			<script>
				alert("Password ARE Not matching");
			</script>
<?php
		}
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

	<title>Register Form</title>
</head>

<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
		</form>
	</div>
</body>

</html>