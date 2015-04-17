function showHint(str) {

    // Does the element have focus:
    var country_hasFocus = $("input[name='country']").is(':focus');
    var city_hasFocus = $("input[name='city']").is(':focus');

    if (country_hasFocus) {
        if (str.length === 0) {
            $('#txtHint_country').html('');
            return;
        } else {

            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function () {

                // 4: request finished and response is ready
                // 200: "OK"

                if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                    $("input[name='city']").val("");
                    $('#txtHint_city').html('');
                    $('#txtHint_country').html(xmlhttp.responseText);
                }

            };

            xmlhttp.open("GET", "http://localhost/scripts/php/GetHint.php?country=" + str + "&city=", true);
            xmlhttp.send();
        }
    } else if (city_hasFocus) {
        var country = $("input[name='country']").val();

        if (country === "") {
            $('#txtHint_city').html('<p style="color:red"">Please, select a country first.</p>');
            return;
        } else {

            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function () {

                // 4: request finished and response is ready
                // 200: "OK"

                if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                    $('#txtHint_city').html(xmlhttp.responseText);
                }

            };

            xmlhttp.open("GET", "http://localhost/scripts/php/GetHint.php?country=" + country + "&city=" + str, true);
            xmlhttp.send();

        }
    }
}