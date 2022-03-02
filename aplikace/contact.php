<?php
	require 'static/db_pripojeni.php';
	require 'static/html_top.php';
?>

		<link rel="stylesheet" href="styles/style.css" type="text/css">
		<link rel="shortcut icon" href="favicon.ico">
		
		<title>Samurai Gaming - Kontakty</title>
		
		<style>
			.kontakty{
				margin: 0 auto;
				width: 50%;
				text-decoration: none;
				margin-top: 50px;
				font-size: 1.5vw;
				color: white;
				text-align: center;
			}
			.kontakty a{
				text-decoration: none;
				color: white;
			}
			.kontakty a:hover, i.fab:hover p{
				color: white;
				transform: scale(1.20);
				font-size: 2vw;
			}
			i.fab:hover{
				color: white;
			}
			i.fas, i.far, i.fab{
				padding-right: 10px;
			}
		</style>
	</head>

	<body>
		<div class="pagebg">
			<div class="textura">
				<?php
					require 'static/navigace.php';
				?>
				
				<h1>Kontakty na nás</h1>
				
				<div class="kontakty">
					<?php
						$dotaz = $db->prepare("SELECT * FROM kontakty");
						$dotaz->execute(); 
						$vysledek = $dotaz->get_result();
						$kontakty = $vysledek->fetch_all(MYSQLI_ASSOC);

						foreach ($kontakty as $kontakt) {
							if(strpos($kontakt["odkaz"], 'https://') !== false){
								$jmeno = str_replace("https://", " ", $kontakt["odkaz"]);
								echo '<p><a href="' . $kontakt["odkaz"] . '"><i class="'.$kontakt["fa"] . '"></i>' . $jmeno . '</a></p>';
							}
							else{
								echo "<p><i class='{$kontakt["fa"]}'></i>{$kontakt["odkaz"]}</p>";
							}
						}

					?>
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