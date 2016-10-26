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
		<link href="<?php echo base_url();?>assets/css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/css/fullcalendar/fullcalendar.print.css" rel="stylesheet" type="text/css" media='print' />
		<!-- Loading main css file -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/style.css">
		<style>
			.fc-header-title>h2{
				color:#000;
			}
		</style>


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
