<!DOCTYPE html>

<html lang="cs">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="user-scalable=yes">
		<meta name="description" content="Začínající český e-sportový tým, který byl založen na konci listopadu 2018. Zaměřujeme se na všechny kompetitivní hry jako je TFT a LoL, PUBG, CS:GO, atd.">
		
		<script src="https://kit.fontawesome.com/a695cafb49.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="http://fonts.googleapis.com/css?family=Raleway:300,400,600,700" type="text/css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css">	
		<link rel="shortcut icon" href="../favicon.ico">
		
		<?php 
			$activePage = basename($_SERVER['PHP_SELF'], ".php"); // ulozeni stranky na ktere se uzivatel nachazi do promenne

			if(!empty($_GET["id"])){
				$activeID = $_GET["id"];
			}
		?>