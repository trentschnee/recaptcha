<?php
	
/*
Google reCAPTCHA class for PHP
Author: Tribulant Software
Author URL: http://tribulant.com
Version: 1.0	
*/
	
if (!class_exists('ReCaptcha')) {
	class ReCaptcha {
		
		var $sitekey = '';
		var $secretkey = '';
		var $theme = 'light';
		var $language = 'en';
		var $api_url = 'https://www.google.com/recaptcha/api/siteverify';
		var $secret = '';
		var $errors = array();
		var $httpclasspath = './';
		
		function ReCaptcha($sitekey = null, $secretkey = null) {
			$this -> sitekey = $sitekey;
			$this -> secretkey = $secretkey;
		}
		
		function widget() {			
			?>
			
			<div class="g-recaptcha" data-sitekey="<?php echo $this -> sitekey; ?>" data-theme="<?php echo $this -> theme; ?>" data-tabindex=""></div>
            <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=<?php echo $this -> language; ?>"></script>
			
			<?php
		}
		
		function verify($response = null, $ip_address = null) {
			global $Html;
			
			$ip_address = (empty($ip_address)) ? $_SERVER['REMOTE_ADDR'] : $ip_address;
			$response = (empty($response)) ? $_POST['g-recaptcha-response'] : $response;
			
			require_once($this -> httpclasspath . 'class.http.php');
			
			$http = new http_class();
			$http -> timeout = 0;
			$http -> data_timeout = 0;
			$http -> debug = 0;
			$http -> html_debug = 1;
			
			$args = array(
				'secret'			=>	$this -> secretkey,
				'response'			=>	$response,
				'remoteip'			=>	$ip_address,
			);
			
			$error = $http -> GetRequestArguments($this -> api_url, $arguments);
			
			if (empty($error)) {
				$arguments['RequestMethod'] = "POST";
				$arguments['PostValues'] = $args;
				
				$error = $http -> Open($arguments);
				
				if (empty($error)) {
					$error = $http -> SendRequest($arguments);
					
					if (empty($error)) {
						$headers = array();
						$error = $http -> ReadReplyHeaders($headers);
						
						if (empty($error)) {
							$error = $http -> ReadReplyBody($body, 1024);
							
							if (empty($error)) {
								$body = json_decode($body);
								
								if (!empty($body -> success) && $body -> success == true) {
									return true;
								} else {
									if (!empty($body -> {'error-codes'})) {
										foreach ($body -> {'error-codes'} as $error_code) {
											$this -> errors[] = $this -> error_message($error_code);
										}
									}
								}
							}
						}
					}
				}
			}
			
			if (!empty($error)) {
				$this -> errors[] = $error;
			}
			
			$http -> Close();			
			return false;
		}
		
		function error_message($error_code = null) {
			$error_message = $error_code;
			
			if (!empty($error_code)) {
				$error_codes = array(
					'missing-input-secret'		=>	"Missing secret key",
					'invalid-input-secret'		=>	"Secret key invalid",
					'missing-input-response'	=>	"Missing response",
					'invalid-input-response'	=>	"Invalid response",
				);
				
				if (!empty($error_codes[$error_code])) {
					$error_message = $error_codes[$error_code];
				}
			}
			
			return $error_message;
		}
	}
}	
	
?>