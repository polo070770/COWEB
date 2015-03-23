function validarForm() {
    // Reseting errors
    var name_err = document.getElementById("name_err");
    name_err.innerHTML = "";
    var fsurname_err = document.getElementById("fsurname_err");
    fsurname_err.innerHTML = "";
    var ssurname_err = document.getElementById("ssurname_err");
    ssurname_err.innerHTML = "";
    var email_err = document.getElementById("email_err");
    email_err.innerHTML = "";

    // Checking for errors
    var name = document.forms["user_profile"]["name"].value;
    if (name == "" || name == null) {
        name_err.innerHTML = "No has escrito tu nombre.";
        name_err.style.color = "red";
        return false; // devolvemos el foco
    }

    var firstsurname = document.forms["user_profile"]["firstsurname"].value;
    if (firstsurname == "" || firstsurname == null) {
        fsurname_err.innerHTML = "No has escrito tu primer apellido.";
        fsurname_err.style.color = "red";
        return false;
    }

    var secondsurname = document.forms["user_profile"]["secondsurname"].value;
    if (secondsurname == "" || secondsurname == null) {
        ssurname_err.innerHTML = "No has escrito tu segundo apellido.";
        ssurname_err.style.color = "red";
        return false;
    }

    var email = document.forms["user_profile"]["email"].value;
    if (email == "" || email == null) {
        email_err.innerHTML = "No has escrito tu email.";
        email_err.style.color = "red";
        return false;
    }

    var pattern = /\S+@\S+\.\S+/;
    if (!pattern.test(email)) {
        email_err.innerHTML = " Formato del email no es correcto.";
        email_err.style.color = "red";
        return false;
    }

    return true;
}
