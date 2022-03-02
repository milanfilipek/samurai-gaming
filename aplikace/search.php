<?php
	require 'static/db_pripojeni.php';
	require 'static/html_top.php';
?>

	<link rel="stylesheet" href="styles/style.css" type="text/css">
		
	<title>Samurai Gaming - Vyhledávání</title>

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
				
				<h2>Vyhledávání pro "<?=$_GET["search"]?>"</h2>
				
				<?php
					if (isset($_GET["search"])) {				
						$dotaz = $db->query("
						SELECT TABLE_NAME as Tabulka
						FROM INFORMATION_SCHEMA.TABLES 
						WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA='samurai'");
						$tabulky = $dotaz->fetch_all(MYSQLI_ASSOC);
						$vyhledat = "%" . $_GET["search"] . "%";

						echo '<div class="vysledky">'; //dodelat div n shit

						$byloNalezeno = false;
						foreach($tabulky as $tabulka){
							$dotaz = $db->query("SHOW COLUMNS FROM " . $tabulka["Tabulka"]);
							$sloupce = array();
							while ($sloupec = $dotaz->fetch_assoc()) {
								if($sloupec["Field"] !== "obrazek" && $sloupec["Field"] !== "logo"){ // podminka pro vyhledavani veci mimo obrazky, loga a IDcka
									$sloupce[] = $sloupec["Field"];
								}
							}

							for($i=0;$i < count($sloupce);$i++) {
								$dotaz = $db->prepare("SELECT * FROM " . $tabulka["Tabulka"] . " WHERE ".$sloupce[$i]." LIKE ?");
								$dotaz->bind_param("s", $vyhledat);
								$dotaz->execute();
								$vysledek = $dotaz->get_result();
								$vysledek = $vysledek->fetch_all(MYSQLI_ASSOC);
								
								if(!empty($vysledek)){
									switch ($tabulka["Tabulka"]) {
										case 'hraci':
											$dotaz = $db->query("SELECT nazev FROM sekce WHERE IDs = ". $vysledek[0]["IDs"]);
											$sekce = $dotaz->fetch_all(MYSQLI_ASSOC);
											echo "<p>Byl nalezen výsledek na stránce <a href='teams.php?id={$vysledek[0]["IDs"]}'>Týmy - {$sekce[0]["nazev"]}</a></p>";
											break;
										case 'partneri':
											echo "<p>Byl nalezen výsledek na stránce <a href='partneri.php'>Partneři</a></p>";
											break;
										case 'kontakty':
											echo "<p>Byl nalezen výsledek na stránce <a href='contact.php'>Kontakty</a></p>";
											break;
										case 'uspechy':
											echo "<p>Byl nalezen výsledek na stránce <a href='uspechy.php'>Úspěchy</a></p>";
											break;
										case 'sekce':
											echo "<p>Byl nalezen výsledek na stránce <a href='teams.php'>Týmy</a></p>";
											break;
									}
									$byloNalezeno = true;
								}
							} 
						}
						if(!$byloNalezeno){
							echo '<p>Nebyl nalezen žádný výsledek na stránce pro "'.$_GET["search"].'"</p>';
						}
						echo "</div>";
					}	
				?>

				<?php
					require 'static/html_bottom.php';
				?>