<?php
function findShows(){
$con = mysql_connect("engr-cpanel-mysql.engr.illinois.edu","aerra2_shocal","password");
 
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}
 
mysql_select_db("aerra2_ShoCalUserAccounts", $con);

$name = $_GET['name'];
$network = $_GET['network'];
$airday = $_GET['airday'];
$airtime = $_GET['airtime'];
$class = $_GET['class'];

$query = "SELECT * FROM `shows`";

$exist = 0;

if ($name != "" )
{
	$query .= " WHERE `name` like '%$name%'";
	$exist = 1;
}
if ($network != "" )
{
	if ($exist == 1)
		$query .= " AND";
	else
		$query .= " WHERE";
	$query .= " `network` like '%$network%'";
	$exist = 1;
}
if ($airday != "" )
{
	if ($exist == 1)
		$query .= " AND";
	else
		$query .= " WHERE";
	$query .= " `airday` like '%$airday%'";
	$exist = 1;
}
if ($airtime != "" )
{
	if ($exist == 1)
		$query .= " AND";
	else
		$query .= " WHERE";
	$query .= " `airtime` like '%$airtime%'";
	$exist = 1;
}
if ($class != "" )
{
	if ($exist == 1)
		$query .= " AND";
	else
		$query .= " WHERE";
	$query .= " `classification` like '%$class%'";
}

$shows = mysql_query($query);

if (!$shows) { // add this check.
    die('Invalid query: ' . mysql_error());
}

return $shows;

while($row = mysql_fetch_array($shows, MYSQL_ASSOC))
{
  $name = $row['name'];
  $network = $row['network'];
  $showid = $row['showid'];
  $started = $row['started'];
  $totalseasons = $row['totalseasons'];
  $image = $row['image'];
  $airday = $row['airday'];
  
  #NEED TO PRINT
  
    
  #$img = imagecreatefrompng('$image');
  #header('Content-type: image/jpg');
  #readfile($image);
  #echo '<img src="$img" title="Error" alt="Error" />';
}

mysql_close($con);
}
?>
<!DOCTYPE html>
<html>
<head><title>ShoCal</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">ShoCal</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>ShoCal</h1>
        <p>
        
        <h3>Welcome, <?php echo $_COOKIE["username"]; ?></h3>
        <h3></h3>
        
        <?php
	        $shows = findShows();
	        while($row = mysql_fetch_array($shows, MYSQL_ASSOC))
		{
		  $name = $row['name'];
		  $network = $row['network'];
		  $showid = $row['showid'];
		  $started = $row['started'];
		  $totalseasons = $row['totalseasons'];
		  $image = $row['image'];
		  $airday = $row['airday'];
		  $airtime = $row['airtime'];
		  
		  #NEED TO PRINT
		  print "<h5>
			Name: $name <br/>
			Network: $network <br/>
			Airday: $airday <br/>
			Airtime: $airtime <br/>		 
		  </h5>
		  <form action=\"addToCal.php\">
		  <input type =\"hidden\" name = \"id\" value = \"$showid\">
    		  <input type=\"submit\" value=\"Add To Calander\" class = \"btn btn-danger\">
                  </form>"
                  ;
		 
		    
		  #$img = imagecreatefrompng('$image');
		  #header('Content-type: image/jpg');
		  #readfile($image);
		  #echo '<img src="$img" title="Error" alt="Error" />';
		}

        ?>
        
        <body onload="document.name.reset();">        
        </p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-4">
          <h2>Founders</h2>
          <p>Avinash Aerra</br> 
             Shaailesh Devarmanai</br>
             Varun Kethineedi</p>
          <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <h2>About ShoCal</h2>
          <p>A revolutionary way to watch TV.</p>
          <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
       </div>
        <div class="col-lg-4">
          <h2>Learn More</h2>
          <p>Coming Soon</p>
          <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; Company 2013</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

</body>
</html>