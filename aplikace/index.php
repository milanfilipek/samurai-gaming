<?php
	require 'static/db_pripojeni.php';
	require 'static/html_top.php';
?>

	<link rel="stylesheet" href="styles/style.css" type="text/css">
		
	<title>Samurai Gaming - Domů</title>

	<script>
		function openNav() {
			document.getElementById("sidenav").style.width = "100%";
		}

		function closeNav() {
			document.getElementById("sidenav").style.width = "0%";
		}
	</script>
	<style>
		.sponzori a{
			width: 15%;
		}
		@media only screen and (max-width: 1000px) {
			.sponzori a{
				width: 20%;
			}
			.sponzori img{
				width: 110%;
			}
		}
	</style>
</head>
	<body>
		<div class="pagebg">
			<div class="textura">
				<?php 
					require "static/navigace.php";
				?>
				
				<div class="vitej">
					<p>Vítejte na stránce týmu Samurai Gaming.</p>
					<img src="images/sg.png">
				</div>
				
				<?php
					require 'static/html_bottom.php';
				?>