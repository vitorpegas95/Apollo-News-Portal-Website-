<!DOCTYPE html>
<!--[if IE 9]>
<html class="lt-ie10" lang="en" >
<![endif]-->
<html class="no-js" lang="en" >
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Apollo</title>

	<!-- normalize.css and modernizr.js help with browser compatibility -->
	<link rel="stylesheet" href="css/normalize.css"/>
	<link rel="stylesheet" href="css/foundation.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.5/css/weather-icons.min.css"/>
	<script src="js/vendor/modernizr.js"></script>
</head>
<body>
	<?php require "_nav.php"; ?>
	
	<div class="row" style="margin-top: 20px;">
		<div class="medium-8 columns panel">
			<h3>Bem Vindo ao Apollo.</h3>
			<p>Apollo é um portal de informa&ccedil;&atilde;o que junta v&aacute;rias fontes da comunica&ccedil;&atilde;o social portuguesa, meteorologia e guia tv num s&oacute; site.</p>
			
			<p>Este portal foi criado com recurso a v&aacute;rias API open source:</p>
			
			<ul>
				<li><a target="_blank" href="http://developers.blogs.sapo.pt/4736.html">SAPO TV Web Service</a></li>
				<li><a target="_blank" href="http://www.cmjornal.xl.pt/rss.aspx">Correio da Manh&atilde; RSS Feed</a></li>
				<li><a target="_blank" href="http://openweathermap.org/current">Meteorologia by OpenWeatherMap</a></li>
				<li><a target="_blank" href="#">Bolsa de valores (Brevemente)</a>
			</ul>
			
			<p>Tecnologias usadas: </p>
			
			<ul>
				<li>PHP (Backend API Control)</li>
				<li>jQuery 2 (Frontend AJAX)</li>
				<li>Foundation (HTML Framework)</li>
				<li>HTML + CSS</li>
			</ul>
			
			<hr>
			
			
			<p>Site criado por <a href="www.oryzhon.com/vitor">Vitor P&ecirc;gas</a></p>
			<p>Copyright &copy; Vitor P&ecirc;gas. Todas as marcas e nomes referidos neste site s&atilde;o reservados aos seus respectivos donos.</p>
		</div>
		
		<?php require "_sidebar.php"; ?>
	</div>


	<!-- include before </body> tag -->
	<script src="js/vendor/jquery.js"></script>
	<script src="js/foundation.min.js"></script>
	<script>
		$(document).foundation();
	</script>
	
	<script src="js/getWeather.js"></script>
</body>
</html>