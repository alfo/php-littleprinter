<?php


	// This is the function file used by the framework.
	// Place your functions in the functions.php file, which is included on every page.
	// That's where you should put the functions used in the /edition/ and /sample/ pages.

	function frameworkError($type, $specifics) {

		switch ($type) {
			case 1:
				$error = 'Problem in your config.php file.';
				break;
			
			case 2:
				$error = 'Invalid type of field in config.php.';

		}

		die("Framework Error: " . $error . " " . $specifics);

	}

	function validateBad($errors) {
		foreach($errors as $key => $error) {
			switch ($error[0]) {
				case 1:
					$errors[$key][0] = 'Field left empty:';
					break;
				
				case 2:
					$errors[$key][0] = 'Invaid Option:';
					break;

				case 3:
					$errors[$key][0] = 'Text Field failed regex:';
					break;

				case 4:
					$errors[$key][0] = 'Input text too short. Should be '.$errors[$key][2].' characters or longer.:';
					unset($errors[$key][2]);
					break;

				case 5:
					$errors[$key][0] = 'Input text too long. Should be '.$errors[$key][2].' characters or shorter.:';
					unset($errors[$key][2]);
					break;
			}
		}

		header("Content-Type: application/json");
		$return = array('valid' => 'false', 'errors' => $errors);
		die(json_encode($return));
	}

	function validateGood() {
		header("Content-Type: application/json");
		$return = array('valid' => 'true');
		die(json_encode($return));
	}

	function eTag($type) {
		switch ($type) {
			case 1:
				$date = date("z");
				break;
			
			case 2:
				$date = date("W");
				break;

			case 3:
				$date = date("m");
				break;

			case 4:
				$date = time();
				break;
		}

		$md5 = md5($date);

		header("ETag: ".$md5);
	}

	function charset() {
		header("Content-Type: text/html; charset=utf-8");
	}

	function makeSample($params) {

		$_GET = $params;

		include '../edition/index.php';
		
	}

	function makeHeader() {

		$params = func_get_args();
		require_once("../header.php");

	}

	function makeFooter() {

		$params = func_get_args();
		require_once("../footer.php");

	}

	/*

	function setTimezone($iso) {
		//2012-12-11T13:37:13+00:00
		
		$iso = substr($iso, 19);

		$original = new DateTime("now");
		$timezoneName = timezone_name_from_abbr("", 3*3600, false);
		$modified = $original->setTimezone(new DateTimezone($timezoneName));
	}

	*/
