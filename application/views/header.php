<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $site_name." - ".$site_title;?></title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/images/'.$site_favicon);?>">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/jasny-bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/scrolling-nav.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/animate.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/styles.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.standalone.min.css') ?>" rel="stylesheet">

    <script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')  ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js')  ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jasny-bootstrap.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.easing.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/scrolling-nav.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/plugins/newsticker/jquery.bootstrap.newsbox.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/wow.min.js')  ?>"></script>
	<style>
		#map {
			margin: auto;
			border: 1px solid #2c3e50;
		}

		ul#gulung
		{
				padding:0px;
				margin:0px;
				list-style:none;
		}
		#gulung .news-item
		{
				padding:1px 1px;
				margin:0px;
		}
		.news-item p{font-size:1.125rem;padding:10px 0px}

	</style>
</head>