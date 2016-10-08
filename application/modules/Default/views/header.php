<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		<link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logo.png">
		<title><?php echo $title; ?></title>
		<!-- Loading third party fonts -->
		<link href="<?php echo base_url();?>assets/fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url();?>assets/fonts/novecento-font/novecento-font.css" rel="stylesheet" type="text/css">
		<!-- Loading main css file -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/style.css">

		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

	</head>


	<body class="<?php if(!empty($homepageheader)){echo $homepageheader;}; ?>">

		<div id="site-content">

			<header class="site-header">
				<div class="container">
					<a id="branding" href="<?php echo base_url();?>">
						<img src="<?php echo base_url();?>assets/images/logo.png" alt="Company name" class="logo">
						<div class="logo-copy">
							<h1 class="site-title">ClickNStyle</h1>
							<small class="site-description">Awesome Website for Awesome Customer</small>
						</div>
					</a> <!-- #branding -->


					<!-- Default snippet for navigation -->
					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item current-menu-item"><a href="<?php echo base_url();?>">Home</a></li>
							<li class="menu-item"><a href="<?php echo base_url()?>Web/about">About</a></li>
							<li class="menu-item"><a href="<?php echo base_url()?>Web/services">Services</a></li>
							<li class="menu-item"><a href="<?php echo base_url()?>Web/gallery">Gallery</a></li>
							<li class="menu-item"><a href="<?php echo base_url()?>Web/contact">Contact</a></li>
						</ul> <!-- .menu -->
					</div> <!-- .main-navigation -->

					<div class="mobile-navigation"></div>
				</div>
			</header>
