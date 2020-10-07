<?php

include('includes/database_connection.php');

session_start();

if (!isset($_SESSION['user_id'])) {
  header('location:loginAdmin.php');
}
$_SESSION['qid'] = "";
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
  <link rel="stylesheet" href="assets/css/Sidebar-Menu-1.css">
  <link rel="stylesheet" href="assets/css/Sidebar-Menu.css">
</head>

<body style="background-color: #ffffff;">
  <img class="d-flex align-items-start m-auto" src="assets/img/Remdii-Logo_final.png" style="margin: 0px;margin-right: 0px;margin-left: 0px;">
  <p class="text-center" style="color: #000000;font-size: 20px;margin-right: 16px;margin-left: 16px;">Chat with user</p>
  <div class="container">
    <div class="table-responsive" style="margin: 6px;">
      <div id="user_details"></div>
      <div id="user_model_details"></div>
    </div>
  </div>
  <div class="btn-group d-flex col-sm" role="group" id="bottom" style="padding: 0px;min-height: 40px;">
    <button class="btn btn-primary col-sm" type="button" onclick="location.href='setting.php';" style="background-color: #17afcf;">Setting</button>
    <button class="btn btn-primary col-sm" type="button" onclick="location.href='logout.php';" style="background-color: #0694ab;">Log out</button>
  </div>

  <!--Chart.js Script -->
  <script type="text/javascript" src="../js/chart.min.js"></script>

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
      update_chat_history_data();
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

    function make_chat_dialog_box(to_user_id, to_user_name) {
      var modal_content = '<div id="user_dialog_' + to_user_id + '" class="user_dialog" title="You have chat with ' + to_user_name + '"></p>';
      modal_content += '<div style="height:400px; background-color: #ffffff; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="' + to_user_id + '" id="chat_history_' + to_user_id + '">';
      modal_content += fetch_user_chat_history(to_user_id);
      modal_content += '</div>';
      modal_content += '<div class="form-group">';
      modal_content += '<textarea name="chat_message_' + to_user_id + '" id="chat_message_' + to_user_id + '" class="form-control chat_message"></textarea>';
      modal_content += '</div><div class="form-group" align="right">';
      modal_content += '<button type="button" name="send_chat" id="' + to_user_id + '" class="btn btn-info send_chat">Send</button></div></div>';
      $('#user_model_details').html(modal_content);
    }

    $(document).on('click', '.start_chat', function() {
      var to_user_id = $(this).data('touserid');
      var to_user_name = $(this).data('tousername');
      make_chat_dialog_box(to_user_id, to_user_name);
      $("#user_dialog_" + to_user_id).dialog({
        autoOpen: false,
        width: 400
      });
      $('#user_dialog_' + to_user_id).dialog('open');
    });

    $(document).on('click', '.send_chat', function() {
      var to_user_id = $(this).attr('id');
      var chat_message = $('#chat_message_' + to_user_id).val();
      $.ajax({
        url: "insert_chat.php",
        method: "POST",
        data: {
          to_user_id: to_user_id,
          chat_message: chat_message
        },
        success: function(data) {
          $('#chat_message_' + to_user_id).val('');
          $('#chat_history_' + to_user_id).html(data);
        }
      })
    });

    function fetch_user_chat_history(to_user_id) {
      $.ajax({
        url: "fetch_chat_history.php",
        method: "POST",
        data: {
          to_user_id: to_user_id
        },
        success: function(data) {
          $('#chat_history_' + to_user_id).html(data);
        }
      })
    }

    function update_chat_history_data() {
      $('.chat_history').each(function() {
        var to_user_id = $(this).data('touserid');
        fetch_user_chat_history(to_user_id);
      });
    }

    $(document).on('click', '.ui-button-icon', function() {
      $('.user_dialog').dialog('destroy').remove();
    });

    $(document).on('focus', '.chat_message', function() {
      var is_type = 'yes';
      $.ajax({
        url: "update_is_type_status.php",
        method: "POST",
        data: {
          is_type: is_type
        },
        success: function() {

        }
      })
    });

    $(document).on('blur', '.chat_message', function() {
      var is_type = 'no';
      $.ajax({
        url: "update_is_type_status.php",
        method: "POST",
        data: {
          is_type: is_type
        },
        success: function() {

        }
      })
    });

  });
</script>