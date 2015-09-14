$(document).ready(function()
{
	var parameter = window.location.search.replace( "?", "" ); // will return the GET parameter 
	var sigla = parameter.split("=")[1];
	if(parameter.length > 1)
	{
		doneTyping(sigla);
		$("#channelInput").val(sigla);
	}
	else
	{
		doneTyping("");
	}
});


//setup before functions
var typingTimer;                //timer identifier
var doneTypingInterval = 1000;  //time in ms, 5 second for example
var $input = $('#channelInput');

//on keyup, start the countdown
$input.on('keyup', function () {
  clearTimeout(typingTimer);
  typingTimer = setTimeout(doneTyping, doneTypingInterval);
});

//on keydown, clear the countdown 
$input.on('keydown', function () {
  clearTimeout(typingTimer);
});

//user is "finished typing," do something
function doneTyping (def) {
	
	if(def == "")
	{
		def = $("#channelInput").val();
	}
	
  $.ajax({
		url: "config/requestHandler.php?ajaxGetTVGuide=" + def,
		success: function(result)
		{
			var rtn = jQuery.parseJSON(result);
			
			var html = "";
			for(var i= 0; i < rtn.length; i++)
			{
				html +='<tr>';
				html +='<td>' + rtn[i].startTime + ' > ' + rtn[i].endTime + '</td>';
				html +='<td>' + rtn[i].title + '</td>';
				html +='</tr>';
			}
			
			$("#tvGuide").html(html);
			
			$("#tvGuide tr:first").css("background", "LightGray");
		}
	});
}