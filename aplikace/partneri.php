<?php
	require 'static/db_pripojeni.php';
	require 'static/html_top.php';

	$dotaz = "
	SELECT *
	FROM partneri
	";
	  
 	$partneri = mysqli_query($db, $dotaz);
	$partneri = mysqli_fetch_all($partneri, MYSQLI_ASSOC);
?>
		<link rel="stylesheet" href="styles/style.css" type="text/css">
		
		<title>Samurai Gaming - Partneři</title>
		
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
			
			.partners{
				display: flex;
				margin: 0 auto;
				width: 85%;
				justify-content: center;
			}
			
			.partner_logo{
				width: 20%;
				padding-right: 15px;
			}
			
			.partner_text{
				color: white;
				font-size: 1.2vw;
				margin-top: 10px;
			}
			.partner_text p{
				margin: 0;
			}
			@media only screen and (max-width: 1000px) {			  
			nav ul li a{
				display:none;
			}
			
			.tlacitko{
				display: block;
				margin: 0;
				padding: 0;
				position: absolute;
				top: 0;
				right: 10%;
				line-height: 70px;
			}	
			
			.partner_text{
				font-size: 1.75vw;
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
				
				<h1>PARTNEŘI</h1>
				
				<div class="partners">
					<?php
						foreach ($partneri as $partner) {
							echo "<div class='partner_logo'>";
								echo "<a href='{$partner["odkaz"]}'><img src='{$partner["logo"]}' style='width:100%;'></a>";
							echo "</div>";
						}
					?>
				</div>

				<div class="rok">
					<p>© 2021</p>
				</div>
			</div> 
		</div>		
	</body>
</html>