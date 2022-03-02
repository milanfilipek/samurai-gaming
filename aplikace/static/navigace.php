<header id="header">
	<div class="nav_bar">
		<nav class="hl_nav">
			<a href="index.php"><img class="logo" src="images/sg_res.png" alt="Logo Samurai Gaming"></a>
				<ul class="menu">
				    <li class="<?=($activePage == 'index') ? 'active':''; ?>"><a href="index.php">DOMŮ</a></li>
					<li class="<?=($activePage == 'teams') ? 'active dropdown':'dropdown'; ?>">
						<a href="teams.php">TÝMY ▼</a>
						<div class="dropdown-content">
							<?php
							    $server = "localhost"; // define("DB_SERVER", "localhost");
								$uzivatel = "root";
								$heslo = "";
								$databaze = "samurai";
								$db = new mysqli($server,$uzivatel,$heslo,$databaze);
							    
								$dotaz = $db->prepare("SELECT * FROM sekce");
								$dotaz->execute();
								$vysledek = $dotaz->get_result();
								$sekceArr = $vysledek->fetch_all(MYSQLI_ASSOC);

								foreach ($sekceArr as $sekce) {
									echo '<a href="teams.php?id='.$sekce["IDs"].'">'.$sekce["zkratka"].'</a>';
								}
							?>
					    </div>
					</li>
					<li class="<?=($activePage == 'partneri') ? 'active':''; ?>"><a href="partneri.php">PARTNEŘI</a></li>
					<li class="<?=($activePage == 'about' || $activePage == 'uspechy' || $activePage == 'contact' || $activePage == 'aboutus') ? 'active dropdown':'dropdown'; ?>">
					    <a href="about.php">O NÁS ▼</a>
						<div class="dropdown-content">
							<a class="<?=($activePage == 'uspechy') ? 'active-a':''; ?>" href="uspechy.php">ÚSPĚCHY</a>
							<a class="<?=($activePage == 'contact') ? 'active-a':''; ?>" href="contact.php">KONTAKT</a>
							<a class="<?=($activePage == 'aboutus') ? 'active-a':''; ?>" href="aboutus.php">MANAGEMENT</a>
						</div>
					</li>
				</ul>

			<div class="searchbox">
				<form action="/search.php">
					<input type="text" placeholder="Vyhledat..." name="search">
					<button type="submit"><i class="fas fa-search"></i></button>
				</form>
			</div>

			<div id="sidenav" class="sidenav">
				<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
				<a class="<?=($activePage == 'index') ? 'active':''; ?>" href="index.php">DOMŮ</a>
				<a class="<?=($activePage == 'teams') ? 'active':''; ?>" href="teams.php">TÝMY</a>
				<a class="<?=($activePage == 'partneri') ? 'active':''; ?>" href="partneri.php">PARTNEŘI</a>
				<a class="<?=($activePage == 'about') ? 'active':''; ?>" href="about.php">O NÁS</a>

				<div class="searchbox-mobile">
					<form action="/search.php">
						<input type="text" placeholder="Vyhledat..." name="search">
						<button type="submit"><i class="fas fa-search"></i></button>
					</form>
				</div>

			</div>

		    <span class="tlacitko" onclick="openNav()">☰</span>
		</nav>
	</div>
</header>