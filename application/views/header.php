<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/simple-form-validation/simple-form-validation.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ie10-viewport-bug-workaround.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sticky-footer-navbar.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/simple-form-validation/simple-form-validation.js"></script>
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
			<a class="navbar-brand" href="<?php echo base_url(); ?>">BBT Digital Test</a>
		</div>
		
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class=""><a href="<?php echo base_url(); ?>company">Company</a></li>
				<li class=""><a href="<?php echo base_url(); ?>employees">Employees</a></li>
				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#page3">Add<i class="caret"></i></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url(); ?>add/company">Company</a></li>
						<li><a href="<?php echo base_url(); ?>add/employees">Employee</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>
<div class="container">
