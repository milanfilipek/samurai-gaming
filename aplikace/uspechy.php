<?php
	require 'static/html_top.php';
	require 'static/db_pripojeni.php';
?>
		<link rel="stylesheet" href="styles/style.css" type="text/css">
		<link rel="shortcut icon" href="favicon.ico">
		
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#umisteni td.misto').each(function(){
					if ($(this).text() == '1. místo') {
						$(this).css('color','gold');
					}
					if ($(this).text() == '2. místo') {
						$(this).css('color','silver');
					}
					if ($(this).text() == '3. místo') {
						$(this).css('color','#cd7f32');
					}
				});
			});
		</script>

		<title>Samurai Gaming - Úspěchy</title>
		<style>
			#umisteni {
				border: 1px solid black;
				border-collapse: collapse;
				width: 65%;
				text-align: center;
				margin: 0 auto;
				margin-top: 20px;
				-webkit-box-shadow: 21px 30px 44px 10px rgba(0,0,0,0.56);
				-moz-box-shadow: 21px 30px 44px 10px rgba(0,0,0,0.56);
				box-shadow: 21px 30px 44px 10px rgba(0,0,0,0.56);
				background-color: #2f2a2a91;
			}
			#umisteni td, #umisteni th {
				padding: 8px;  
			}

			#umisteni th {
				padding-top: 12px;
				padding-bottom: 12px;
				text-align: center;
				color: white;
				border-bottom: 1px solid black;
			}
			#umisteni td{
				color: white;
			}
			#umisteni td.misto{
				color: black;
				width: 15%;
			}
			
			}
			@media only screen and (max-width: 950px){
				footer{
					display: none;
				}
				.rok{
					display: none;
				}
				body{
					height: auto;
				}
			}
		</style>
	</head>
	<body>
		<div class="pagebg">
			<div class="textura">
				<?php
					require 'static/navigace.php';
				?>
				
				<h1>Úspěchy našich sekcí na turnajích:</h1>


				<table id="umisteni">
					<tr>
						<th>Umístění</th>
						<th>Turnaj</th>
						<th>Sekce</th>
					</tr>
					<?php
						$dotaz = $db->prepare("SELECT u.*, s.zkratka FROM uspechy u, sekce s WHERE u.IDs=s.IDs");
						$dotaz->execute();
						$vysledek=$dotaz->get_result();
						$uspechy = $vysledek->fetch_all(MYSQLI_ASSOC);

						foreach ($uspechy as $uspech) {
							echo '<tr>
									<td class="misto">'.$uspech["umisteni"].'</td>
									<td>'.$uspech["nazev"].'</td>
									<td>'.$uspech["zkratka"].'</td>
								</tr>';
						}
					?>																									
				</table>

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