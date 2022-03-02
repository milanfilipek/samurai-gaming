<?php
	require 'static/db_pripojeni.php';
	require 'static/html_top.php';
?>

		<link rel="stylesheet" href="styles/style.css" type="text/css">

		<title>Samurai Gaming - O nás</title>
		<style>
			.odkazy{
				margin-top: 30px;
				margin: 0 auto;
				width: 25%;
				text-decoration: none;
				margin-top:40px;
				font-size: 2.5vw;
				color: white;
			}
			.odkazy a{
				text-decoration: none;
				color: white;
				padding-top: 20px;
				padding-bottom: 20px;
			}
			.odkazy a:hover, i.fab:hover a{
				color: white;
				transform: scale(1.20);
				font-size: 2.8vw;
			}
			i.fab:hover{
				color: white;
			}
			i.fas, i.far, i.fab{
				padding-right: 10px;
			}
			@media only screen and (max-width: 1000px) {
				.odkazy{
					font-size: 4vw;
					width: 40%;
				}
				.odkazy a:hover, i.fab:hover a{
					color: white;
					transform: scale(1.20);
					font-size: 4.3vw;
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
				
				<h1>Na následujicích odkazech můžeš zjistit více o nás:</h1>
				
				<div class="odkazy">
					<p><a href="uspechy.php"><i class="fas fa-trophy"></i>Úspěchy</a></p>
					
					<p><a href="contact.php"><i class="fas fa-address-card"></i>Kontakt</a></p>

					<p><a href="aboutus.php"><i class="fas fa-tasks"></i>Management</a></p>
				</div>

				
				<div class="rok">
					<p>© 2021</p>
				</div>
				<footer>
					<a href="https://www.youtube.com/channel/UCriLh9Xv7SqUDTA1M2_SDeA/"><i class="fab fa-youtube fa-2x"></i></a>
				</footer>
			</div> 
		</div>
		
		<script>
			function openNav() {
				document.getElementById("sidenav").style.width = "100%";
			}

			function closeNav() {
				document.getElementById("sidenav").style.width = "0%";
			}
		</script>
		
	</body>
</html>