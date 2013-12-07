<?

$con = mysql_connect("engr-cpanel-mysql.engr.illinois.edu","aerra2_shocal","password");
 
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}
 
mysql_select_db("aerra2_ShoCalUserAccounts", $con);

$user = $_GET['name'];
$pass = $_GET['password'];

#if( ! is_numeric($article_name) )
#  die('invalid article id');

$query = "SELECT * FROM `users` WHERE `username` = '$user' AND `password` = '$pass'";
$resp = mysql_query($query);

if (!$resp) { // add this check.
    die('Invalid query: ' . mysql_error());
}

$exists = 0;

while($row = mysql_fetch_array($resp, MYSQL_ASSOC))
{
  $exists = 1;
  $name = $row['username'];
  setcookie("username", $name, time() + 3600);
  echo '<meta http-equiv="refresh" content="0; url=http://web.engr.illinois.edu/~aerra2/ShoCal/main.php" />';
  break;
}

if ($exists == 0)
{
	echo "<p>Login Failed</p>";
}

mysql_close($con);

?>