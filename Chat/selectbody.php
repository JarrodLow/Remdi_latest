<?php
$conn = mysqli_connect("localhost", "root", "", "remdiichat");

include('includes/database_connection.php');

session_start();

if (!isset($_SESSION['user_id'])) {
  header('location:login.php');
}

?>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Chat Application using PHP Ajax Jquery</title>
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
  <!-- <link rel="stylesheet" href="assets/css/domarrow.css"> -->
</head>



<body style="background-color: #e8f4fa;background-image: url(&quot;assets/img/full.png&quot;);background-size: auto;background-repeat: no-repeat;background-position: center;">
<div id="wrapper">
    <div id="sidebar-wrapper" style="background-color: #007abb;">
      <ul class="sidebar-nav">
        <li class="sidebar-brand" style="margin: 16px;"> <img src="assets/img/Remdii-Logo_final.png"></li>
        <li style="color: #ffffff;font-family: Poppins, sans-serif;background-color: rgba(0,0,0,0.1); padding:10px"> <img src="<?php echo 'profilePic/' . $_SESSION['profile_image'] ?>" width="90" height="90" alt=""> User: <?php echo $_SESSION['username'];  ?> </li>
        <li> <a href="homepg.php" style="color: #ffffff;font-family: Poppins, sans-serif;">Home</a></li>
        <li> <a href="questionnaire.php" style="color: #ffffff;font-family: Poppins, sans-serif;">Questionnaire</a></li>
        <li> <a href="#" style="background-color: #178ccb;font-family: Poppins, sans-serif;">Update Condition</a></li>
        <li> <a href="chat.php" style="color: #ffffff;font-family: Poppins, sans-serif;">Chat</a></li>
        <li> <a href="setting.php" style="color: #ffffff;font-family: Poppins, sans-serif;">Setting</a></li>
        <li> <a href="logout.php" style="color: #ffffff;font-family: Poppins, sans-serif;">Logout</a></li>
      </ul>
    </div>
    <div class="d-flex page-content-wrapper" style="background-color: #007abb;height: 57px">
      <a class="btn btn-link" role="button" id="menu-toggle" href="#menu-toggle" style="background-color: #007abb;padding: 16px;"><i class="fa fa-bars" style="color: rgb(255,255,255);width: 16px;height: 16px;"></i></a>
      <h3 style="color: #ffffff;font-family: 'Carter One', cursive;margin: 12px;">Upadate Condition<br></h3>
    </div>
  </div>

    <div class="container text-center" style="padding: 15px;">
        <div class="row">
            <div class="col"><form action="updateconditionLeftHand.php"><button class="btn btn-primary" type="submit" style="font-size: 12px;">Left Hand</button></form></div>
            <div class="col"><form action="updateconditionBody.php"><button class="btn btn-primary" type="submit" style="font-size: 12px;">Body</button></form></div>
            <div class="col"><form action="updateconditionRightHand.php"><button class="btn btn-primary" type="submit" style="font-size: 12px;">Right Hand</button></form></div>
        </div>
    </div>
    <div class="container text-center bottom" style="padding: 15px;">
        <div class="row">
            <div class="col"><form action="updateconditionLeftLeg.php"><button class="btn btn-primary" type="submit" style="font-size: 12px;">Left Leg</button></form></div>
            <div class="col"><form action="updateconditionRightLeg.php"><button class="btn btn-primary" type="submit" style="font-size: 12px;">Right Leg</button></form></div>
        </div>
    </div>

    <!-- <div class="text-center" style="margin: 12px;"><img src="assets/img/129-1295290_transparent-body-outline-png-figure-drawing-removebg-preview%20(2).png"></div>
    <button class="btn btn-primary head-btn" type="button" style="background-color: rgba(0,0,0,0);color: #000000;">Head</button>
    <form action="updateconditionLeftHand.php"><button class="btn btn-primary lefthand-btn" type="submit" style="background-color: rgba(0,0,0,0);color: #000000;">Left hand</button></form>
    <form action="updateconditionBody.php"><button class="btn btn-primary body-btn" type="submit" style="background-color: rgba(0,0,0,0);color: #000000;">Body</button></form>
    <form action="updateconditionRightHand.php"><button class="btn btn-primary righthand-btn" type="submit" style="background-color: rgba(0,0,0,0);color: #000000;">Right hand</button></form>
    <form action="updateconditionLeftLeg.php"><button class="btn btn-primary leftleg-btn" type="submit" style="background-color: rgba(0,0,0,0);color: #000000;">Left leg</button></form>
    <form action="updateconditionRightLeg.php"><button class="btn btn-primary rightleg-btn" type="submit" style="background-color: rgba(0,0,0,0);color: #000000;">Right leg</button></form> -->

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Sidebar-Menu.js"></script>
    <!-- <script src="assets/js/domarrow.js"></script> -->
</body>

</html>
<script>
  $(document).ready(function() {
    fetch_user();

    setInterval(function() {
      update_last_activity();
      fetch_user();

    }, 5000);

    function fetch_user() {
      $.ajax({
        url: "fetch_user.php",
        method: "POST",
        success: function(data) {
          $('#user_details').html(data);
        }
      })
    }

    function update_last_activity() {
      $.ajax({
        url: "update_status.php",
        success: function() {

        }
      })
    }

  });
</script>