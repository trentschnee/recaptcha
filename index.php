<?php
	
require_once('class.recaptcha.php');

$sitekey = '6LdZYwUTAAAAACLFDb4zcgwCWo_1I-7SY2bATkuz';
$secretkey = '6LdZYwUTAAAAADlVlfV-zJ6xvSshB4vL3ezKNvtK';

$recaptcha = new ReCaptcha($sitekey, $secretkey);
	
?>

<!DOCTYPE html>
<html lang="en">
  	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	    <meta name="description" content="">
	    <meta name="author" content="">
	
	    <title>Google reCAPTCHA PHP Class</title>
	
	    <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
		
		<!-- Load jQuery -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
		
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	
	    <!-- Custom styles for this template -->
	    <link href="http://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css" rel="stylesheet">
	
	    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
  	</head>
  	<body>
		<div class="container">
			<div class="header clearfix">
				<nav>
					<ul class="nav nav-pills pull-right">
						<li role="presentation" class="active"><a href="/recaptcha/">Home</a></li>
						<li role="presentation"><a href="https://github.com/TribulantSoftware/recaptcha" target="_blank">Download</a></li>
					</ul>
				</nav>
				<h3 class="text-muted">Google reCAPTCHA PHP Class</h3>
			</div>
		
			<div class="jumbotron">
				<h1>Test It Out</h1>
				<p class="lead">Test out Google reCAPTCHA with PHP by using the no captcha reCAPTCHA, then click "Verify Response" to see if it is correct.</p>
				
				<?php
					
				if (!empty($_POST)) {
					if ($recaptcha -> verify()) {
						?><div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> Excellent, the Google reCAPTCHA verification works</div><?php
					} else {
						?>
						
						<div class="alert alert-danger">
							<span class="glyphicon glyphicon-exclamation-sign"></span> 
							The Google reCAPTCHA failed to verify, try again<br/>
							<?php echo implode(", ", $recaptcha -> errors); ?>
						</div>
						
						<?php
					}
				}	
					
				?>
				
				<form action="" method="post">
					<div style="margin:20px auto; width:300px;">
						<?php $recaptcha -> widget(); ?>
					</div>
					<p><input class="btn btn-lg btn-success" type="submit" name="submit" value="Verify Response" /></p>
				</form>
			</div>
		
			<div class="row marketing">
				<div class="col-md-12">
					<h2>Using the Google reCAPTCHA PHP Class</h2>
					
					<p>To start using the Google reCAPTCHA PHP class, follow these steps below.</p>
				</div>
				
				<div class="col-lg-6">
					<h3>1. Download the ZIP</h3>
					<p>Download the ZIP file with all the files from the Github recaptcha repository.</p>
		
					<h4>Subheading</h4>
					<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>
		
					<h4>Subheading</h4>
					<p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
				</div>
		
				<div class="col-lg-6">
					<h4>Subheading</h4>
					<p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
		
					<h4>Subheading</h4>
					<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>
		
					<h4>Subheading</h4>
					<p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
				</div>
			</div>
		
			<footer class="footer">
				<p>&copy; <a href="http://tribulant.com" title="Premium WordPress plugins">Tribulant Software</a> <?php echo date('Y'); ?></p>
			</footer>
		</div> <!-- /container -->
    </body>
</html>

