function completeForm(id) {

    var getDetails = function (email) {
        return $.getJSON("scripts/php/CompleteProfile.php", {"email": email});
    };

    getDetails(id).done(function (response) {

        $("input[name='name']").val(response.name);
        $("input[name='firstsurname']").val(response.first_surname);
        $("input[name='secondsurname']").val(response.second_surname);
        $("input[name='country']").val(response.country);
        $("input[name='city']").val(response.city);

        if (response.gender === "male") {
            $("input[name='gender_m']").prop('checked', true);
        } else {
            $("input[name='gender_f']").prop('checked', true);
        }

        $("input[name='email']").val(response.email);

    });

}