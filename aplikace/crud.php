<?php
	require 'static/db_pripojeni.php';
	require 'static/html_top.php';	   
?>

	<link rel="stylesheet" href="styles/style.css" type="text/css">
	<title>Samurai Gaming - Administrace</title>

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

					if(!empty($_GET["obj"])){
						$tabulka = $_GET["obj"];

						$dotaz = $db->prepare("SHOW COLUMNS FROM `" . $tabulka . "`");
						$dotaz->execute(); 
						$vysledek= $dotaz->get_result();
						$sloupce = array();
						foreach($vysledek as $sloupec) {
							$sloupce[]=$sloupec;
						}												// získaní všech informaci o sloupcich v tabulce

						$dotaz = $db->prepare("SELECT * FROM `" . $tabulka . "`");
						$dotaz->execute(); 
						$vysledek= $dotaz->get_result();
						$radky = array();
						foreach($vysledek as $radek) {
							$radky[]=$radek;
						} 												// získaní všech hodnot z dané tabulky kterou budeme prohlížet/upravovat

						$nazvy_sloupcu = array();						// kod pro ulozeni pouze nazvu sloupcu dane tabulky
						foreach ($sloupce as $sloupec) {
							$nazvy_sloupcu[]=$sloupec["Field"];
						}
						
						if (isset($_POST["odstranit"])){
							$tabulka = $_GET["obj"];
							$dotaz = "
							DELETE FROM `" . $tabulka . "`
							WHERE ". $nazvy_sloupcu[0] ." = {$_POST["odstranit"]}
							";
							mysqli_query($db, $dotaz);
							header("Location: crud.php?obj={$tabulka}");
						}
						
						if (isset($_POST[$nazvy_sloupcu[1]])){
							$sql = "INSERT INTO ". $tabulka ."(";
							$colBind = "";
							for($i=1; $i < count($nazvy_sloupcu); $i++){
								if($i != count($nazvy_sloupcu)-1){
									$pridejStr = $nazvy_sloupcu[$i] . ",";
								}
								else{
									$pridejStr = $nazvy_sloupcu[$i];
								}
								$sql .= $pridejStr;
							}

							$sql .= ") VALUES(";
							
							for ($i=1; $i < count($nazvy_sloupcu); $i++) {
								if($i != count($nazvy_sloupcu)-1){
									$pridejStr = "?,";
								}
								else{
									$pridejStr = "?)";
								}
								$sql .= $pridejStr;
							}
							
							echo $sql;

							$dotaz = $db->prepare($sql);
							$typy  = "";
							$colBind = array();

							for($i=1;$i < count($nazvy_sloupcu); $i++){
								if(strpos($nazvy_sloupcu[$i], 'ID') !== false){
									$typy .= "i";
								}
								else{
									$typy .= "s";
								}

								if (preg_match('/(\.jpg|\.png|\.bmp)$/i', $_POST[$nazvy_sloupcu[$i]])) { //pokud se v formulari noveho zaznamu objevi obrazek nebo logo, tak doplni cestu az do slozky kde se nachazi obrazky
									$obrazek = $_POST[$nazvy_sloupcu[$i]];
									switch ($_GET["obj"]) {
										case 'sekce':
											$cestaftp = "images/sekce/";
											$cesta = "images/sekce/" . $obrazek;
											break;
										case 'hraci':
											$cestaftp = "images/hraci/";
											$cesta = "images/hraci/" . $obrazek;
											break;
										case 'partneri':
											$cestaftp = "images/sponsors/";
											$cesta = "images/sponsors/" . $obrazek;
											break;
										default:
											break;
									}

									$colBind[] = $cesta;
								}
								else{
									$colBind[] = $_POST[$nazvy_sloupcu[$i]];
								}
							}
							$dotaz->bind_param($typy, ...$colBind);
							$dotaz->execute();							
							header("Location: crud.php?obj={$tabulka}");
						}

						echo "<table class='crudVypis'>";			// vytvoreni tabulky pro zobrazeni hodnot v dane tabulce
							echo "<thead>";
								echo "<tr>";
								foreach ($nazvy_sloupcu as $nazev_sloupce) {	// vypis hlavicky tabulky
									echo "<th>{$nazev_sloupce}</th>";
								}
									echo "<th>Editace</th>";
									echo "<th>Odstraneni</th>";
								echo "</tr>";
							echo "</thead>";

							echo "<tbody>";	// telo tabulky

							$dotaz = $db->query("SELECT IDs,nazev FROM sekce");
							$select = $dotaz->fetch_all(MYSQLI_ASSOC);

							foreach($radky as $radek){
								echo "<tr>";
									for ($i=0; $i < count($nazvy_sloupcu); $i++) { // vypis jednotlivych radku
										if(strpos($nazvy_sloupcu[$i], 'IDs') !== false && $i!=0){          // vypis nazvu sekce misto ID sekce
											echo "<td>{$select[($radek[$nazvy_sloupcu[$i]])-1]["nazev"]}</td>";
										}
										else if(strpos($nazvy_sloupcu[$i], 'obrazek') !== false || strpos($nazvy_sloupcu[$i], 'logo') !== false){
											echo "<td><img src='{$radek[$nazvy_sloupcu[$i]]}' style='height: 3vh;' alt='Fotka hrace z organizace nebo partnera Samurai Gaming'></td>";
										}
										else {
											echo "<td>{$radek[$nazvy_sloupcu[$i]]}</td>";
										}		
									}
									echo   "<td>					
												<form action='editovat.php?obj={$tabulka}&id={$radek[$nazvy_sloupcu[0]]}' method='POST'>
													<input type='submit' value='Editovat' class='edit'>
												</form>
											</td>
											<td>
												<form method='POST'>
													<input type='hidden' name='odstranit' value='{$radek[$nazvy_sloupcu[0]]}'>
													<input type='submit' value='Odstranit' class='edit' onclick=\"return window.confirm('Chcete opravdu tuto hodnotu odstranit?')\">
												</form>
											</td>"; 		// pridani editacnich tlacitek ke kazdemu radku, v hodnote value je ukryto ID zaznamu
								echo "</tr>";
							}
							echo "</tbody>";
						echo "</table>";
					}
				?>
				
				<?php if(!empty($_GET["obj"])){ // pokud neni vybrana tabulka tak se nezobrazi nic na webu krome navigace ?>
					<h3>Vytvoření nového záznamu</h3> 

					<form method="post" class="zaznam-info">
						<?php
							$hodnoty=array();
							foreach ($nazvy_sloupcu as $nazev_sloupce) {
								$hodnoty[$nazev_sloupce]="";
							}

							$provedeno = False;
							foreach ($nazvy_sloupcu as $nazev_sloupce) {
								if(strpos($nazev_sloupce, 'ID') !== false && !$provedeno){
									echo "<input type='hidden' name='$nazev_sloupce' value=''>";
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
										echo "<select name='{$nazev_sloupce}' id='{$nazev_sloupce}'>";

										$dotaz = $db->query("SELECT IDs,nazev FROM sekce");
										$select = $dotaz->fetch_all(MYSQLI_ASSOC);
										foreach ($select as $selectHodnota) {
											echo "<option value='{$selectHodnota["IDs"]}'>{$selectHodnota["nazev"]}</option>";
										}

										echo "</select>";
									echo "</div>";
								}
								elseif (strpos($nazev_sloupce, 'obrazek') !== false || strpos($nazev_sloupce, 'logo') !== false){
									echo "<div>";
										echo "<label for='{$nazev_sloupce}'>{$nazev_sloupce}</label>";
										echo "<input type='file' name='{$nazev_sloupce}' id='{$nazev_sloupce}' accept='image/*' required>";
									echo "</div>";
								}
								else{
									echo "<div>";
										echo "<label for='{$nazev_sloupce}'>{$nazev_sloupce}</label>";
										echo "<input type='text' name='{$nazev_sloupce}' id='{$nazev_sloupce}' required value=''>";
									echo "</div>";	
								}
							}
						?>
						<input type="submit" value="Uložit" class="edit">
					</form>
				<?php } ?>

				<div class="rok">
					<p>© 2021</p>
				</div>
			</div> 
		</div>		
	</body>
</html>