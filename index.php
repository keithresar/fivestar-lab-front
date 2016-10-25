<?php

$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("MYSQL_USER");
$dbpwd = getenv("MYSQL_PASSWORD");
$dbname = getenv("MYSQL_DATABASE");

$connection = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);

if ($connection->connect_errno)  {
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}




?>

<html>

<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


</head>


<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Five-Star Lab Registration</a>
        </div>
		<!--
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
		-->
      </div>
    </nav>

    <div class="container" style="margin-top:60px;">

     <?php
	   
	   if (array_key_exists('email',$_REQUEST))  {
	     mysqli_query($connection,sprintf("insert into contacts 
		             set name='%s',
					     email='%s',
						 rhug='%s'",addslashes($_REQUEST['name']),
						            addslashes($_REQUEST['email']),
						            addslashes($_REQUEST['rhug'])));
	     print "<div class='alert alert-success' role='alert'>You have been registered. Expect an email with access details shortly.</div>";
	   }

	 ?>

	  <p>
	    Welcome to the Five-Star lab registration.  Please fill out the form below.  When an account has been provisioned you'll receive an
		email with access information.
	  </p>
	  <hr>

      <form class="form-horizontal" method="post" action="/">
        <div class="form-group">
          <label for="exampleInputEmail1" class="col-sm-2 control-label">Name</label>
		  <div class="col-sm-4">
            <input type="text" name="name" class="form-control" placeholder="Name">
		  </div>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1" class="col-sm-2 control-label">Email</label>
		  <div class="col-sm-4">
            <input type="email" name="email" class="form-control" placeholder="Email">
		  </div>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1" class="col-sm-2 control-label">Register for RHUG</label>
		  <div class="col-sm-2">
		    <select class="form-control" name="rhug">
		      <option value="No">No Don't Add Me</option>
		      <option value="Minneapolis">Minneapolis Area</option>
		      <option value="Brookfield">Brookfield Area</option>
		      <option value="St Louis">St Louis Area</option>
		      <option value="Other">Other</option>
		    </select>
		  </div>
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
      </form>

    </div><!-- /.container -->

</body>


