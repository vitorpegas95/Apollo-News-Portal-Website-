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
			<h3>GUIA TV</h3>
			
			
			<div class="row">
				<div class="small-12">
					<input type="text" id="channelInput" value="FOX" name="channel" placeholder="FOX">
				</div>
			</div>
			
			
			<hr>
			
			<table>
				<thead>
					<tr>
						<th>Hora</th>
						<th>Programa</th>
					</tr>
				</thead>
				
				<tbody id="tvGuide">
					
				</tbody>
			</table>	
			
		</div>
		
		<div class="medium-4 columns panel">
			<h3>Lista de Canais</h3>
			
			<table>
			<thead>
				<tr>
					<th>#</th>
					<th>Nome</th>
				</tr>
			</thead>
			
			<tbody>
			<?php
				require "config/TVApi.php";
			
				$API = new TVApi();
	
				$channels = $API->getChannelList();
				
				for($i = 0; $i < sizeof($channels); $i++ )
				{
					echo "<tr>";
					echo "<td>";
					echo $i;
					echo "</td>";
					
					echo "<td>";
					echo $channels[$i]->getName() . "&nbsp; (<a href='guiatv.php?sigla=" . $channels[$i]->getSigla() . "'>" . $channels[$i]->getSigla() . "</a>)"; 
					echo "</td>";
					
					echo "</tr>";
				}
	
			?>
			</tbody>
			</table>
		</div>
	</div>


	<!-- include before </body> tag -->
	<script src="js/vendor/jquery.js"></script>
	<script src="js/foundation.min.js"></script>
	<script>
		$(document).foundation();
	</script>
	
	<script src="js/getTVGuide.js"></script>
</body>
</html>