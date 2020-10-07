<?php
// Create database connection
include('includes/database_connection.php');
$conn = mysqli_connect("localhost", "root", "", "remdiichat");

session_start();
// Initialize message variable
if (!isset($_SESSION['user_id'])) {
    header('location:login.php');
}

$user_id = $_SESSION['user_id'];
$msg = "";


// If upload button is clicked ...
if (isset($_POST['upload'])) {
    // Get image name
    $condition_image = $_FILES['condition_image']['name'];
    // Get text
    $questionnaire_id = "";
    $query = " 
    SELECT * FROM questionnaire 
WHERE user_id = $user_id 
";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':user_id' => $user_id
        )
    );
    $count = $statement->rowCount();
    if ($count > 0) {
        $result = $statement->fetchAll();
        foreach ($result as $row) {
            $questionnaire_id = $row['questionnaire_id'];
        }
    }


    // image file directory
    $target = "user_condition/" . basename($condition_image);

    if ($_FILES['condition_image']['size'] > 200000) {
        $msg = "Image size should not be greated than 200Kb";
        $msg_class = "alert-danger";
    }

    if (file_exists($target)) {
        $msg = "File already exists";
        $msg_class = "alert-danger";
    }

    $sql = "INSERT INTO user_condition SET questionnaire_id = '$questionnaire_id', condition_image = '$condition_image', upload_time = now(), type = 'LeftHand' ";
    // execute query
    $res = mysqli_query($conn, $sql);

    if (move_uploaded_file($_FILES['condition_image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
        header('location:selectbody.php');
    } else {
        $msg = "Failed to upload image";
    }
}
$result = mysqli_query($conn, "SELECT * FROM user_condition WHERE type = 'LeftHand'") or die(mysqli_error($conn));;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/bodyselect.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/sidebar-1.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu-1.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu.css">

    <style type="text/css">
        #img_div:after {
            content: "";
            display: block;
            clear: both;
        }
    </style>
</head>

<body style="background-color: #ffffff;">
    <div class="d-flex page-content-wrapper" style="background-color: #007abb;">
        <button class="btn btn-primary btn-link" onclick="goBack()" type="button" style="background-image: url(&quot;assets/img/backbutton.png&quot;);width: 30px;height: 30px;background-size: contain;background-repeat: no-repeat;padding: 0px;background-color: #007abb;margin: 12px;">&nbsp; &nbsp;</button>
        <h3 style="color: #ffffff;font-family: 'Carter One', cursive;margin: 12px;">Left&nbsp;Hand&nbsp;Condition<br></h3>
    </div>
    <div style="margin: 12px;background-color: #ffffff;">
        <div style="margin: 12px;background-color: #a2d1ea;">
            <div id="content">
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    echo "<div id='img_div' class='text-center' style='background-color: #ffffff;padding: 6px;'>";
                    echo "<img style='width: 100px;height: 100px;' src='user_condition/" . $row['condition_image'] . "' ><a href='wholePage.php?cimage=" . $row['condition_image'] . "'>Image</a>";
                    echo "<p style='color: #000000;background-color: rgba(0,0,0,0);margin: 0px;'>" . $row['upload_time'] . "</p>";
                    echo "</div>";
                }
                ?>
                <form method="POST" action="updateconditionLeftHand.php" enctype="multipart/form-data" style="padding: 6px;">
                    <div style="padding: 6px;">
                        <input type="file" name="condition_image" accept="image/*" capture="camera">
                    </div>
                    <div class="text-center" style="padding: 6px;">
                        <button type="submit" class="btn btn-primary" name="upload">Upload</button>
                    </div>
                </form>
            </div>
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