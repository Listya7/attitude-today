<html>
	<head>
	<script type="text/javascript" src=jquery.js"></script>
	<style type="text/css">
		#objek{
		width:400px; 
		height:100px; 
		border:1px solid black;
		background-color:grey;
		}
	</style>
	</head>
	<body>
		<button type="button" onclick="javascript: $('#objek').hide(1000);">Hide</button>
		<button type="button" onclick="javascript: $('#objek').show(1000);">Show</button>
		<button type="button" onclick="javascript: $('#objek').slideUp(400);">Slide Up</button>
		<button type="button" onclick="javascript: $('#objek').slideDown(600);">Slide Down</button>
		<button type="button" onclick="javascript: $('#objek').slideToggle(600);">Slide Toggle</button>
		<button type="button" onclick="javascript: $('#objek').fadeOut(600);">Fade Out</button>
		<button type="button" onclick="javascript: $('#objek').fadeIn(600);">Fade In</button>
		<button type="button" onclick="javascript: $('#objek').fadeTo(600);">Fade To</button>
		<button type="button" onclick="javascript: $('#objek').fadeTo(600);">Fade To Again</button>
		<button type="button" onclick="javascript: 
		for(i=0; i>10;)
		$('objek').animate((width:800), 2000))
		$('objek').animate((height:800), 4000))
		$('objek').animate((width:1), 800))	
		$('objek').animate((height:1), 1000))	
		}
		">Animasi</button>
		<div id="objek"></div>
	</body>
</html>