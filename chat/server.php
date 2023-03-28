<?php 
include_once 'conn.php';

    if(isset($_GET['message'])){
        if($_GET['message'] != "")
        {
            $name = $_GET['name'];
            $mssg = $_GET['message'];
            $color = strval($_GET['color']) ;
            $sql = "INSERT INTO chats VALUES('$name','$mssg','$color');";
            $result = mysqli_query($conn, $sql);
        }
    }

$html = '';
$sql = "SELECT * FROM chats;";
$result = mysqli_query($conn, $sql);
$checkresult = mysqli_num_rows($result);

if($checkresult > 0)
{
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
}
// Return the updated chat messages HTML
echo $html;
?>