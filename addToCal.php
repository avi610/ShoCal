<?

$con = mysql_connect("engr-cpanel-mysql.engr.illinois.edu","aerra2_shocal","password");
 
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}
 
mysql_select_db("aerra2_ShoCalUserAccounts", $con);

$user = $_COOKIE["username"];
$idd = $_GET['id'];


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

if ($exists == 1)
{
	$query = "SELECT * FROM `$user` WHERE `showid` = '$idd'";
	$resp = mysql_query($query);
	
	$exists = 0;
	
	while(empty($resp) || $row = mysql_fetch_array($resp, MYSQL_ASSOC))
	{
	  $exists = 1;
	  break;
	}
	
	if ($exists == 0)
	{
		$sql = "INSERT INTO `$user` VALUES ('$idd')";
		$resp2 = mysql_query($sql);
	}
}



echo "<p>Done</p>";
#change to actual site
echo '<meta http-equiv="refresh" content="0; url=http://web.engr.illinois.edu/~aerra2/ShoCal/main.php" />';
mysql_close($con);

?>