
<?php


include('includes/database_connection.php');

session_start();

$query = "
SELECT * FROM login 
WHERE user_id != '" . $_SESSION['user_id'] . "' 
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '
<div class="table-responsive" style="margin: 2px;">
<table class="table">
<tr>
<th style="background-color: #5dafdb;">User</td>
 <th style="background-color: #5dafdb;">Status</td>
 <th style="background-color: #5dafdb;">Action</td>
</tr>
';

foreach ($result as $row) {
    if ($row['user_type'] == "user") {
        $status = '';
        $id = $row['user_id'];
        $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
        $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
        $user_last_activity = fetch_user_last_activity($row['user_id'], $connect);
        if ($user_last_activity > $current_timestamp) {
            $status = '<span class="label label-success">Online</span>';
        } else {
            $status = '<span class="label label-danger">Offline</span>';
        }
        $output .= '
 <tr>
 <tr style="background-color: #a2d1ea;">
  <td style="background-color: rgba(255,255,255,0.2);color: #000000;"><img src=' . '../Chat/profilePic/' . '' . $row['profile_image'] . ' width="60" height="60" alt=""><a href="userdetail.php?id=' . $id . '">' . $row['username'] . '</a> ' . count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect) . ' ' . fetch_is_type_status($row['user_id'], $connect) . '</td>
  <td style="background-color: rgba(255,255,255,0.2);color: #000000;">' . $status . '</td>
  <td style="background-color: rgba(255,255,255,0.2);color: #000000;"><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="' . $row['user_id'] . '" data-tousername="' . $row['username'] . '">Chat</button></td>
 </tr>
 ';
    }
}

$output .= '</table>';

echo $output;

?>