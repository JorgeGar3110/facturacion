$( "#Estado" ).on('change', function(e){
	console.log(e);
	var id = e.target.value;
	//$.get('/getmunicipios?id=' + id, function(data){
	$.get('/getmunicipios/' + id, function(data){
		$('#DivMunicipio').show();
		$('#Municipio').empty();
		$.each(data, function(index, MunicipioObj){
			$('#Municipio').append('<option value="'+ MunicipioObj.id +'">'+MunicipioObj.Nombre+'</option>');
		});
	});
});