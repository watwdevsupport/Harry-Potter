<?php
/**
 * @package Harry_Potter
 * @version 1.5.1
 */
/*
Plugin Name: Harry Potter
Plugin URI: http://wordpress.org/#
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words wrote most famously by J. K. Rowling: Harry Potter. When activated you will randomly see a qoute from <cite>Harry Potter</cite> in the upper right of your admin screen on every page.
Author: Billy Leach
Version: 1.5.1
Author URI: http://watwdevsupport.netau.net
*/

function harry_potter_get_lines() {
		$lines = '"The Weapon We Have is Love" ~Dumbledore
    "To the well-organized mind, death is but the next great adventure" ~Dumbledore
    "It does not do to dwell on dreams and forget to live." ~Dumbledore
    "The truth is a beautiful and terrible thing, and should therefore be treated with caution." ~Dumbledore
    "It takes a great deal of bravery to stand up to our enemies, but a great deal more to stand up to our friends." ~Dumbledore
    "Ah, music. A magic beyond all we do here!" ~Dumbledore
    "There is no good or evil: only power and those too weak to seek it" ~Quirrell
    "Fear of a name only increases fear of the thing itself." ~Dumbledore
    "It is our choices...that show what we truly are, far more than our abilities." ~Dumbledore
    "Happiness can be found, even in the darkest of times, if one only remembers to turn on the light." ~Dumbledore
    "In dreams, we enter a world thats entirely our own." ~Dumbledore
    "Hearing voices no one else can hear isn&#39;t a good sign, even in the wizarding world." ~Ron Weasley
    "Curiosity is not a sin.... But we should exercise caution with our curiosity...yes, indeed." ~Dumbledore
    "It is my belief... that the truth is generally preferable to lies." ~Dumbledore
    "Never trust anything that can think for itself if you can&#39;t see where it keeps it&#39;s brain." ~Arthur Weasley
    "Differences of habit and language are nothing at all if our aims are identical and our hearts are open." ~Dumbledore
    "If you&#39;re holding out for universal popularity, I&#39;m afraid you will be in this cabin for a very long time." ~Dumbledore
    "People find it far easier to forgive others for being wrong than being right." ~Dumbledore
    "What&#39;s comin will come and well meet it when it does." ~Hagrid
    "You sort of start thinking anythings possible if you&#39;ve got enough nerve." ~Ginny Weasley
    "The dementors affect you worse than the others because there are horrors in your past that others don&#39;t have." ~Remus Lupin
    "If you want to know what a mans like, take a good look at how he treats his inferiors, not his equals." ~Sirus Black
    "No, I think I&#39;ll just go down and have some pudding and wait for it all to turn up...It always does in the end." ~Luna Lovegood
    "Nothing like a nighttime stroll to give you ideas." ~Mad-Eye Moody
    "His name is Voldemort, you might as well use it, he&#39;s gonna try and kill you either way." ~McGonagall';
	// Here we split it into lines
	$lines = explode("\n", $lines);

	// And then randomly choose a line
	return wptexturize( $lines[ mt_rand(0, count($lines) - 1) ] );
}

// This just echoes the chosen line, we'll position it later
function harry_potter() {
	$chosen = harry_potter_get_lines();
	echo "<p id='potter'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action('admin_notices', 'harry_potter');

// We need some CSS to position the paragraph
function potter_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#potter {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}


add_action('admin_head', 'potter_css');

?>