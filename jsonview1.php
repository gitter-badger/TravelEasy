<?php 
  session_start();

  // If the session vars aren't set, try to set them with a cookie
  if (!isset($_SESSION['username'])) {
    if ( isset($_COOKIE['username'])) {
      $_SESSION['username'] = $_COOKIE['username'];
    }
  }
  $username=$_SESSION['username'];
$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$database = "travel"; 

$linkID = mysql_connect($host, $user, $pass) or die("Could not connect to host."); 
mysql_select_db($database, $linkID) or die("Could not find database."); 

$query = mysql_query("SELECT * FROM notes WHERE username='$username'");
$rows = array();
while($row = mysql_fetch_assoc($query)) {
    $rows[] = $row;
}
print json_encode($rows);
?>