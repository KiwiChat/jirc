<?php
/*
Plugin Name: JIRC
Plugin URI: https://github.com/kiwichat/jirc
Description: Allows you to embed a KiwiIRC IRC client with a shortcode.
Version: 1.0
Author URI: https://HatchetShack.com
License: GNU General Public License
*/
// https://hatchetshack.com/JIRC/?nick=Juggalo_49564&theme=elite#HatchetRadio 
function jirc_embed_func($atts) {
	extract(shortcode_atts(array(
		'width'		=> '100%',
		'height'	=> '550px',
		'channel'	=> '#HatchetRadio ',
		'theme'	    => 'elite'
        // themes: default, dark, coffee, grayfox, nightswatch, osprey, radioactive, sky, elite		
	), $atts));
		//User Nick
	if(!is_user_logged_in()) {
		$nick = __('Juggalo??', 'jirc');
	} else {
		global $current_user;
		get_currentuserinfo();
		$nick = $current_user->display_name;
	}
	return '<iframe style="width:'.$width.';height:'.$height.';border:0;" src="https://hatchetshack.com/JIRC/?nick='.$nick.'&theme='.$theme.''.$channel.'"></iframe>';
}
//shortcode: [jirc]
add_shortcode('jirc', 'jirc_embed_func');
?>
