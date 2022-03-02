<header id="header">
	<div class="nav_bar">
		<nav class="hl_nav">
			<a href="index.php"><img class="logo" src="images/sg_res.png"></a>
			<ul class="menu">
				<li class="<?=($_GET["obj"] == 'sekce') ? 'active':''; ?>"><a href="crud.php?obj=sekce">TÝMY</a></li>
				<li class="<?=($_GET["obj"] == 'hraci') ? 'active':''; ?>"><a href="crud.php?obj=hraci">HRÁČI</a></li>
				<li class="<?=($_GET["obj"] == 'partneri') ? 'active':''; ?>"><a href="crud.php?obj=partneri">PARTNEŘI</a></li>
				<li class="<?=($_GET["obj"] == 'kontakty') ? 'active':''; ?>"><a href="crud.php?obj=kontakty">KONTAKTY</a></li>
				<li class="<?=($_GET["obj"] == 'uspechy') ? 'active':''; ?>"><a href="crud.php?obj=uspechy">ÚSPĚCHY</a></li>
			</ul>
		</nav>
	</div>
</header>