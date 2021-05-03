<?php

if (!defined('SMF'))
	die('Hacking attempt...');

//=================================================================================
// BBCode Hook functions
//=================================================================================

function blink_bbc_add_code(&$codes)
{
	global $context, $txt;

	// Add necessary headers and stuff for forum validation
	$context['html_headers'] .= '
	<style type="text/css">.blinkme {
animation-name: blinker;
animation-duration: 2s;
animation-timing-function: linear;
animation-iteration-count: infinite;
}
@keyframes blinker {
0%{ opacity: 1.0 }
50%{ opacity: 0.0 }
100%{ opacity: 1.0 }
}
</style>';
	
	loadLanguage('blinkBBC');

	$codes[] = array(
                                'tag' => 'blink',
				'before' => '<span style="animation-duration: 2s;" class="blinkme">',
                                'after' => '</span>',
                        );

	// Syntax: [blink=n][/blink]
	$codes[] = array(
                                'tag' => 'blink',
                                'type' => 'unparsed_equals',
                                'before' => '<span style="animation-duration: $1s;" class="blinkme">',
                                'after' => '</span>',
                        );

}

function blink_bbc_add_button(&$buttons)
{
	global $txt;

	loadLanguage('blinkBBC');

	$temp[] = array(
		'image' => 'blink',
		'code' => 'blink',
		'before' => '[blink]',
		'after' => '[/blink]',
		'description' => $txt['blink'],
	);
	array_splice($buttons[0], 4, 0, $temp );
	unset ($temp);
}

?>
