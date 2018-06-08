$("#estados").change(function(event){
	$.get("/municipios/"+event.target.value+"", function(response, estados){
		debugger;
		$("#municipios").empty();
		$("#municipios").append("<option value= '0'>Seleccione el Municipio</option>");
		for(var i = 0; i <= response.length; i++)
		{
			$("#municipios").append("<option value='"+response[i].id+"'>"+response[i].nombre_municipio+"</option>");
		}	
	});
});

$("#municipios").change(function(event){
	console.log("Estas en municipios");
});