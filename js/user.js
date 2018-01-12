var serialize = function(){
	event.preventDefault();
	var data = $('.userForm').serializeArray();
	return data;
}

var login = function(){
	var data = serialize();
	
	var username = data[0].value;
	var passwordHash = simpleHash(data[1].value);
	
	$.ajax({
		type: "POST",
		url: "php/api.php",
		data: { "user":  {"action": "login", "username": username, "password": passwordHash} }
	}).done(function( data ){
		console.log(data);
	});
	
	console.log( username + ", " + passwordHash);
}

var register = function(){
	var data = serialize();
	
	var username = data[0].value;
	var password1 = data[1].value);
	var password2 = data[2].value);
	
	var realPassword = "";
	if(password1 === password2){
		realPassword = simpleHash(password1);
	}
	
	$.ajax({
		type: "POST",
		url: "php/api.php",
		data: { "user":  {"action": "register", "username": username, "password": realPassword} }
	}).done(function( data ){
		console.log(data);
	});
	
	console.log( username + ", " + passwordHash);
}

