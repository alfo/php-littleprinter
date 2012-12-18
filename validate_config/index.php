<?php

	// This endpoint is used to check the user's info when subscribing to your publication
	// You don't need to change anything on this page
	// It is automatically generated from all the fields you defined in config.php

	require_once("../framework.php"); // Include the framework
	require_once("../config.php"); // Include the framework

	if (!isset($_POST['config'])) die("No POST found.");

	$post = json_decode($_POST['config'], true);

	if (!empty($post)) {

		if (isset($config['config']) && !empty($config['config'])) {

			foreach($config['config'] as $input) {

				switch ($input['type']) {
					case 'text':
						
						if (!isset($post[$input['name']])) $errors[] = array(1, $input['name']);

						if (isset($input['regex'])) {
							if (!preg_match($input['regex'], $post[$input['name']])) $errors[] = array(3, $input['name']);
						}

						if (isset($input['maxlength'])) {
							$length = strlen($post[$input['name']]);
							if ($input['maxlength'] > $length) $errors[] = array(4, $input['name'], $input['maxlength']);
						}

						if (isset($input['minlength'])) {
							$length = strlen($post[$input['name']]);
							if ($length > $input['minlength']) $errors[] = array(5, $input['name'], $input['minlength']);
						}


						break;
					
					case 'radio':

						if (!isset($post[$input['name']])) $errors[] = array(1, $input['name']);

						break;

					case 'select':

						$matched = false;

						foreach ($input['options'] as $label => $name) {
							
							if ($post[$input['name']] == $name) $matched = true;

						}

						if ($matched == false) $errors[] = array(2, $input['name']);

						break;

					case 'checkbox':

						if (!isset($post[$input['name']])) $errors[] = array(1, $input['name']);

						break;

					default:
						frameworkError(2, "Input name: ".$input['name']);
						break;
				}

			}

			if (!empty($errors)) validateBad($errors);
			else validateGood();

		} else echo 'Not needed';

	} else echo 'No config passed';

?>