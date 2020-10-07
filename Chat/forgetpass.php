<?php

require_once('../PHPMailer-5.2-stable/PHPMailerAutoload.php');
$conn = mysqli_connect("localhost", "root", "", "remdiichat");


if (isset($_POST["submit"])) {
	if (empty($_POST["email"])) {
		$error_email = 'Enter Email';
	} else {

		$email = trim($_POST["email"]);
		$forgetpass = rand(100000000, 999999999);
		$hashpass = password_hash($forgetpass, PASSWORD_DEFAULT);
		$query = "
				UPDATE login 
				SET password = '" . $hashpass . "' 
				WHERE email = '" . $email . "'
				";

		$statement = $conn->prepare($query);
		$statement->execute();
		$total_row = mysqli_affected_rows($conn);
		if ($total_row > 0) {
			$mail = new PHPMailer();
			$mail->isSMTP();
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'ssl';
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = '465';
			$mail->isHTML();
			$mail->Username = 'developertest1245@gmail.com';
			$mail->Password = 'Zen1220!';
			$mail->SetFrom('no-reply@howcode.org');
			$mail->Subject = 'Forget Password Request';
			$mail->Body = 'Hi user this is ur newly requested password : ' . $forgetpass . '';
			$mail->AddAddress($email);


			$mail->Send();
			header('location:forgetsucess.php');
		} else {
			$message = '<label class="text-danger">Invalid OTP Number</label>';
		}
	}
}





?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>PHP Registration with Email Verification using OTP</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
	<link rel="stylesheet" href="assets/fonts/ionicons.min.css">
	<link rel="stylesheet" href="assets/css/bodyselect.css">
	<link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
	<link rel="stylesheet" href="assets/css/sidebar-1.css">
	<link rel="stylesheet" href="assets/css/Sidebar-2.css">
	<link rel="stylesheet" href="assets/css/Sidebar-Menu-1.css">
	<link rel="stylesheet" href="assets/css/Sidebar-Menu.css">
	<link rel="stylesheet" href="assets/css/sidebar.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="http://code.jquery.com/jquery.js"></script>
</head>

<body style="background-color: #ffffff;">
	<div class="login-clean" style="background-color: #ffffff;padding: 20px 0px;">
		<form class="shadow-none" method="POST" style="background-color: #007abb;padding: 12px;">
			<div class="illustration"><img class="d-flex mx-auto" src="assets/img/Remdii-Logo_final.png" style="color: rgba(0,0,0,0.1);"></div>
			<h3 style="color: rgb(255,255,255);padding: 6px;font-size: 20px;">Forget&nbsp;PASSWORD<br></h3>
			<div class="form-group"><input class="border rounded border-primary shadow form-control" type="text" name="email" placeholder="Enter Email" style="color: #c4c4c4;background-color: #ffffff;" required></div>

			<div class="form-group"><button class="btn btn-primary btn-block border rounded shadow" name="submit" type="submit" value="Submit" style="background-color: #178ccb;">Retrive New Password<br></button></div>

			<a class="forgot" href="login.php" style="color: #ffffff;">Already have an account? CLICK here</a>
			<a class="forgot" href="register.php" style="color: #ffffff;">New User click here</a>
		</form>
	</div>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/Sidebar-Menu.js"></script>
</body>


</html>