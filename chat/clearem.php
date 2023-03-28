<?php 
include_once 'conn.php';

$sql = "truncate chats;";
mysqli_query($conn, $sql);

