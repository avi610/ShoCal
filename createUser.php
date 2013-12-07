<?

$con = mysql_connect("engr-cpanel-mysql.engr.illinois.edu","aerra2_shocal","password");
 
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}
 
mysql_select_db("aerra2_ShoCalUserAccounts", $con);

$user = $_GET['name'];
$pass = $_GET['password'];
$email = $_GET['email'];

#if( ! is_numeric($article_name) )
#  die('invalid article id');

$query = "SELECT * FROM `users` WHERE `username` = '$user'";
$resp = mysql_query($query);

$exists = 0;

while($row = mysql_fetch_array($resp, MYSQL_ASSOC))
{
  $exists = 1;
  $name = $row['username'];
  echo "<div>Username $name exists</div>";
  break;
}

if ($exists == 0)
{
	$query = "INSERT INTO `users` VALUES ('$user', '$pass', '$email')";
	$resp = mysql_query($query);
	echo '<p>Account Created</p>';
	$sql = "CREATE TABLE `$user`(showid int)";
	$resp2 = mysql_query($sql);
}

echo "<p>Done</p>";

mysql_close($con);

sleep(3);

echo '<meta http-equiv="refresh" content="0; url=http://web.engr.illinois.edu/~aerra2/ShoCal/in.html" />';

?>