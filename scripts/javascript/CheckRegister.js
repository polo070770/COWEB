function validateRegister(username, password) {

    var register_result = $("#form-result");

    register_result.html("Loading...");

    if (username.val() == "") {
        username.focus();
        register_result.html("<span>Enter the email</span>");
        return false;
    }

    if (password.val() == "") {
        password.focus();
        register_result.html("<span>Enter the password</span>");
        return false;
    }

    if (!$("#gender_f").is(":checked") && !$("#gender_m").is(":checked")){
        register_result.html("<span>Must select one gender</span>");
    }

    var gender;
    if ($("#gender_f").is(":checked")) {
        gender = $("#gender_f").val();
    }
    if ($("#gender_m").is(":checked")) {
        gender = $("#gender_m").val();
    }

    if (username.val() != '' && password.val() != '') {

        var UrlToPass = "action=register&username=" + username.val() + "&password=" + password.val() + "&gender=" + gender;
        $.ajax({
            type: 'POST',
            data: UrlToPass,
            url: 'scripts/php/CheckRegister.php',
            success: function (responseText) {
                if (responseText == 0) {
                    register_result.html('<span>Cannot register!</span>');
                }
                else if (responseText == 1) {
                    window.location = '../../login.html';
                }
                else {
                    alert('Problem with sql query');
                }
            }
        });
    }

    return false;

}