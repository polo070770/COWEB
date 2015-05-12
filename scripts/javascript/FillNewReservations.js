function fillNewReservations() {

    $("#reservations_header_1").attr("colspan", 3);
    $("#reservations_header_1").html("<strong>Looking for new travels...</strong>");

    var html = "<th>Location</th>" +
        "<th>Guest</th>" +
        "<th>Description</th>";

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
                    html += '<tr class="reservations-table-odd">';
                } else {
                    html += '<tr>';
                }

                var location = rooms[i].getElementsByTagName("location")[0].childNodes[0].nodeValue;
                var guest = rooms[i].getElementsByTagName("guest")[0].childNodes[0].nodeValue;

                html +=
                    "<td>" + location + "</td>" +
                    "<td>" + guest + "</td>" +
                    "<td>Click here to detailed description</td>" +
                    "</tr>";
            }


            $(".reservations-table tbody").html(html);
        }
    }

    xmlhttp.open("GET", "scripts/php/GetNewReservations.php", true);
    xmlhttp.send();

}