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
		data: { 
			"user": {
				"action": "login",
				"data": {
					"username": username,
					"password": passwordHash					
				}
			}
		}
	}).done(function( data ){
		if (data == 1){
			document.location.href = '/ayy.html';
		} else {
			alert("Wrong login information.");
		}
	});
}

var register = function(){
	var data = serialize();
	
	var username = data[0].value;
	var password1 = data[1].value;
	var password2 = data[2].value;
	
	var realPassword = "";
	if(password1 === password2){
		realPassword = simpleHash(password1);
	}
	
	$.ajax({
		type: "POST",
		url: "php/api.php",
		data: {
			"user": {
				"action": "register",
				"data": {
					"username": username,
					"password": realPassword
				}
			}
		}
	}).done(function( data ){
		if (data == 1){
			document.location.href = '/ayy.html';
		} else {
			alert("This username is already taken.");
		}
	});
}

$("#submit").on("click", function( event ){
	event.preventDefault();
	if($("#submit").hasClass("login")){
		login();
	} else if($("#submit").hasClass("register")){
		register();
	}
});