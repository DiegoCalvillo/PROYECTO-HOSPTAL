$("#estados").change(function(event){
	$.get("http://192.168.1.66:8080/municipios/"+event.target.value+"", function(response, estados){
		debugger;
		$("#municipios").empty();
		$("#municipios").append("<option value= '0'>Seleccione el municipio</option>");
		for(var i = 0; i <= response.length; i++)
		{
			$("#municipios").append("<option value='"+response[i].id+"'>"+response[i].nombre_municipio+"</option>");
		}	
	});
});