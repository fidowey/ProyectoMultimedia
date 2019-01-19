function validarR(){

	var nombres, apellidos, rut, dv, telefono, email;

	nombres = document.getElementById("nombres").value;
	apellidos = document.getElementById("apellidos").value;
	rut = document.getElementById("rut").value;
	dv = document.getElementById("dv").value;
	telefono = document.getElementById("telefono").value;
	email= document.getElementById("email").value;

	if(nombres === ""){
		alert ("el campo nombres es invalido");
		return false;
	}

	if(rut.length > 8){
		alert ("el rut demasiado largo");
		return false;
	}

	if(rut.length < 7){
		alert ("el rut demasiado largo");
		return false;
	}

	if(telefono.length < 8){
		alert("el telefono es demasiado largo");
		return false;
	}

	if(telefono.length < 7){
		alert("el telefono es demasiado corto");
		return false;
	}