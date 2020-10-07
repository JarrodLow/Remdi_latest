<?php

include('includes/database_connection.php');

session_start();

if (!isset($_SESSION['user_id'])) {
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Rd</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/css/sidebar-1.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu-1.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="assets/css/sidebar.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!--Import materialize.css-->
    <link rel="stylesheet" type="text/css" href="../css/materialize.min.css">

    <!--Main css-->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0">
    <!-- Start: Sidebar Menu -->
    <div id="wrapper">
    <div id="sidebar-wrapper" style="background-color: #007abb;">
      <ul class="sidebar-nav">
        <li class="sidebar-brand" style="margin: 16px;"> <img src="assets/img/Remdii-Logo_final.png"></li>
        <li style="color: #ffffff;font-family: Poppins, sans-serif;background-color: rgba(0,0,0,0.1); padding:10px"> <img src="<?php echo 'profilePic/' . $_SESSION['profile_image'] ?>" width="90" height="90" alt=""> User: <?php echo $_SESSION['username'];  ?> </li>
        <li> <a href="#" style="background-color: #178ccb;font-family: Poppins, sans-serif;">Home</a></li>
        <li> <a href="questionnaire.php" style="color: #ffffff;font-family: Poppins, sans-serif;">Questionnaire</a></li>
        <li> <a href="selectbody.php" style="color: #ffffff;font-family: Poppins, sans-serif;">Update Condition</a></li>
        <li> <a href="chat.php" style="color: #ffffff;font-family: Poppins, sans-serif;">Chat</a></li>
        <li> <a href="setting.php" style="color: #ffffff;font-family: Poppins, sans-serif;">Setting</a></li>
        <li> <a href="logout.php" style="color: #ffffff;font-family: Poppins, sans-serif;">Logout</a></li>
      </ul>
    </div>
    <div class="d-flex page-content-wrapper" style="background-color: #007abb;height: 57px">
      <a class="btn btn-link" role="button" id="menu-toggle" href="#menu-toggle" style="background-color: #007abb;padding: 16px;"><i class="fa fa-bars" style="color: rgb(255,255,255);width: 16px;height: 16px;"></i></a>
      <h3 style="color: #ffffff;font-family: 'Carter One', cursive;margin: 12px;">Our Product<br></h3>
    </div>
  </div>
    <div class="container-fluid" style="background-color: #ffffff;">
        <div class="row">
            <div class="col-md-12" style="padding: 0px;">
                <div class="scrollable" style="background-color: #ffffff;">
                    <div class="card" style="margin: 12px;margin-left: 12px;height: 150%;background-color: #e8f4fa;">
                        <div class="card-body shadow-lg row" style="margin: 0px;padding: 10px;"><img class="col-sm-6" src="assets/img/calming_baby_balm_box_mockup_3_corrected.png" style="max-width: 50%;max-height: 144px;">
                            <div class="col-sm-6" style="max-width: 50%;padding: 0px;">
                                <h5 style="font-size: 12px;color: #007abb;font-family: Poppins, sans-serif;"><strong>REMDII® Care Calming Baby Balm (30gm)</strong><br></h5>
                                <p class="text-justify" style="margin: 0px;font-size: 10px;color: #000000;font-family: Poppins, sans-serif;">REMDII® Care Baby Balm is carefully designed to effectively relieve and soothe itchy, dry and irritated skin gently, being mild enough to be used on tender skin.<br></p>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="margin: 12px;margin-left: 12px;margin-right: 12px;">
                        <div class="card-body shadow row" style="margin: 0px;padding: 10px;background-color: #e8f4fa;"><img class="col-sm-6" src="assets/img/intensive112.png" style="max-width: 50%;max-height: 144px;">
                            <div class="col-sm-6" style="max-width: 50%;padding: 0px;">
                                <h5 style="font-size: 12px;color: #007abb;"><strong>REMDII® Intensive Moisturising Cream 112ml</strong><br></h5>
                                <p class="text-justify" style="margin: 0px;font-size: 10px;color: rgb(0,0,0);">A lightweight intensive moisturizing cream formulated with bioengineered vitamin E, which provides instant hydration to relieve dry skin<br></p>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="margin: 12px;margin-left: 12px;margin-right: 12px;">
                        <div class="card-body shadow row" style="margin: 0px;padding: 10px;background-color: #e8f4fa;"><img class="col-sm-6" src="assets/img/lip1.png" style="max-width: 50%;max-height: 144px;">
                            <div class="col-sm-8" style="max-width: 50%;padding: 0px;">
                                <h5 style="font-size: 12px;color: #007abb;"><strong>REMDII® Moisturising Lip Care (5g)</strong><br></h5>
                                <p style="margin: 0px;font-size: 10px;color: rgb(0,0,0);">The Lip care that can protect the lips<br></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Modal for rendering the charts, declare this if you want to render charts, 
         else you remove the modal -->

        <!--chatbot widget -->
        <div class="widget">
            <div class="chat_header">

                <!--Add the name of the bot here -->
                <span class="chat_header_title">Remdii</span>
                <span class="dropdown-trigger" href='#' data-target='dropdown1'>
                    <i class="material-icons">
                        more_vert
                    </i>
                </span>

                <!-- Dropdown menu-->
                <ul id='dropdown1' class='dropdown-content'>
                    <li><a href="#" id="clear">Clear</a></li>
                    <li><a href="#" id="restart">Restart</a></li>
                    <li><a href="#" id="close">Close</a></li>
                </ul>
            </div>

            <!--Chatbot contents goes here -->
            <div class="chats" id="chats">
                <div class="clearfix"></div>

            </div>

            <!--keypad for user to type the message -->
            <div class="keypad">
                <textarea id="userInput" placeholder="Type a message..." class="usrInput"></textarea>
                <div id="sendButton"><i class="fa fa-paper-plane" aria-hidden="true"></i></div>
            </div>
        </div>

        <!--bot profile-->
        <div class="profile_div" id="profile_div">
            <img class="imgProfile" src="../img/botAvatar.png" />
        </div>

        <!-- Bot pop-up intro -->
        <div class="tap-target" data-target="profile_div">
            <div class="tap-target-content">
                <h5 class="white-text">Hey there 👋</h5>
                <p class="white-text">I can help you get started with Rasa and answer your technical questions.</p>
            </div>
        </div>
    </div>
    <!--JavaScript at end of body for optimized loading-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>

    <!--Main Script -->
    <script type="text/javascript" src="../js/script.js"></script>

    <!--Chart.js Script -->
    <script type="text/javascript" src="../js/chart.min.js"></script>

    <!-- End: Sidebar Menu -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Sidebar-Menu.js"></script>
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