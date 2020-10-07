<?php
session_start();

$cimage = $_GET['cimage'];
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Rd</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Akronim">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Carter+One">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/bodyselect.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/sidebar-1.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu-1.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu.css">

</head>

<body>
    <div class="d-flex page-content-wrapper" style="background-color: #007abb;">
    <button class="btn btn-primary btn-link" onclick="goBack()" type="button" style="background-image: url(&quot;assets/img/backbutton.png&quot;);width: 30px;height: 30px;background-size: contain;background-repeat: no-repeat;padding: 0px;background-color: #007abb;margin: 12px;">&nbsp; &nbsp;</button>
        <h3 style="color: #ffffff;font-family: 'Carter One', cursive;margin: 12px;">Image View</h3>
    </div><img class="imageF" style="width: 100%;height: 100%;" src='user_condition/<?php echo $cimage?>'>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Sidebar-Menu.js"></script>
</body>

</html>
<script>
    function goBack() {
        window.history.back();
    }
</script>