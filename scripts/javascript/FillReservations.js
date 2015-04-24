function completeTable(email_id, table_id) {

    $('#reservations_header_name').html(table_id);

    var getTheReservations = function (email) {
        return $.getJSON("scripts/php/GetReservations.php", {"email": email, "table_id": table_id});
    };

    getTheReservations(email_id).done(function (response) {

        var size = response.size;
        var html = '';

        if (size < 1) {
            html = "You have no current reservations."
            $('tbody').html('<p style="text-align: center">' + html + '</p>')
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
                    '<td>' + response[i].ubicacion + '</td>' +
                    '<td>' + response[i].anfitrion + '</td>' +
                    '<td>From ' + response[i].fecha_ini + ' until ' + response[i].fecha_fin + '</td>' +
                    '<td>' + response[i].descripcion + '</td>' +
                    '</tr>';

                i++;
            }

            $('.reservations-table tbody').html(html);
        }
    });

}