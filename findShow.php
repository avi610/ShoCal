<?

$con = mysql_connect("engr-cpanel-mysql.engr.illinois.edu","aerra2_shocal","password");
 
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}
 
mysql_select_db("aerra2_tvdata", $con);

$article_name = $_GET['name'];

#if( ! is_numeric($article_name) )
#  die('invalid article id');

$query = "SELECT * FROM `shows` WHERE `name` like '%$article_name%'";

$shows = mysql_query($query);

echo "<h1>Show</h1>";

if (!$shows) { // add this check.
    die('Invalid query: ' . mysql_error());
}

while($row = mysql_fetch_array($shows, MYSQL_ASSOC))
{
  $name = $row['name'];
  $network = $row['network'];
  $showid = $row['showid'];
  $started = $row['started'];
  $totalseasons = $row['totalseasons'];
  $image = $row['image'];
  $airday = $row['airday'];
  
  print "<div style='margin:30px 0px;'>
      Name: $name<br />
      Network: $network<br />
      Started: $started<br />
      Air Day: $airday<br />
      Total Seasons: $totalseasons
      </div>
  ";
  
  #$img = imagecreatefrompng('$image');
  #header('Content-type: image/jpg');
  #readfile($image);
  #echo '<img src="$img" title="Error" alt="Error" />';
}

mysql_close($con);
