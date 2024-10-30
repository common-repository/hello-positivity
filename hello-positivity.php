<?php

/*
Plugin Name: Hello Positivity
Description: Created for those of us who need a mental boost now and again.
Version: 1.0
Author: Adam Bradford
Author URI: https://www.adambradford.com
*/


function hello_positivity_get_quote() {
	/** These are some inspirational thoughts */
	$thoughts = "It is never too late to be what you might have been.
Think positive, and good things will happen.
Be the change that you wish to see in the world.
Great people are defined by how they recover when they fail.
At least two thirds of success is perseverence.
Live your life as an example to others.
Don't wait. The time will never be just right.
Face the sunshine, and shadows will be behind you.
You're never too old to set yourself a new goal.
Stay close to something that makes you glad to be alive.
Time flies, but you can be the pilot.
You can totally do this.
Fall seven times, stand up eight.
You are somebody’s reason to smile.
Believe you can do it, and you’re halfway there.
Breathe. It’s just a bad day, not a bad life.
If you feel like giving up, look back at how far you’ve come.
Don't read the next sentence. You rebel, I like you!
Be who you needed when you were young.
A smooth sea never made a skillful sailor.
Chop your own wood and it will warm you twice.
Inhale the future. Exhale the past.
If all you can do is crawl, start crawling.
Persistence can be a worthy substitute for raw talent.
Don't overvalue what you are not, or undervalue what you are.
Go the extra mile – it’s never crowded.
There is no innovation or creativity without failure.
Work until you no longer have to introduce yourself.
The only place where your dreams are impossible is in your own head,";

	// Here we split it into lines
	$thoughts = explode( "\n", $thoughts );

	// And then randomly choose a line
	return wptexturize( $thoughts[ mt_rand( 0, count( $thoughts ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_positivity() {
	$chosen = hello_positivity_get_quote();
	echo "<p id='positivity'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_positivity' );

// We need some CSS to position the line
function positivity_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#positivity {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;
		margin: 0;
		font-size: 12px;
	}
	</style>
	";
}

add_action( 'admin_head', 'positivity_css' );


