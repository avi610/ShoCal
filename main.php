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
         <span id="signinButton" style = "float: right" >
	  <span
	    class="g-signin"
	    data-callback="signinCallback"
	    data-clientid="399861251234-sj49hnvmnbr4pkuui4q7avrua5l6lt59.apps.googleusercontent.com"
	    data-cookiepolicy="single_host_origin"
	    data-requestvisibleactions="http://schemas.google.com/AddActivity"
	    data-scope="https://www.googleapis.com/auth/plus.login">
	  </span>
	</span>
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
        
        <div class="col-lg-4 col-lg-offset-1">
        <form class="bs-example" action="findShow.php" method="get">
          <div class="form-group">
            <label class="control-label" for="name">Name</label>
            <input class="form-control" id="name" type="text" name="name" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="control-label" for="network">Network</label>
            <input class="form-control" id="network" type="text" name="network" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="control-label" for="airday">Airday</label>
            <input class="form-control" id="airday" type="text" name="airday" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="control-label" for="airtime">Airtime</label>
            <input class="form-control" id="airtime" type="text" name="airtime" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="control-label" for="class">Classification</label>
            <input class="form-control" id="class" type="text" name="class" autocomplete="off">
          </div>
          <input type="submit" value = "Search" class="btn btn-danger">
        </form>
        </div>
        
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