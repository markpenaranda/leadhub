<!DOCTYPE html>
<html class="<?php print $class; ?>">
	
<head>
	<title><?php print $title; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<?php if(isset($meta) && is_array($meta)) : ?>
	<?php foreach($meta as $name => $content) : ?>
	<meta name="<?php print $name; ?>" content="<?php print $content; ?>" />
	<?php endforeach; ?>
	<?php endif; ?>

	<link rel="stylesheet" type="text/css" href="/assets/styles/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="/assets/styles/responsive.css" />
	<link rel="stylesheet" type="text/css" href="/assets/styles/font-awesome.css" />
	<link rel="stylesheet" type="text/css" href="/assets/styles/datepicker.css" />
	<link rel="stylesheet" type="text/css" href="/assets/styles/jasny-bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="/assets/styles/jasny-bootstrap-responsive.css" />
	
	<!--[if IE 7]>
	<link rel="stylesheet" href="/assets/styles/font-awesome-ie7.min.css">
	<![endif]-->    
	<link rel="shortcut icon" href="/assets/images/favicon.ico" />

	<script type="text/javascript" src="/assets/scripts/jquery.js"></script>
	<script type="text/javascript" src="/assets/scripts/bootstrap.js"></script>
	<script type="text/javascript" src="/assets/scripts/jasny-bootstrap.js"></script>
	<script type="text/javascript" src="/assets/scripts/datepicker.js"></script>
	<script type="text/javascript" src="/assets/scripts/bootstrap-datepicker.js"></script>
</head>
<style type="text/css">
	body {
		font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
		font-size: 13px;
	}
</style>
<body>
	<div class="page">
        <div class="head"><?php echo $head; ?></div>
	<div class="body"><?php echo $body; ?></div>
	<div class="foot"><?php echo $foot; ?></div>
    </div>
</body>
</html>
