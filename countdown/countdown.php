<?php

/*
Plugin Name: Countdown Timer
Plugin URI: http://uly.me
Description: A countdown timer
Version: 1.2
Author: Ulysses Ronquillo
Author URI: http://uly.me
*/

/*

Countdown is a WordPress plugin that displays a countdown timer.
Javascript is written by Robert Hashemian. The WordPress code is mine.

Usage:

Place the code above inside your WordPress post or page.
[countdown event="Sunday 10:00am"]

For templates, use this code:
echo do_shortcode('[countdown event="Saturday 11am"]');

*/ 

// Add Javascript to header which in turn loads another called countdown.js

function show_countdown_timer($atts) {
	extract( shortcode_atts( array('event' => 'August 29, 2016 4:15pm'), $atts ) );

	// set default timezone
	date_default_timezone_set('America/Los_Angeles');
	
	// reformat event
	$t = strtotime($event);
	
	// use this date format
	$ct = date('m/d/Y g:i A O', $t);

	// show javascript in header. runs countdown.js.
	return '
	<p>
	<script language="JavaScript">
	TargetDate = "'. $ct .'";
	BackColor = "";
	ForeColor = "";
	CountActive = true;
	CountStepper = -1;
	LeadingZero = false;
	DisplayFormat = "Next live stream in: %%D%% Days, %%H%% Hours, %%M%% Minutes, %%S%% Seconds.";
	FinishMessage = "";
	</script>
	<script language="JavaScript" src="'. plugins_url( 'countdown.js' , __FILE__ ) . '"></script>
	</p>';
}
add_shortcode('countdown', 'show_countdown_timer');


/* end of countdown.php */