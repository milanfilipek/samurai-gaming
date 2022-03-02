<?php
	require 'static/html_top.php';
	require 'static/db_pripojeni.php';
?>

		<link rel="stylesheet" href="styles/style.css" type="text/css">
		<link rel="shortcut icon" href="favicon.ico">
		
		<title>Samurai Gaming - Management</title>
		<style>
			.hraci img{
				transition: transform .4s;
				width: 100%;
			}
			
			.modal {
				display: none;
				position: fixed; 
				z-index: 1; 
				padding-top: 100px; 
				left: 0;
				top: 0;
				width: 100%; 
				height: 100%; 
				overflow: auto; 
				background-color: rgb(0,0,0); 
				background-color: rgba(0,0,0,0.4);
			}

			.modal-content {
				position: relative;
				background-color: #fefefe;
				margin: auto;
				padding: 0;
				border: 1px solid #888;
				width: 80%;
				box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
				-webkit-animation-name: animatetop;
				-webkit-animation-duration: 0.4s;
				animation-name: animatetop;
				animation-duration: 0.4s
			}
			
			@-webkit-keyframes animatetop {
				from {top:-300px; opacity:0} 
				to {top:0; opacity:1}
			}

			@keyframes animatetop {
				from {top:-300px; opacity:0}
				to {top:0; opacity:1}
			}

			.close {
				color: white;
				float: right;
				font-size: 28px;
				font-weight: bold;
			}

			.close:hover, .close:focus {
				color: #000;
				text-decoration: none;
				cursor: pointer;
			}

			.modal-header {
				padding: 2px 16px;
				background-color: #940303;
				color: white;
				text-align: center;
				letter-spacing: 0.08rem;
				text-transform: uppercase;
			}

			.modal-body {
				padding: 2px 16px;
				display: flex;
				align-items: flex-end;
			}
			
			.modal-body img{
				float: right;
				width: 45%;
			}
			.modal-body-text{
				width: 60%;
			}
			
			.modal-footer {
				padding: 2px 16px;
				background-color: #666;
				color: white;
			}
			
			.hraci img:hover{
				transform:scale(1.10);
				cursor: pointer;
			}
			
			.modal-body h2{
				margin-bottom: 10px;
				margin-top: 10px;
				color: #940303;
				letter-spacing: 0.05em;
			}
			
			.modal-body p{
				margin-top: 5px;
				padding-left: 10px;
				color: black;
				font-size: 16px;
				font-weight: 400;
				letter-spacing: 0.03em;
			}
			
			.text-block {
				position: absolute;
				bottom: 1px;
				background: linear-gradient(to top, rgb(0, 0, 0) 0%,rgba(0, 0, 0, 0.22) 100%);
				color: white;
				text-align: center;
				width: 100%;
				pointer-events: none;
			}
			
			.text-block h4{
				margin: 0;
				padding-top: 5px;
				padding-bottom: 5px;
				letter-spacing: 0.1em;
				font-size: 1.6vw;
				font-weight: 700;	
				text-transform: uppercase;
			}
			
			.text-block p{
				font-size: 0.75vw;
			}
			@media only screen and (max-width: 700px) {
				.modal-body img{
					width:115%;
					float: inline-start;
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
				
				<h1>Management</h1>
				
				<div class="center">
					<div class="hraci">
						<img id="img_hrac" class="img_hrac" src="images/hraci/sg_placeholder.png">		
						<div class="text-block">
							<h4>Jakub Vicena</h4>
						</div>
					</div>
					<div class="hraci">
						<img id="img_hrac2" class="img_hrac" src="images/hraci/sg_placeholder.png">		
						<div class="text-block">
							<h4>Vít Vrbenský</h4>
						</div>
					</div>
					<div class="hraci">
						<img id="img_hrac3" class="img_hrac" src="images/hraci/sg_placeholder.png">		
						<div class="text-block">
							<h4>Adam Vrbenský</h4>
						</div>
					</div>
				</div>
				
				<div id="modal" class="modal">
					<div class="modal-content">
						<div class="modal-header">
							<span class="close">&times;</span>
							<h2>Jakub Vicena</h2>
						</div>
						<div class="modal-body">
							<div class="modal-body-text">
								<h2>Věk:</h2>
								<p>30</p>
								<h2>Národ:</h2>
								<p>Česká Republika</p>
								<h2>Pozice:</h2>
								<p>Jednatel a Manažer PUBG sekce</p>
							</div>
							<div class="modal-body-img">
								<img src="images/hraci/sg_placeholder.png">
							</div>
						</div>
						<div class="modal-footer">
							<p></p>
						</div>
					</div>
				</div>
				
				
				<div id="modal2" class="modal">
					<div class="modal-content">
						<div class="modal-header">
							<span class="close">&times;</span>
							<h2>Vít Vrbenský</h2>
						</div>
						<div class="modal-body">
							<div class="modal-body-text">
								<h2>Věk:</h2>
								<p>26</p>
								<h2>Národ:</h2>
								<p>Česká Republika</p>
								<h2>Pozice:</h2>
								<p>Manager</p>
							</div>
							<div class="modal-body-img">
								<img src="images/hraci/sg_placeholder.png">
							</div>
						</div>
						<div class="modal-footer">
							<p></p>
						</div>
					</div>
				</div>
				
				<div id="modal3" class="modal">
					<div class="modal-content">
						<div class="modal-header">
							<span class="close">&times;</span>
							<h2>Adam Vrbenský</h2>
						</div>
						<div class="modal-body">
							<div class="modal-body-text">
								<h2>Věk:</h2>
								<p>20</p>
								<h2>Národ:</h2>
								<p>Česká Republika</p>
								<h2>Pozice:</h2>
								<p>Manager</p>
							</div>
							<div class="modal-body-img">
								<img src="images/hraci/sg_placeholder.png">
							</div>
						</div>
						<div class="modal-footer">
							<p></p>
						</div>
					</div>
				</div>

				<div class="rok">
					<p>&copy; 2021</p>
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
			
			var modal = document.getElementsByClassName("modal");
			var img = document.getElementsByClassName("img_hrac");
			var span = document.getElementsByClassName("close");

			img[0].onclick = function() {
				modal[0].style.display = "block";
			}

			img[1].onclick = function() {
				modal[1].style.display = "block";
			}
			
			img[2].onclick = function() {
				modal[2].style.display = "block";
			}

			
			span[0].onclick = function() {
				modal[0].style.display = "none";
			}

			span[1].onclick = function() {
				modal[1].style.display = "none";
			}

			span[2].onclick = function() {
				modal[2].style.display = "none";
			}
			
			
			window.onclick = function(event) {
				if (event.target == modal[0]) {
					modal[0].style.display = "none";
				}
				if (event.target == modal[1]) {
					modal[1].style.display = "none";
				}
				if (event.target == modal[2]) {
					modal[2].style.display = "none";
				}
			}
		</script>
		
	</body>
</html>