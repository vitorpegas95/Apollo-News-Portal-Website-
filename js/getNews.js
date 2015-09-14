$("document").ready(function()
{
	//AJAX Request
	
	$.ajax({
		url: "config/requestHandler.php?ajaxGetNews=CM",
		success: function(result)
		{
			var rtn = jQuery.parseJSON(result);
			
			var html = "";
			
			for(var i = 0; i < rtn.length; i++)
			{
				html += '<li class="panel text-justify">';
				html += '<p><b>' + rtn[i].title + '</b></p>';
				html += '<p><blockquote>';
				html += rtn[i].desc;
				html += '<cite>' + rtn[i].author + '  ' + rtn[i].data + '</cite>';
				html += '</blockquote>';
				html += '</p>';
				html += '<a target="_blank" href="' + rtn[i].url +'">Ler +</a>';
				html += '</li>';
			}
			
			$("#newsGrid").html(html);
		}
	});
});