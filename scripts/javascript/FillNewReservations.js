function fillNewReservations() {

    $("#reservations_header_1").html("<th colspan='3'><strong>Looking for new travels...</strong></th>");

    var html = "<th>Type</th>" +
        "<th>Location</th>" +
        "<th>Guest</th>";

    $("#reservations_header_2").html(html);

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {  // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            xmlDoc = $.parseXML(xmlhttp.responseText);

            var html = "";
            var rooms = xmlDoc.getElementsByTagName("habitacion");
            for (var i = 0; i < rooms.length; i++) {

                if (i % 2 === 0) {
                    // es par
                    html += '<tr class="reservations-table-odd clickable-row">';
                } else {
                    html += '<tr class="clickable-row">';
                }

                var location = rooms[i].getElementsByTagName("location")[0].childNodes[0].nodeValue;
                var guest = rooms[i].getElementsByTagName("guest")[0].childNodes[0].nodeValue;

                html +=
                    "<td>Room</td>" +
                    "<td>" + location + "</td>" +
                    "<td>" + guest + "</td>" +
                    "</tr>";

            }

            var properties = xmlDoc.getElementsByTagName("propiedad");
            for (var i = 0; i < properties.length; i++) {

                if (i % 2 === 0) {
                    // es par
                    html += '<tr class="reservations-table-odd clickable-row">';
                } else {
                    html += '<tr class="clickable-row">';
                }

                var location = properties[i].getElementsByTagName("location")[0].childNodes[0].nodeValue;
                var guest = properties[i].getElementsByTagName("guest")[0].childNodes[0].nodeValue;

                html +=
                    "<td>Property</td>" +
                    "<td>" + location + "</td>" +
                    "<td>" + guest + "</td>" +
                    "</tr>";

            }

            $(".reservations-table tbody").html(html);
        }
    }

    xmlhttp.open("GET", "scripts/php/GetNewReservations.php", true);
    xmlhttp.send();

}