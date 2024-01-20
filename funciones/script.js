// navbar
//import { Collapse, initMDB } from "mdb-ui-kit";

//initMDB({ Collapse });
//formulario registro
function mostrarForm(formType) {
	if (formType === 'login') {
		document.getElementById('loginForm').style.display = 'block';
		document.getElementById('registroForm').style.display = 'none';
	} else if (formType === 'registro') {
		document.getElementById('loginForm').style.display = 'none';
		document.getElementById('registroForm').style.display = 'block';
	}
}
//verificaciones registros
$(document).ready(function() {
	$("#botonregistro").click(verificarRegistro);
	$("#botoninicio").click(verificarInicio);
	$("#borrarcookie").click(borrarcookie);
})
function verificarInicio() {
	let correo1 = document.getElementById("correo").value;
	let contra1 = document.getElementById("contrasenaInicio").value;
	let correoIni = correo1.trim();
	let contraIni = contra1.trim();
	let errores = [];
	if (validarcorreo(correoIni) == false) {
		errores.push("El correo no esta en un formato correcto \n");
	}
	if (errores.length == 0) {
		let peticion = $.ajax({
			url: "funciones.php",
			type: "POST",
			data: {
				correoIni: correoIni,
				contraIni: contraIni
			},
			async: true,
			success: function(data) {
				if(data=="false"){
					$("#respuestainicio").html("El correo o la contraseña son incorrectos");
				}else{
					setCookie("id",data,1);
					location.href ='../index.php';
				}		
			}, error: function(data) {
				alert("Error en la trasmision");
			}
		})
	} else {
		alert(errores);
	}
}

function verificarRegistro() {
	let correo1 = document.getElementById("correoRegistro").value;
	let contra1 = document.getElementById("contrasenaRegistro").value;
	let correo = correo1.trim();
	let contra = contra1.trim();

	let errores = [];
	if (validarcorreo(correo) == false) {
		errores.push("El correo no esta en un formato correcto \n");
	}
	if (validarcontra(contra) == false) {
		errores.push("La contraseña tiene que tener 8 caracteres, una mayuscula, una minuscula, un numero y un simbolo(!@#$%^&*) \n");
	}
	if (errores.length == 0) {
		let peticion = $.ajax({
			url: "../funciones/funciones.php",
			type: "POST",
			data: {
				correo: correo,
				contra: contra
			},
			async: true,
			success: function(data) {
				if(data=="false"){
					$("#respuestaregistro").html("Ya existe una cuenta con ese correo electronico");
				}else{
					$("#respuestaregistro").html("La cuenta se ha creado correctamente");
				}
			}, error: function(data) {
				alert("Error en la trasmision");
			}
		})
	} else {
		alert(errores);
	}
}
function validarcorreo(dato) {
	let verdadero = true;
	let ex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
	if (!ex.test(dato)) {
		verdadero = false;
	}
	return verdadero;
}
function validarcontra(dato) {
	let verdadero = true;
	let ex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/;
	if (!ex.test(dato)) {
		verdadero = false;
	}
	return verdadero;
}

// cookies
function setCookie(cname, cvalue, exdays) {
	const d = new Date();
	d.setTime(d.getTime() + (exdays*24*60*60*1000));
	let expires = "expires="+ d.toUTCString();
	document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}


function borrarcookie() {  
	document.cookie = "id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
	window.location.href = "iniciosesion.php";
}