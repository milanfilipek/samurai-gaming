<?php
	require 'static/db_pripojeni.php';
	require 'static/html_top.php';  
?>

	<link rel="stylesheet" href="styles/style.css" type="text/css">
		
	<title>Samurai Gaming - Editace</title>

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

		.hl_nav{
			width: 95%;
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
					require "static/navigaceCRUD.php";

				?>
				
				<h2>Editace záznamu</h2>
					<?php
						if (!empty($_GET["id"]) && !empty($_GET["obj"])){
							$tabulka = $_GET["obj"];
							$id = $_GET["id"];

							$dotaz = $db->prepare("SHOW COLUMNS FROM `" . $tabulka . "`");
							$dotaz->execute(); 
							$vysledek= $dotaz->get_result();
							$sloupce = array();
							foreach($vysledek as $sloupec) {
								$sloupce[]=$sloupec;
							}												// získaní všech informaci o sloupcich v tabulce

							$nazvy_sloupcu = array();						// kod pro ulozeni pouze nazvu sloupcu dane tabulky
							foreach ($sloupce as $sloupec) {
								$nazvy_sloupcu[]=$sloupec["Field"];
							}

							$dotaz = "
							SELECT *
							FROM {$tabulka}
							WHERE {$nazvy_sloupcu[0]} = {$id}  
							";
							$hodnoty = mysqli_query($db, $dotaz);
							$hodnoty = mysqli_fetch_assoc($hodnoty);
							
							
							if (!empty($_POST[$nazvy_sloupcu[0]])){
								$dotaz = "
									UPDATE {$tabulka}
									SET 
									";
								
								for ($i=1; $i < count($nazvy_sloupcu); $i++) {
									if($i != count($nazvy_sloupcu)-1){
										$pridejStr = $nazvy_sloupcu[$i] . " = " . "'{$_POST[$nazvy_sloupcu[$i]]}',";
									}
									else{
										$pridejStr = $nazvy_sloupcu[$i] . " = " . "'{$_POST[$nazvy_sloupcu[$i]]}'";
									}
									$dotaz .= "\n" . $pridejStr;	
								}
								$dotaz .= "\n" . "WHERE " . $nazvy_sloupcu[0] . " = " . "{$_POST[$nazvy_sloupcu[0]]}";
								
								echo $dotaz;
								mysqli_query($db, $dotaz);
								header("Location: crud.php?obj={$tabulka}"); 
							}

							echo "<form method='post' class='zaznam-info'>";
							$provedeno = false;
							foreach ($nazvy_sloupcu as $nazev_sloupce) {
								if(strpos($nazev_sloupce, 'ID') !== false && !$provedeno){
									echo "<input type='hidden' name='$nazev_sloupce' value='{$hodnoty[$nazvy_sloupcu[0]]}'>";
									$provedeno = True;
								}
								elseif (strpos($nazev_sloupce, 'dat') !== false) {
									echo "<div>";
										echo "<label for='{$nazev_sloupce}'>{$nazev_sloupce}</label>";
										echo "<input type='date' name='{$nazev_sloupce}' id='{$nazev_sloupce}' required value='{$hodnoty[$nazev_sloupce]}'>";
									echo "</div>";	
								}
								elseif (strpos($nazev_sloupce, 'ID') !== false && $provedeno){
									echo "<div>"; 
										echo "<label for='{$nazev_sloupce}'>{$nazev_sloupce}</label>";
										echo "<select name='{$nazev_sloupce}' id='{$nazev_sloupce}' required>";

										$dotaz = $db->query("SELECT IDs,nazev FROM sekce");
										$select = $dotaz->fetch_all(MYSQLI_ASSOC);

										foreach ($select as $selectHodnota) {
											if($hodnoty[$nazev_sloupce] == $selectHodnota["IDs"]){
												echo "<option value='{$selectHodnota["IDs"]}' selected>{$selectHodnota["nazev"]}</option>";
											}
											else{
												echo "<option value='{$selectHodnota["IDs"]}'>{$selectHodnota["nazev"]}</option>";
											}
										}

										echo "</select>";
									echo "</div>";
								}
								else{
									echo "<div>";
										echo "<label for='{$nazev_sloupce}'>{$nazev_sloupce}</label>";
										echo "<input type='text' name='{$nazev_sloupce}' id='{$nazev_sloupce}' required value='{$hodnoty[$nazev_sloupce]}'>";
									echo "</div>";	
								}
							}
							echo "<input type='submit' value='Uložit' class='edit'>";
							echo "</form>"; 
						}  
						?>

				<div class="rok">
					<p>© 2021</p>
				</div>
			</div> 
		</div>		
	</body>
</html>