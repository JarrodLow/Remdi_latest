<?php
session_start();

$id = $_GET['id'];

$message = '';

if (!isset($_SESSION['user_id'])) {
    header('location:login.php');
}
$user_id = $_SESSION['user_id'];

$conn = mysqli_connect("localhost", "root", "", "remdiichat");
$results = mysqli_query($conn, "
SELECT * FROM questionnaire 
WHERE user_id = $id 
");

$users = mysqli_fetch_all($results, MYSQLI_ASSOC);
foreach ($users as $row) {
    $_SESSION['qid'] = $row['questionnaire_id'];
}

?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Rd</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/bodyselect.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/sidebar-1.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu-1.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu.css">
</head>

<body style="background-color: #ffffff;">
    <div class="d-flex page-content-wrapper" style="background-color: #007abb;">
    <button class="btn btn-primary btn-link" onclick="goBack()" type="button" style="background-image: url(&quot;assets/img/backbutton.png&quot;);width: 30px;height: 30px;background-size: contain;background-repeat: no-repeat;padding: 0px;background-color: #007abb;margin: 12px;">&nbsp; &nbsp;</button>
        <h3 style="color: #ffffff;font-family: 'Carter One', cursive;margin: 12px;">Patient Details</h3>
    </div>
    <div id="content" style="font-family: Montserrat, sans-serif;padding: 12px;margin: 12px;background-color: #ffffff;">
        <p style="color:#ffffff" align="right">Hi - <?php echo $_SESSION['username'];  ?> id -<?php echo $_SESSION['user_id'];  ?>
            <div class="text-center" style="background-color: #ececec;padding: 6px;">
                <?php foreach ($users as $row1) : ?>
                    <div class="text-center border rounded shadow" style="background-color: #e8f4fa;margin: 6px;padding: 6px;">
                        <h4 class="text-left" style="color: #000000;font-family: Montserrat, sans-serif;"><strong>1. Name</strong><br></h4>
                        <p class="text-left" style="color: #000000;font-family: Poppins, sans-serif;"><span style="text-decoration: underline;"><?php echo $row1['question1'];  ?></span></p>
                    </div>
                    <div class="text-center border rounded shadow" style="background-color: #e8f4fa;margin: 6px;padding: 6px;">
                        <h4 class="text-left" style="color: #000000;font-family: Montserrat, sans-serif;"><strong>2. Age</strong><br></h4>
                        <p class="text-left" style="color: #000000;font-family: Poppins, sans-serif;"><span style="text-decoration: underline;"><?php echo $row1['question2'];  ?></span></p>
                    </div>
                    <div class="text-center border rounded shadow" style="background-color: #e8f4fa;margin: 6px;padding: 6px;">
                        <h4 class="text-left" style="color: #000000;font-family: Montserrat, sans-serif;"><strong>3. Gender</strong><br></h4>
                        <p class="text-left" style="color: #000000;font-family: Poppins, sans-serif;"><span style="text-decoration: underline;"><?php echo $row1['question3'];  ?></span></p>
                    </div>
                    <div class="text-center border rounded shadow" style="background-color: #e8f4fa;margin: 6px;padding: 6px;">
                        <h4 class="text-left" style="color: #000000;font-family: Montserrat, sans-serif;"><strong>4. Family history of eczema, asthma and allergic rhinitis</strong><br></h4>
                        <p class="text-left" style="color: #000000;font-family: Poppins, sans-serif;"><span style="text-decoration: underline;"><?php echo $row1['question4'];  ?></span></p>
                    </div>
                    <div class="text-center border rounded shadow" style="background-color: #e8f4fa;margin: 6px;padding: 6px;">
                        <h4 class="text-left" style="color: #000000;font-family: Montserrat, sans-serif;"><strong>5. Diagnosis of doctor</strong><br></h4>
                        <p class="text-left" style="color: #000000;font-family: Poppins, sans-serif;"><span style="text-decoration: underline;"><?php echo $row1['question5'];  ?></span></p>
                    </div>
                    <div class="text-center border rounded shadow" style="background-color: #e8f4fa;margin: 6px;padding: 6px;">
                        <h4 class="text-left" style="color: #000000;font-family: Montserrat, sans-serif;"><strong>6. Any shape to the rashes? Briefly describe.</strong><br></h4>
                        <p class="text-left" style="color: #000000;font-family: Poppins, sans-serif;"><span style="text-decoration: underline;"><?php echo $row1['question6'];  ?></span></p>
                    </div>
                    <div class="text-center border rounded shadow" style="background-color: #e8f4fa;margin: 6px;padding: 6px;">
                        <h4 class="text-left" style="color: #000000;font-family: Montserrat, sans-serif;"><strong>7. State the current cream/oilment/lotion applied.</strong><br></h4>
                        <p class="text-left" style="color: #000000;font-family: Poppins, sans-serif;"><span style="text-decoration: underline;"><?php echo $row1['question7'];  ?></span></p>
                    </div>
                    <div class="text-center border rounded shadow" style="background-color: #e8f4fa;margin: 6px;padding: 6px;">
                        <h4 class="text-left" style="color: #000000;font-family: Montserrat, sans-serif;"><strong>8. State the oral medication taken (if any)</strong><br></h4>
                        <p class="text-left" style="color: #000000;font-family: Poppins, sans-serif;"><span style="text-decoration: underline;"><?php echo $row1['question8'];  ?></span></p>
                    </div>
                    <div class="text-center border rounded shadow" style="background-color: #e8f4fa;margin: 6px;padding: 6px;">
                        <h4 class="text-left" style="color: #000000;font-family: Montserrat, sans-serif;"><strong>9. Weeping? (Y/N)</strong><br></h4>
                        <p class="text-left" style="color: #000000;font-family: Poppins, sans-serif;"><span style="text-decoration: underline;"><?php echo $row1['question9'];  ?></span></p>
                    </div>
                    <div class="text-center border rounded shadow" style="background-color: #e8f4fa;margin: 6px;padding: 6px;">
                        <h4 class="text-left" style="color: #000000;font-family: Montserrat, sans-serif;"><strong>10. Bleeding ? (Y/N)</strong><br></h4>
                        <p class="text-left" style="color: #000000;font-family: Poppins, sans-serif;"><span style="text-decoration: underline;"><?php echo $row1['question10'];  ?></span></p>
                    </div>
                    <div class="text-center border rounded shadow" style="background-color: #e8f4fa;margin: 6px;padding: 6px;">
                        <h4 class="text-left" style="color: #000000;font-family: Montserrat, sans-serif;"><strong>11. Excoriation marks? (Y/N)</strong><br></h4>
                        <p class="text-left" style="color: #000000;font-family: Poppins, sans-serif;"><span style="text-decoration: underline;"><?php echo $row1['question11'];  ?></span></p>
                    </div>
                    <div class="text-center border rounded shadow" style="background-color: #e8f4fa;margin: 6px;padding: 6px;">
                        <h4 class="text-left" style="color: #000000;font-family: Montserrat, sans-serif;"><strong>12. Infection (Impetigo)? (Y/N)</strong><br></h4>
                        <p class="text-left" style="color: #000000;font-family: Poppins, sans-serif;"><span style="text-decoration: underline;"><?php echo $row1['question12'];  ?></span></p>
                    </div>
                <?php endforeach; ?>
            </div>
    </div>
    <div class="btn-group d-flex col-sm" role="group" id="bottom" style="padding: 0px;min-height: 40px;">
        <button class="btn btn-primary col-sm" type="button" onclick="location.href='displayCondition.php';" style="background-color: #0694ab;">Check Image</button>
    </div>
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