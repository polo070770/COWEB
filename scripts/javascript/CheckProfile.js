

function validarForm(formulario) {
	if (formulario.name.value.length == 0) {
		formulario.name.focus();
		alert('No has escrito tu nombre.');
		return false; // devolvemos el foco
	}
	if (formulario.firstsurnanme.value.length == 0) {
		formulario.firstsurnanme.focus();
		alert('No has escrito tu primer apellido.');
		return false;
	}
	if (formulario.secondsurname.value.length == 0) {
		formulario.secondsurname.focus();
		alert('No has escrito tu segundo apellido.');
		return false;
	}
	if (formulario.email.value.length == 0) {
		formulario.email.focus();
		alert('No has escrito tu email');
		return false;
	}
	
	var pattern = /\S+@\S+\.\S+/;
    if (!pattern.test(formulario.email.value)){
    	alert("Formato del email no es correcto.");
    	return false;
    }
	
	return true;
}	
