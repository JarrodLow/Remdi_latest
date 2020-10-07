<?php

include('includes/database_connection.php');

session_start();
$message = '';

if (!isset($_SESSION['user_id'])) {
    header('location:login.php');
}

$user_id = $_SESSION['user_id'];

if (isset($_POST["update"])) {
    $currentPassword = trim($_POST["currentpassword"]);
    $newpassword = trim($_POST["newpassword"]);
    $confirmPassword = trim($_POST["confirmPassword"]);

    $query = " 
    SELECT * FROM login 
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
            if (password_verify(
                $currentPassword,
                $row["password"]
            )) {
                //update
                if ($newpassword != $confirmPassword) {
                    $message = '<p><label>New Password not match</label></p>';
                }
                if ($message == '') {
                    $data = array(
                        ':password'  => password_hash($newpassword, PASSWORD_DEFAULT)
                    );
                    $query = "
                    UPDATE login 
                    SET password = :password
                    WHERE user_id = $user_id 
                    ";
                    $statement = $connect->prepare($query);
                    if ($statement->execute($data)) {
                        $message = "<label>Update Completed</label>";
                    }
                }
            } else {
                $message = "<label>Wrong Current Password</label>";
            }
        }
    } else {
        $message = "<label>Something went wrong</labe>";
    }
}

$conn = mysqli_connect("localhost", "root", "", "remdiichat");

if (isset($_POST['updateImage'])) {

    $profileImageName = $_FILES["profileImage"]["name"];
    // For image upload
    $target_dir = "profilePic/";
    $target_file = $target_dir . basename($profileImageName);
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if ($_FILES['profileImage']['size'] > 200000) {
        $msg = "Image size should not be greated than 200Kb";
        $msg_class = "alert-danger";
    }

    $query = " 
    SELECT * FROM login 
WHERE user_id = $user_id 
";
    $statement = $connect->prepare($query);
    $statement->execute();
    $count = $statement->rowCount();

    $retrieve = "select * from login WHERE email='$email';";
    $res = mysqli_query($conn, $retrieve);
    if (mysqli_num_rows($res) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($res);
    } else {
        if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
            $sql = "UPDATE login SET profile_image='$profileImageName' WHERE user_id = $user_id";
            if (mysqli_query($conn, $sql)) {
                $msg = "Image uploaded and saved in the Database";
                header("Location:homepg.php");

                $_SESSION['profile_image'] = $profileImageName;
                $msg_class = "alert-success";
            } else {
                $msg = "There was an error in the database";
                $msg_class = "alert-danger";
            }
        } else {
            $error = "There was an error uploading the file";
            $msg = "alert-danger";
        }
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
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu-1.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="assets/css/sidebar.css">
    <link rel="stylesheet" href="assets/css/sidebar-1.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
    <div id="wrapper">
        <div id="sidebar-wrapper" style="background-color: #007abb;">
            <ul class="sidebar-nav">
                <li class="sidebar-brand" style="margin: 16px;"> <img src="assets/img/Remdii-Logo_final.png"></li>
                <li style="color: #ffffff;font-family: Poppins, sans-serif;background-color: rgba(0,0,0,0.1); padding:10px"> <img src="<?php echo 'profilePic/' . $_SESSION['profile_image'] ?>" width="90" height="90" alt=""> User: <?php echo $_SESSION['username'];  ?> </li>
                <li> <a href="homepg.php" style="color: #ffffff;font-family: Poppins, sans-serif;">Home</a></li>
                <li> <a href="questionnaire.php" style="color: #ffffff;font-family: Poppins, sans-serif;">Questionnaire</a></li>
                <li> <a href="selectbody.php" style="color: #ffffff;font-family: Poppins, sans-serif;">Update Condition</a></li>
                <li> <a href="chat.php" style="color: #ffffff;font-family: Poppins, sans-serif;">Chat</a></li>
                <li> <a href="#" style="background-color: #178ccb;font-family: Poppins, sans-serif;">Setting</a></li>
                <li> <a href="logout.php" style="color: #ffffff;font-family: Poppins, sans-serif;">Logout</a></li>
            </ul>
        </div>
        <div class="d-flex page-content-wrapper" style="background-color: #007abb;height: 57px">
            <a class="btn btn-link" role="button" id="menu-toggle" href="#menu-toggle" style="background-color: #007abb;padding: 16px;"><i class="fa fa-bars" style="color: rgb(255,255,255);width: 16px;height: 16px;"></i></a>
            <h3 style="color: #ffffff;font-family: 'Carter One', cursive;margin: 12px;">Setting<br></h3>
        </div>
    </div>


    <div class="login-clean" style="padding: 0px;">
        <form action="setting.php" method="post" enctype="multipart/form-data" class="shadow" method="post" style="background-color: #178ccb;padding: 20px;padding-top: 0px;margin-top: 15px;margin-bottom: 15px;">
            <div class="illustration"><img class="d-flex mx-auto" src="assets/img/Remdii-Logo_final.png" style="color: rgba(0,0,0,0.1);"></div>
            <h3 class="text-center" style="color: rgb(255,255,255);padding-right: 12px;padding-left: 12px;padding-top: 6px;padding-bottom: 6px;font-size: 24px;">Update Profile Picture</h3>
            <?php if (!empty($msg)) : ?>
                <div class="alert <?php echo $msg_class ?>" role="alert">
                    <?php echo $msg; ?>
                </div>
            <?php endif; ?>
            <div class="d-flex justify-content-center align-items-center" style="height: 100px;margin: 12px;margin-top: 0px;">
                <img src="<?php echo 'profilePic/' . $_SESSION['profile_image'] ?>" onClick="triggerClick()" id="profileDisplay" class="border rounded border-secondary shadow d-flex justify-content-center align-items-center" style="height: 100px;width: 100px;font-size: 100px;background-color: #ffffff;" alt=""></div>
            <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
            <div class="form-group">
                <button type="submit" name="updateImage" style="background-color: #11d3c7;" class="btn btn-primary btn-block border rounded shadow" style="background-color: #178ccb;">Update Profile Picture<br></button>
        </form>
    </div>
    </form>
    <form action="setting.php" method="post" onSubmit="return validatePassword()" class="shadow" style="background-color: #178ccb;">
        <h1 class="text-center" style="color: rgb(255,255,255);font-size: 22px;">Update new Password</h1>
        <div class="message"><?php if (isset($message)) {
                                    echo $message;
                                } ?></div>
        <div class="form-group"><input class="border rounded border-primary shadow form-control" type="password" name="currentpassword" id="currentPassword" placeholder="Current Password" style="color: #c4c4c4;background-color: #ffffff;" required></div>
        <div class="form-group"><input class="border rounded border-primary shadow form-control" type="password" name="newpassword" id="newpassword" placeholder="New Password" style="color: #c4c4c4;background-color: #ffffff;" required></div>
        <div class="form-group"><input class="border rounded border-primary shadow form-control" type="password" name="confirmPassword" id="confirmPassword" placeholder="Repeat New Password" style="color: #c4c4c4;background-color: #ffffff;" required></div>
        <div class="form-group"><button class="btn btn-primary btn-block border rounded shadow" type="submit" name="update" value="Update" style="background-color: #11d3c7;">Update new Password<br></button></div>
    </form>
    </div>


    <!-- 
    <form action="setting.php" method="post" enctype="multipart/form-data">
        <?php if (!empty($msg)) : ?>
            <div class="alert <?php echo $msg_class ?>" role="alert">
                <?php echo $msg; ?>
            </div>
        <?php endif; ?>
        <div class="form-group text-center" style="position: relative;">
            <span class="img-div">
                <div class="text-center img-placeholder" onClick="triggerClick()">
                    <h4>Update image</h4>
                </div>
                <img src="<?php echo 'profilePic/' . $_SESSION['profile_image'] ?>" onClick="triggerClick()" id="profileDisplay" width="90" height="90" alt="">
            </span>
            <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
            <label>Click Image to update
            </label>
        </div>
        <div class="form-group">
            <button type="submit" name="updateImage" class="btn btn-primary btn-block">Update Image</button>
        </div>
    </form> -->

    <!-- <form action="setting.php" method="post" onSubmit="return validatePassword()">
        <div class="message"><?php if (isset($message)) {
                                    echo $message;
                                } ?></div>
        <div class="form-group">
            <label>Enter Current Password</label>
            <input type="password" name="currentpassword" id="currentPassword" class="form-control" required />
        </div>
        <div class="form-group">
            <label>Enter New Password</label>
            <input type="password" name="newpassword" id="newpassword" class="form-control" required />
        </div>
        <div class="form-group">
            <label>Re-enter New Password</label>
            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" required />
        </div>
        <div class="form-group">
            <input type="submit" name="update" class="btn btn-info" value="Update" />
        </div>
    </form>
    </div> -->

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Off-Canvas-Sidebar-Drawer-Navbar.js"></script>
    <script src="assets/js/Off-Canvas-Sidebar-Drawer-Navbar-1.js"></script>
    <script src="assets/js/Sidebar-Menu.js"></script>
</body>

</html>

<script>
    function triggerClick(e) {
        document.querySelector('#profileImage').click();
    }

    function displayImage(e) {
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
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