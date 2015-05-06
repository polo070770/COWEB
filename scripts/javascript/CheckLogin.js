function validateLogin(username, password) {

    var login_result = $("#form-result");

    login_result.html("Loading...");

    if (username.val() == '') {
        username.focus();
        login_result.html('<span>Enter the email</span>');
        return false;
    }

    if (password.val() == '') {
        password.focus();
        login_result.html('<span>Enter the password</span>');
        return false;
    }

    if (username.val() != '' && password.val() != '') {

        var UrlToPass = "action=login&username=" + username.val() + "&password=" + password.val();
        $.ajax({
            type: "POST",
            data: UrlToPass,
            url: "scripts/php/CheckLogin.php",
            success: function (responseText) { // Get the result and asign to each cases
                if (responseText == 0) {
                    login_result.html('<span>Email or Password Incorrect!</span>');
                }
                else if (responseText == 1) {
                    window.location = "../../profile.html";
                }
                else {
                    alert("Problem with sql query");
                }
            }
        });
    }

    return false;
}
