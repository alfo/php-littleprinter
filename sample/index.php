<?php

	// This is the page that generates the sample.

	// The only thing you need to change on this page:
	// Set these to be the options you defined in config.php

	$params = array('test_select' => 'option_two', 'test_text' => 'email@example.com');

	// You don't need to change anything after this line

	require_once("../framework.php"); // Include the framework
	require_once("../config.php"); // Include the framework

	makeSample($params);

?>