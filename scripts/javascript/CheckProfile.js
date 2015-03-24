function validarForm() {
    // Reseting errors
    var name_err = document.getElementById("name_err");
    name_err.innerHTML = "";
    name_err.style.color = "red";
    var fsurname_err = document.getElementById("fsurname_err");
    fsurname_err.innerHTML = "";
    fsurname_err.style.color = "red";
    var ssurname_err = document.getElementById("ssurname_err");
    ssurname_err.innerHTML = "";
    ssurname_err.style.color = "red";
    var email_err = document.getElementById("email_err");
    email_err.innerHTML = "";
    email_err.style.color = "red";
    var gender_err = document.getElementById("gender_err");
    gender_err.innerHTML = "";
    gender_err.style.color = "red";

    // Checking for errors
    var name = document.forms["form_profile"]["name"].value;
    var firstsurname = document.forms["form_profile"]["firstsurname"].value;
    var secondsurname = document.forms["form_profile"]["secondsurname"].value;
    var radio_female = document.forms["form_profile"]["gender_f"].checked;
    var radio_male = document.forms["form_profile"]["gender_m"].checked;
    var email = document.forms["form_profile"]["email"].value;
    var pattern = /\S+@\S+\.\S+/;
    var right = true;

    if (name == "" || name == null) {
        name_err.innerHTML = "No has escrito tu nombre.";
        right = false;
    }
    if (firstsurname == "" || firstsurname == null) {
        fsurname_err.innerHTML = "No has escrito tu primer apellido.";
        right = false;
    }
    if (secondsurname == "" || secondsurname == null) {
        ssurname_err.innerHTML = "No has escrito tu segundo apellido."
        right = false;
    }
    if (!radio_female && !radio_male){
        gender_err.innerHTML = "Elige genero";
        right = false;
    }
    if (email == "" || email == null) {
        email_err.innerHTML = "No has escrito tu email.";
        right = false;
    }
    if (!pattern.test(email)) {
        email_err.innerHTML = " Formato del email no es correcto.";
        right = false;
    }

    return right;

}
