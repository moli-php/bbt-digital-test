
<!DOCTYPE html>
<html>
<head>
	<title>404 Page Not Found</title>
<link rel="stylesheet" href="<?php echo $base_path; ?>assets/bootstrap/css/bootstrap.min.css" />
<script src="<?php echo $base_path; ?>assets/js/jquery.min.js"></script>
<script src="<?php echo $base_path; ?>assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo $base_path; ?>">BBT Digital Test</a>
		</div>
		
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class=""><a href="<?php echo $base_path; ?>company">Company</a></li>
				<li class=""><a href="<?php echo $base_path; ?>employees">Employees</a></li>
				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#page3">Add<i class="caret"></i></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo $base_path; ?>add/company">Company</a></li>
						<li><a href="<?php echo $base_path; ?>add/employees">Employee</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>

	<div id="container">
			<div class="jumbotron">
				<h1><?php echo $heading; ?></h1>
				<p><?php echo $message; ?></p>
				<p><a class="btn btn-success" href="<?php echo $base_path; ?>">Go Back</a></p>
			</div>
		
	</div>
	
</body>
</html>