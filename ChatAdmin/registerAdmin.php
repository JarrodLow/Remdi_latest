<?php include_once('uploadAdmin.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Image Preview and Upload PHP</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />

  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
  <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
  <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="background-color: #ffffff;">
  <!-- Start: Register Form Clean -->
  <div class="login-clean" style="background-color: #ffffff;padding: 20px;">
    <form class="shadow-none" action="registerAdmin.php" method="post" enctype="multipart/form-data" class="shadow-none" style="background-color: #178ccb;padding: 20px;padding-top: 0px;">
    <button class="btn btn-primary" onclick="goBack()" type="button" style="background-color: rgba(0,0,0,0);background-image: url(&quot;assets/img/backbutton.png&quot;);width: 30px;height: 30px;margin-left: 30px;background-size: contain;background-repeat: no-repeat;">&nbsp; &nbsp;</button>
    <div class="illustration"><img class="d-flex mx-auto" src="assets/img/Remdii-Logo_final.png" style="color: rgba(0,0,0,0.1);"></div>
    <h3 class="text-center" style="color: rgb(255,255,255);padding-right: 12px;padding-left: 12px;padding-top: 6px;padding-bottom: 6px;">Register</h3>
      <?php if (!empty($msg)) : ?>
        <div class="alert <?php echo $msg_class ?>" role="alert">
          <?php echo $msg; ?>
        </div>
      <?php endif; ?>
      <div class="d-flex justify-content-center align-items-center" style="height: 100px;margin: 12px;margin-top: 0px;">
        <div class="form-group text-center" style="position: relative;">
          <span class="img-div">
            <img class="icon ion-ios-upload-outline border rounded border-secondary d-flex justify-content-center align-items-center" style="height: 100px;width: 100px;font-size: 100px;background-color: #ffffff;" src="upload.png" onClick="triggerClick()" id="profileDisplay">
          </span>
          <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
        </div>
      </div>
      <div class="form-group"><input class="border rounded border-primary shadow-sm form-control" type="text" name="username" placeholder="Username" style="color: #c4c4c4;background-color: #ffffff;" required></div>
      <div class="form-group"><input class="border rounded border-primary shadow-sm form-control" type="email" name="email" placeholder="Email" style="color: #c4c4c4;background-color: #ffffff;" required></div>
      <div class="form-group"><input class="border rounded border-primary shadow-sm form-control" type="password" name="password" placeholder="password" style="color: #c4c4c4;background-color: #ffffff;" minlength="6" required></div>
      <div class="form-group"><button class="btn btn-primary btn-block border rounded shadow-sm" type="submit" name="save_profile" style="background-color: #11d3c7;">Register<br></button></div>
      <a class="forgot" href="loginAdmin.php" style="color: #ffffff;">Have an account? Click here.</a>
    </form>
  </div>
  <!-- End: Login Form Clean -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>


</body>

</html>
<script >
function triggerClick(e) {
  document.querySelector('#profileImage').click();
}
function displayImage(e) {
  if (e.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e){
      document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}
</script>