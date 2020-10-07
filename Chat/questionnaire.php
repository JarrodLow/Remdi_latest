<?php
$conn = mysqli_connect("localhost", "root", "", "remdiichat");

include('includes/database_connection.php');

session_start();

$message = '';

if (!isset($_SESSION['user_id'])) {
    header('location:login.php');
}

if (isset($_POST["submit"])) {
    $user_id = $_SESSION['user_id'];
    $question1 = trim($_POST["question1"]);
    $question2 = trim($_POST["question2"]);
    $question3 = trim($_POST["question3"]);
    $question4 = trim($_POST["question4"]);
    $question5 = trim($_POST["question5"]);
    $question6 = trim($_POST["question6"]);
    $question7 = trim($_POST["question7"]);
    $question8 = trim($_POST["question8"]);
    $question9 = trim($_POST["question9"]);
    $question10 = trim($_POST["question10"]);
    $question11 = trim($_POST["question11"]);
    $question12 = trim($_POST["question12"]);

    $query = "INSERT INTO questionnaire SET user_id='$user_id', question1='$question1', question2='$question2', question3='$question3', question4='$question4', question5='$question5', question6='$question6', question7='$question7', question8='$question8', question9='$question9', question10='$question10', question11='$question11', question12='$question12'";

    if (mysqli_query($conn, $query)) {
        $message = "Questionnaire has been done";
        header('location:homepg.php');
    } else {
        $message = "There was an error in the database";
    }
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
</head>

<style>
    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab-pane {
        display: none;
    }

    button {
        background-color: #4CAF50;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 17px;
        font-family: Raleway;
        cursor: pointer;
    }

    button:hover {
        opacity: 0.8;
    }

    #prevBtn {
        background-color: #a2d1ea;
        color: #ffffff;;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #5dafdb;
    }
</style>

<body>
    <!-- Start: Sidebar Menu -->
    <div id="wrapper">
    <div id="sidebar-wrapper" style="background-color: #007abb;">
      <ul class="sidebar-nav">
        <li class="sidebar-brand" style="margin: 16px;"> <img src="assets/img/Remdii-Logo_final.png"></li>
        <li style="color: #ffffff;font-family: Poppins, sans-serif;background-color: rgba(0,0,0,0.1); padding:10px"> <img src="<?php echo 'profilePic/' . $_SESSION['profile_image'] ?>" width="90" height="90" alt=""> User: <?php echo $_SESSION['username'];  ?> </li>
        <li> <a href="homepg.php" style="color: #ffffff;font-family: Poppins, sans-serif;">Home</a></li>
        <li> <a href="#" style="background-color: #178ccb;font-family: Poppins, sans-serif;">Questionnaire</a></li>
        <li> <a href="selectbody.php" style="color: #ffffff;font-family: Poppins, sans-serif;">Update Condition</a></li>
        <li> <a href="chat.php" style="color: #ffffff;font-family: Poppins, sans-serif;">Chat</a></li>
        <li> <a href="setting.php" style="color: #ffffff;font-family: Poppins, sans-serif;">Setting</a></li>
        <li> <a href="logout.php" style="color: #ffffff;font-family: Poppins, sans-serif;">Logout</a></li>
      </ul>
    </div>
    <div class="d-flex page-content-wrapper" style="background-color: #007abb;height: 57px">
      <a class="btn btn-link" role="button" id="menu-toggle" href="#menu-toggle" style="background-color: #007abb;padding: 16px;"><i class="fa fa-bars" style="color: rgb(255,255,255);width: 16px;height: 16px;"></i></a>
      <h3 style="color: #ffffff;font-family: 'Carter One', cursive;margin: 12px;">Questionnaire<br></h3>
    </div>
  </div>

    <div class="col-12 col-md-12 offset-0" style="padding: 0px;">
        <form method="post" id="ques" action="" style="padding: 0px 10px;">
            <div>
                <p class="text-danger"><?php echo $message; ?></p>
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="tab-1">
                        <div class="form-group"><label><strong>1. Name:</strong>&nbsp;<br><input class="form-control" name="question1" type="text" required></label></div>

                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-2">
                        <div class="form-group"><label><strong>Age:&nbsp;</strong><br><input class="form-control" type="number" name="question2" min="1" max="100" required></label></div>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-3">
                        <div class="form-group"><label><strong>Gender :</strong></label>
                            <div class="form-check"><input class="form-check-input" value="male" name="question3" type="radio" id="formCheck-1" required checked><label class="form-check-label" for="formCheck-1">Male</label></div>
                            <div class="form-check"><input class="form-check-input" value="female" name="question3" type="radio" id="formCheck-2"><label class="form-check-label" for="formCheck-2">Female</label></div>
                        </div>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-4">
                        <div class="form-group"><label><strong>4. Family history of eczema, asthma and allergic rhinitis</strong><br><input type="text" name="question4" class="form-control" required></label></div>
                    </div>

                    <div class="tab-pane" role="tabpanel" id="tab-5">
                        <div class="form-group"><label><strong>5. Diagnosis of doctor :</strong></label>
                            <div class="form-check"><input class="form-check-input" value="yes" name="question5" type="radio" id="formCheck-1" required checked><label class="form-check-label" for="formCheck-1">YES</label></div>
                            <div class="form-check"><input class="form-check-input" value="no" name="question5" type="radio" id="formCheck-2"><label class="form-check-label" for="formCheck-2">No</label></div>
                        </div>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-6">
                        <div class="form-group"><label><strong>6. Any shape to the rashes? Briefly describe.</strong><br><input type="text" name="question6" class="form-control" required></label></div>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-7">
                        <div class="form-group"><label><strong>7. State the current cream/oilment/lotion applied.</strong><br><input type="text" name="question7" class="form-control" required></label></div>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-8">
                        <div class="form-group"><label><strong>8. State the oral medication taken (if any)</strong><br><input type="text" name="question8" class="form-control" required></label></div>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-9">
                        <div class="form-group"><label><strong>9. Weeping? (Y/N)</strong><br></label>
                            <div class="form-check"><input class="form-check-input" value="yes" name="question9" type="radio" id="formCheck-1" required checked><label class="form-check-label" for="formCheck-1">YES</label></div>
                            <div class="form-check"><input class="form-check-input" value="no" name="question9" type="radio" id="formCheck-2"><label class="form-check-label" for="formCheck-2">No</label></div>
                        </div>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-10">
                        <div class="form-group"><label><strong>10. Bleeding ? (Y/N)</strong><br></label>
                            <div class="form-check"><input class="form-check-input" value="yes" name="question10" type="radio" id="formCheck-1" required checked><label class="form-check-label" for="formCheck-1">YES</label></div>
                            <div class="form-check"><input class="form-check-input" value="no" name="question10" type="radio" id="formCheck-2"><label class="form-check-label" for="formCheck-2">No</label></div>
                        </div>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-11">
                        <div class="form-group"><label><strong>11. Excoriation marks? (Y/N)</strong><br></label>
                            <div class="form-check"><input class="form-check-input" value="yes" name="question11" type="radio" id="formCheck-1" required checked><label class="form-check-label" for="formCheck-1">YES</label></div>
                            <div class="form-check"><input class="form-check-input" value="no" name="question11" type="radio" id="formCheck-2"><label class="form-check-label" for="formCheck-2">No</label></div>
                        </div>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-12">
                        <div class="form-group"><label><strong>12. Infection (Impetigo)? (Y/N)</strong>&nbsp;<br></label>
                            <div class="form-check"><input class="form-check-input" value="yes" name="question12" type="radio" id="formCheck-1" required checked><label class="form-check-label" for="formCheck-1">YES</label></div>
                            <div class="form-check"><input class="form-check-input" value="no" name="question12" type="radio" id="formCheck-2"><label class="form-check-label" for="formCheck-2">No</label></div>
                        </div>
                        <input class="float-right" type="submit" name="submit" value="Submit" style="background-color: #4CAF50;"></button>

                    </div>
                </div>
                <div style="overflow:auto;">
                    <div style="float:right;">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                        <!-- <input class="btn btn-primary border rounded shadow float-right" type="submit" name="submit" value="Submit" style="background-color: #11d3c7;"></button> -->
                    </div>
                </div>

                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>
            </div>

        </form>

    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Sidebar-Menu.js"></script>
</body>

</html>
<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab-pane");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").style.display = "none";
        } else {
            document.getElementById("nextBtn").style.display = "inline";
            document.getElementById("nextBtn").innerHTML = "Next";      
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab-pane");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("ques").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab-pane");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }

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