<?php
	require 'static/db_pripojeni.php';
	require 'static/html_top.php';
?>

		<link rel="stylesheet" href="styles/style.css" type="text/css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
		<script type="text/javascript">						// vyplneni pole pro umisteni barvou v modalnim okne - pouze pokud se umistil na 1., 2. nebo 3. miste
			$(document).ready(function(){
				$('#umisteni td.misto').each(function(){
					if ($(this).text() == '1. místo') {
						$(this).css('background-color','gold');
					}
					if ($(this).text() == '2. místo') {
						$(this).css('background-color','silver');
					}
					if ($(this).text() == '3. místo') {
						$(this).css('background-color','#cd7f32');
					}
				});
			});
		</script>

		<title>Samurai Gaming - Týmy</title>
		<style>
		.sekce {
			display: flex;
			justify-content: center;
			z-index: 1;
		}
		.sloupec{
			border: 3px solid red;
			padding: 15px;
			z-index: 1;
		}	
		.sloupec img {
			margin-left: auto;
			margin-right: auto;
			display: block;
			outline: none;
		}
		.sponzori a{
			width: 15%;
		}
		.sloupec:hover{
			background-image: url("sekce/hover.png");
			background-position: center;
			background-repeat: no-repeat;
			background-color:red;
		}
		.sloupec:hover > a > img {
			visibility: hidden;
		}

		@media screen and (max-width: 700px) {
			.sekce {
				display: block;
				width: 100%;
			}
			html, body{
				height: 100vh;
			}
		}
		</style>
	</head>
	<body>
		<div class="pagebg">
			<div class="textura">
				<?php 
					require "static/navigace.php";

					if(empty($_GET["id"])){
				?>
					
				<h1>Naše stávající sekce</h1>
				
				<?php
					$i = 0;
					
					echo '<div class="sekce">';
					foreach($sekceArr as $sekce){
						if($i%2 != 0){
							echo '<div class="sloupec">
								<a href="teams.php?id='.$sekce["IDs"].'"><img src="'.$sekce["obrazek"].'" alt="'.$sekce["nazev"].'"></a>
							</div>';
						}
						else{
							echo '</div>
							<div class="sekce">
								<div class="sloupec">
									<a href="teams.php?id='.$sekce["IDs"].'"><img src="'.$sekce["obrazek"].'" alt="'.$sekce["nazev"].'"></a>
								</div>';
						}
						$i++;
					}
					echo '</div>';	
				} 
				else{
					$dotaz = $db->prepare("SELECT * FROM hraci WHERE IDs = ?");
					$dotaz->bind_param("i", $_GET["id"]);
					$dotaz->execute();
					$vysledek = $dotaz->get_result();
					$hraci = array();
					$hraci = $vysledek->fetch_all(MYSQLI_ASSOC);

					$dotaz = $db->prepare("SELECT nazev FROM sekce WHERE IDs = ?");
					$dotaz->bind_param("i", $_GET["id"]);
					$dotaz->execute();
					$vysledek = $dotaz->get_result();
					$sekce = $vysledek->fetch_assoc();

					$dotaz = $db->prepare("SELECT * FROM uspechy WHERE IDs = ?");
					$dotaz->bind_param("i", $_GET["id"]);
					$dotaz->execute();
					$vysledek = $dotaz->get_result();
					$uspechy = array();
					$uspechy = $vysledek->fetch_all(MYSQLI_ASSOC);

					echo "<h1>{$sekce["nazev"]} - Hráči</h1>";
					echo "<div class='center'>";	
						foreach ($hraci as $hrac) {
							echo "<div class='hraci'>";
								echo "<img id='img_hrac' class='img_hrac' src='{$hrac["obrazek"]}'>";	
								echo "<div class='text-block'>";
									echo "<h4>{$hrac["prezdivka"]}</h4>";
									echo "<p>{$hrac["jmeno"]} {$hrac["prijmeni"]}</p>";
								echo "</div>";
							echo "</div>";
						}
					echo "</div>";
					
					foreach($hraci as $hrac){						
						$vek = intval(date('Y', time() - strtotime($hrac["dat_nar"]))) - 1970; // vypocet veku hrace pro pouziti v modalnim okne

						if(strpos($hrac["obrazek"], 'placeholder') == false){
							$obrazek = str_replace("sg_","",$hrac["obrazek"]);
						}
						else {
							$obrazek = $hrac["obrazek"];
						}

						echo "<div id='modal' class='modal'>";
						echo "<div class='modal-content'>";
							echo "<div class='modal-header'>";
								echo "<span class='close'>×</span>";
								echo "<h2>{$hrac["prezdivka"]}</h2>";
							echo "</div>";
							echo "<div class='modal-body'>";
								echo "<div class='modal-body-text'>";
									echo "<h2>Celé jméno:</h2>";
									echo "<p>{$hrac["jmeno"]} {$hrac["prijmeni"]}</p>";
									echo "<h2>Sekce:</h2>";	
									echo "<p>{$sekce["nazev"]}</p>";
									echo "<h2>Věk:</h2>";
									echo "<p>{$vek}</p>";
									echo "<h2>Národ:</h2>";
									echo "<p>{$hrac["narod"]}</p>";
									echo "<h2>Role:</h2>";
									echo "<p>{$hrac["role"]}</p>";
								echo "</div>";	
									echo "<div class='modal-body-img'>";
										echo "<img src='{$obrazek}'>";
									echo "</div>";
							echo "</div>";
							echo "<div class='modal-footer'>";
								echo "<h3>Ocenění hráče:</h3>";
								echo "<table id='umisteni'>";
									foreach($uspechy as $uspech){
										echo "<tr>";
											echo "<td class='misto'>{$uspech["umisteni"]}</td>";
											echo "<td>{$uspech["nazev"]}</td>";
										echo "</tr>";
									}
								echo "</table>";
							echo "</div>";
						echo "</div>";
					echo "</div>";
					}
				}
				?>
			</div> 
		</div>

		<div class="rok">
			<p>© 2021</p>
		</div>

		<footer>
			<a href="https://www.youtube.com/channel/UCriLh9Xv7SqUDTA1M2_SDeA/"><i class="fab fa-youtube fa-2x"></i></a>
		</footer>	

		<script type="text/javascript">
				function openNav() {
					document.getElementById("sidenav").style.width = "100%";
				}

				function closeNav() {
					document.getElementById("sidenav").style.width = "0%";
				}

				var modal = document.getElementsByClassName("modal");
				var img = document.getElementsByClassName("img_hrac");
				var span = document.getElementsByClassName("close");
				
				for(i=0; i< img.length; i++){
					img[i].onclick = (function(i) { return function(){
						modal[i].style.display = "block";
					};})(i);
					span[i].onclick = (function(i) { return function(){
						modal[i].style.display = "none";
					};})(i);
				}
		</script>

	</body>
</html>