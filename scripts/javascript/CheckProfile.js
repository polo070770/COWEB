function validateForm(email_id) {

    function runEffect(id, effect) {
        var options = {};
        $(id).effect(effect, options, 500, callback);
    }

    // callback function to bring a hidden box back
    function callback() {
        setTimeout(function () {
            $("#effect").removeAttr("style").hide().fadeIn();
        }, 1000);
    }

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
    var country = document.forms["form_profile"]["country"].value;
    var city = document.forms["form_profile"]["city"].value;
    var pattern = /\S+@\S+\.\S+/;
    var right = true;

    if (name === "" || name === null) {
        name_err.innerHTML = "No has escrito tu nombre.";
        runEffect($("#name_err"), "bounce");
        right = false;
    }
    if (firstsurname === "" || firstsurname === null) {
        fsurname_err.innerHTML = "No has escrito tu primer apellido.";
        runEffect($("#fsurname_err"), "bounce");
        right = false;
    }
    if (secondsurname === "" || secondsurname === null) {
        ssurname_err.innerHTML = "No has escrito tu segundo apellido.";
        runEffect($("#ssurname_err"), "bounce");
        right = false;
    }
    if (!radio_female && !radio_male) {
        gender_err.innerHTML = "Elige genero";
        runEffect($("#gender_err"), "bounce");
        right = false;
    }
    if (email === "" || email === null) {
        email_err.innerHTML = "No has escrito tu email.";
        runEffect($("#email_err"), "bounce");
        right = false;
    } else {
        if (!pattern.test(email)) {
            email_err.innerHTML = " Formato del email no es correcto.";
            runEffect($("#email_err"), "bounce");
            right = false;
        }
    }

    if (right) {
        var gender = radio_female ? "female" : "male";

        $.ajax({
            type: "POST",
            url: "scripts/php/UpdateProfile.php",
            dataType: "json",
            data: {email_id: email_id, name: name, firstsurname: firstsurname,
                secondsurname: secondsurname, gender: gender, email: email,
                country: country, city: city},
            complete: function (jqXHR, textStatus) {
                var log = document.getElementById("log_submit");
                log.innerHTML = "The profile has been updated!";
                log.style.color = "blue";
                runEffect($("#log_submit"), "bounce");
                runEffect($("input[name='submit']"), "highlight");
                runEffect($("#log_submit"), "drop");
            }
        });

    }

    return right;
}
