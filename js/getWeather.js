$(document).ready(function()
{
	doneTyping("");
});


//setup before functions
var typingTimer;                //timer identifier
var doneTypingInterval = 1000;  //time in ms, 5 second for example
var $input = $('#cityInput');

var weekday = new Array(7);
weekday[0]=  "Domingo";
weekday[1] = "Segunda";
weekday[2] = "Terça";
weekday[3] = "Quarta";
weekday[4] = "Quinta";
weekday[5] = "Sexta";
weekday[6] = "Sábado";


//on keyup, start the countdown
$input.on('keyup', function () {
  clearTimeout(typingTimer);
  typingTimer = setTimeout(doneTyping, doneTypingInterval);
});

//on keydown, clear the countdown 
$input.on('keydown', function () {
  clearTimeout(typingTimer);
});

function iconName(state)
{
	if(state == "Clouds")
		return "day-cloudy";
	else if(state == "Rain")
		return "day-rain";
	else if(state == "Clear")
		return "day-sunny";
	else
		return "cloud"
}

//user is "finished typing," do something
function doneTyping (def) {
	
def = $("#cityInput").val();
	
  $.ajax({
		url: "config/requestHandler.php?ajaxGetWeather=" + def,
		success: function(result)
		{
			var rtn = jQuery.parseJSON(result);
			
			var html = "";
			
			html +='<li class="panel" style="background: LightBlue;">';
			html +='<b>Hoje</b>';
			html +='<i class="wi wi-' + iconName(rtn[0][0]) + '"></i>';
			html +='<p>' + rtn[0][2] + '</p>';
			html +='</li>';
			
			
			rtn = rtn[1];
			
			for(var i = 0; i < rtn.length; i++)
			{
				var d = new Date(rtn[i][0]);
				var day = weekday[d.getDay()];
				
				html +='<li class="panel">';
				html +='<b>' + day + '</b>';
				html +='<i class="wi wi-' + iconName(rtn[i][4]) + '"></i>';
				html +='<p>' + Math.round(rtn[i][2], 0) + ' &ordm;C &nbsp;/ &nbsp;' + Math.round(rtn[i][3], 0) + '&ordm;C</p>';
				html +='</li>';
			}
			
			
			
			$("#city").html($("#cityInput").val());
			$("#weatherGrid").html(html);
		},
		error(xhr,status,error)
		{
			console.error("Error : " + error);			
		}
	});
}