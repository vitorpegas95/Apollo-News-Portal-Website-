<!DOCTYPE html>
<!--[if IE 9]>
<html class="lt-ie10" lang="en" >
<![endif]-->
<html class="no-js" lang="en" >
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-16" />
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
			<hr></hr>
			
			<h3>&Uacute;ltimas Not&iacute;cias</h3>
			
			<div id="newsRtn">
				<div class="row">
					<div class="small-12 columns">
						<ul class="medium-block-grid-2 small-block-grid-1" id="newsGrid">
							
						</ul>
					</div>
				</div>

			</div>
		</div>
		
		<?php require "_sidebar.php"; ?>
	</div>


	<!-- include before </body> tag -->
	<script src="js/vendor/jquery.js"></script>
	<script src="js/foundation.min.js"></script>
	<script>
		$(document).foundation();
	</script>
	
	<script src="js/getNews.js"></script>
	<script src="js/getWeather.js"></script>
</body>
</html>