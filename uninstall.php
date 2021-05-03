<?php

// SSI.php! Where are you? 
if (file_exists(dirname(__FILE__) . '/SSI.php') && !defined('SMF')) 
	require_once(dirname(__FILE__) . '/SSI.php');
elseif (!defined('SMF'))
	exit('<b>Error:</b> Cannot uninstall - please verify you put this in the same place as SMF\'s index.php.');
	
// Integration hooks!
$hooks = array(
	'integrate_bbc_codes' => 'blink_bbc_add_code',
	'integrate_bbc_buttons' => 'blink_bbc_add_button',
	'integrate_pre_include' => '$sourcedir/Subs-blinkBBC.php',
);

foreach ($hooks as $hook => $function)
	remove_integration_function($hook, $function); 
	
// If we're using SSI, tell them we're done
if(SMF == 'SSI')
	echo 'Database changes are complete!'; 

?>
