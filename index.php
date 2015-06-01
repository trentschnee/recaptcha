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
				<small>by <a href="http://tribulant.com">Tribulant Software</a></small>
			</div>
		
			<div class="jumbotron">
				<h1>Test It Out</h1>
				<p class="lead">Test out <a href="http://www.google.com/recaptcha/" target="_blank">Google reCAPTCHA</a> with PHP by using the no captcha reCAPTCHA, then click "<strong>Verify Response</strong>" to see if it is correct.</p>
				
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
					<div class="center-block" style="width:300px; margin:20px auto;">
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
					<p><a href="https://github.com/TribulantSoftware/recaptcha/archive/master.zip">Download the ZIP</a> file with all the files from the <a href="https://github.com/TribulantSoftware/recaptcha">Github recaptcha repository</a>.</p>
					<p><a href="https://github.com/TribulantSoftware/recaptcha/archive/master.zip" class="btn btn-primary">Download</a></p>
		
					<h3>3. Copy Class Files</h3>
					<p>There is a main <code>class.recaptcha.php</code> file and then a <code>class.http.php</code> file. Copy both files over to where you want to use it.</p>
				</div>
		
				<div class="col-lg-6">
					<h3>2. Get reCAPTCHA Keys</h3>
					<p>Add your domain(s) to get a site- and secret key for Google reCAPTCHA.</p>
					<p><a href="http://www.google.com/recaptcha/" target="_blank" class="btn btn-info">Get reCAPTCHA Keys</a></p>
		
					<h3>4. Reference Example</h3>
					<p>The example file is <code>index.php</code> which shows you how to use the reCAPTCHA PHP class.</p>
				</div>
			</div>
			
			<div class="row marketing">
				<div class="col-md-12">
					<h2>PHP reCAPTCHA Example</h2>
					<p>Here is a quick example on how to use the class, it really is easy!</p>
					<!-- https://gist.github.com/tribulant/2c9c03c768ad80cafa92 -->
					<script src="https://gist.github.com/tribulant/2c9c03c768ad80cafa92.js"></script>
				</div>
			</div>
		
			<footer class="footer">
				<p>&copy; <a href="http://tribulant.com" title="Premium WordPress plugins">Tribulant Software</a> <?php echo date('Y'); ?></p>
				<p class="text-center">
					<a href="http://tribulant.com"><img src="http://tribulant.com/img/logo-grey.png" alt="tribulant" /></a>
				</p>
			</footer>
		</div> <!-- /container -->
    </body>
</html>

