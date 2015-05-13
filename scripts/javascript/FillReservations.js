function completeTable(email_id, table_id) {

    $("#reservations_header_1").html("<th colspan='4'><strong>" + table_id + "</strong></th>");

    var html = "<th>Location</th>" +
        "<th>Guest</th>" +
        "<th>Date</th>" +
        "<th>Description</th>";

    $("#reservations_header_2").html(html);

    var getTheReservations = function (email) {
        return $.getJSON("scripts/php/GetReservations.php", {"email": email, "table_id": table_id});
    };

    getTheReservations(email_id).done(function (response) {

        var size = response.size;
        var html = '';

        if (size < 1) {
            html = "'<tr class='reservations-table-odd' >" +
            "<td colspan='4' align='center'>You have no current reservations.</td>" +
            "</tr>";
            $("tbody").html(html);
        } else {
            var i = 0;
            while (i < size) {

                if (i % 2 === 0) {
                    // es par
                    html += '<tr class="reservations-table-odd">';
                } else {
                    html += '<tr>';
                }

                html +=
                    "<td>" + response[i].ubicacion + "</td>" +
                    "<td>" + response[i].anfitrion + "</td>" +
                    "<td>From " + response[i].fecha_ini + " until " + response[i].fecha_fin + "</td>" +
                    "<td>Click here to detailed description</td>" +
                    "</tr>";

                i++;
            }

            $(".reservations-table tbody").html(html);
        }
    });

}