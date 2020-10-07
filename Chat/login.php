<?php

include('includes/database_connection.php');

session_start();

$message = '';

if (isset($_SESSION['user_id'])) {
  header('location:homepg.php');
}

if (isset($_POST["login"])) {
  $query = "
   SELECT * FROM login 
    WHERE email = :email
    AND verified = 'true'
 ";
  $statement = $connect->prepare($query);
  $statement->execute(
    array(
      ':email' => $_POST["email"]
    )
  );

  $count = $statement->rowCount();
  if ($count > 0) {
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      if ($row["user_type"] == "user") {
        if (password_verify(
          $_POST["password"],
          $row["password"]
        )) {
          $_SESSION['user_id'] = $row['user_id'];
          $_SESSION['email'] = $row['email'];
          $_SESSION['username'] = $row['username'];
          $_SESSION['profile_image'] = $row['profile_image'];
          $sub_query = "
        INSERT INTO login_details 
        (user_id) 
        VALUES ('" . $row['user_id'] . "')
        ";
          $statement = $connect->prepare($sub_query);
          $statement->execute();
          $_SESSION['login_details_id'] = $connect->lastInsertId();
          header("location:homepg.php");
        } else {
          $message = "<label>Wrong Password</label>";
        }
      } else {
        $message = "<label>This is an staff account</label>";
      }
    }
  } else {
    $message = "<label>Email Not verified yet</labe>";
  }
}

?>


<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Chat Application using PHP Ajax Jquery</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
  <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
  <link rel="stylesheet" href="assets/css/styles.css">

</head>

<body style="background-color: #ffffff;">
  <!-- Start: Login Form Clean -->
  <div class="login-clean" style="background-color: #ffffff;padding: 20px 0px;">
    <form class="shadow-none" method="post" style="background-color: #178ccb;padding: 12px;">
      <div class="illustration" style="height: 85px;"><img class="d-flex" src="assets/img/Remdii-Logo_final.png" style="padding: 0px 40px;"></div>
      <h3 class="text-center" style="height: auto;color: rgb(0,0,0);padding-right: 12px;padding-left: 12px;padding-top: 6px;padding-bottom: 6px;font-family: Roboto;">Login</h3>
      <p class="text-danger"><?php echo $message; ?></p>

      <div class="form-group"><input class="border rounded border-primary shadow form-control" type="email" name="email" placeholder="Enter Email" style="color: #c4c4c4;background-color: #ffffff;" required=""></div>
      <div class="form-group"><input class="border rounded border-primary shadow form-control" type="password" name="password" placeholder="Enter Password" style="color: #c4c4c4;background-color: #ffffff;" required></div>
      <div class="form-group"><input type="submit" name="login" class="btn btn-primary btn-block border rounded shadow" value="Log In" style="background-color: #11d3c7;" /></div>

      <a class="forgot" href="register.php" style="color: #ffffff;">New User? CLICK here</a>
      <a class="forgot" href="forgetpass.php" style="color: #ffffff;">Forget Password? CLICK here</a>
    </form>
  </div>
  <!-- End: Login Form Clean -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

<script>
  function goBack() {
    window.history.back();
  }
</script>