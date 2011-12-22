<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dattwood
 * Date: 16/05/11
 * Time: 14:08
 * To change this template use File | Settings | File Templates.
 */
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>ModalPop. JQuery Modal Pop Up Plugin. Owain Lewis</title>

<!--JQuery -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src='modalpop.js'></script>

<link rel="stylesheet" href="css/style.css" type="text/css" />

<script>
$(document).ready(function(){
	$('.modal').modalpop({speed:700});
});
</script>


</head>
<body>

<div id='container'>

<header>
	<hgroup>
		<h1>ModalPop</h1>
		<h2>A lightweight jQuery modal window. Validates in HTML5. </h2>
	</hgroup>

</header>

<p><a href='http://www.owainlewis.com/blog/'>BACK TO TUTORIAL</a> | <a href='http://www.owainlewis.com/downloads/jqmodal.zip'>DOWNLOAD</a></p>

<article>
<header>
	<h1>Video Item</h1>
</header>
<p><a href='#window2' class='modal'>Modal Link</a></p>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with software like Aldus PageMaker including versions of Lorem Ipsum.</p>

</article>

<article>
<header>
	<h1>HTML5 Item</h1>
</header>
<p><a href='#window1' class='modal'>Modal Link</a></p>
<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with <a href='#window1' class='modal'>Modal Link</a> software like Aldus PageMaker including versions of Lorem Ipsum.</p>
</article>

<section>
<p>There are only a few options for this plugin. The idea is to provide a really lightweight and flexible modal window that can be styled predominantly via CSS. The following options are available.</p>
<p><strong>Speed</strong> (The transition speed for fade in and out)</p>
<p><strong>Center</strong> (Position in center or just off top. True or False)</p>



</section>

</div>

<!-- Put your hidden content in here -->
<div id='window1' class='window'>
<a href='' class='close'><img src='img/close.png' alt='close icon' /></a>
<h1>Modal window</h1>
<p>This is a simple modal window</p>
<figure>
	<img src='img/2.jpg' alt='' />
</figure>
</div>
<!-- End modal window -->

<!-- Put your hidden content in here -->
<div id='window2' class='window'>

	<a href='' class='close'><img src='img/close.png' alt='close icon' /></a>
	<h1>Video Content</h1>
	<p>Video Item. Music by Autechre.</p>
<object width="425" height="350" type="application/x-shockwave-flash" data="https://vshare.midkent.ac.uk/player/player.swf"><param name="movie" value="https://vshare.midkent.ac.uk/player/player.swf"><param name="flashvars" value="&file=https://vshare.midkent.ac.uk/xml_playlist.php?id=136&height=350&image=https://vshare.midkent.ac.uk/thumb/4ca4238a0b/136.jpg&width=425&location=https://vshare.midkent.ac.uk/player/player.swf&logo=https://vshare.midkent.ac.uk/templates/images/watermark.gif&link=http://s-moodle.midkent.ac.uk&linktarget=_blank"/></object></div>
<!-- End modal window -->

</body>
</html>