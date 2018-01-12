var serialize = function(){
	event.preventDefault();
	var data = $('.userForm').serializeArray();
	var username = data[0].value;
	var passwordHash = simpleHash(data[1].value);
	$.ajax({
		type: "POST",
		url: "php/api.php",
		data: { "user":  {"username": username, "password": passwordHash} }
	}).done(function( data ){
		console.log(data);
	});
	
	console.log( username + ", " + passwordHash);
}

