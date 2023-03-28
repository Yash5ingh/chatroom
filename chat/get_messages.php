<?php
// Connect to the database
include_once 'conn.php';

// Fetch the latest chat messages
$sql = "SELECT * FROM chats";
$result = mysqli_query($conn, $sql);
$checkresult = mysqli_num_rows($result);

if($checkresult > 0) {
  // Build the HTML for the chat messages
  $html = '';
  while($row = mysqli_fetch_assoc($result)) {
    $u = $row['user'];
    $m = $row['mssg']; 
    $c = $row['color'];
    $bgc = $c."40";
    $html .= "<div class='message'>
    <p class='message-time' style='color: $c;'>$u</p>
      <p class='message-text' style='background-color: $bgc;color:$c;border-width: 2px; border-style: solid;border-color: $c;'>$m</p>
    </div>";
  }
  
  // Return the HTML
  echo $html;
}
?>
