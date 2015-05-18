var dialog_reservation;
var dialog_booked;
var email;
//var type_global;
//var location_global;
//var guest_global;

function booking() {
    var valid = false;
    var minDate = $("#from").val();
    var maxDate = $("#to").val();

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {  // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            var response = xmlhttp.responseText;

            if (response == 1) {
                dialog_booked.dialog("open");
                dialog_reservation.dialog("close");
            } else {

            }

        }
    }

    xmlhttp.open("GET", "scripts/php/CompleteReservation.php?" +
        "email=" + email +
        "&type=" + $("#type").text() +
        "&location=" + $("#location").text() +
        "&guest=" + $("#guest").text() +
        "&date_ini=" + minDate +
        "&date_end=" + maxDate,
        true);

    xmlhttp.send();

    return valid;
}

function dialog_widget() {

    dialog_reservation = $("#booking-desc").dialog({
        autoOpen: false,
        height: 300,
        width: 400,
        modal: true,
        buttons: {
            "Book it!": booking,
            Cancel: function () {
                dialog_reservation.dialog("close");
            }
        }
    });

    dialog_booked = $("#dialog-message").dialog({
        autoOpen: false,
        modal: true,
        buttons: {
            Ok: function () {
                $(this).dialog("close");
            }
        }
    });
}

function datePicker_widget() {
    $("#from").datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3,
        onClose: function (selectedDate) {
            $("#to").datepicker("option", "minDate", selectedDate);
        }
    });

    $("#to").datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3,
        onClose: function (selectedDate) {
            $("#from").datepicker("option", "maxDate", selectedDate);
        }
    });
}

function showDescReservation(elements, user) {
    var type = elements[0];
    var location = elements[1];
    var guest = elements[2];

    //type_global = type;
    //location_global = location;
    //guest_global = guest;

    var capacity, bathrooms, price, beds, privateBathroom, bedrooms;

    email = user;

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
            var description = xmlDoc.getElementsByTagName("description");

            capacity = description[0].getElementsByTagName("capacity")[0].childNodes[0].nodeValue;
            bathrooms = description[0].getElementsByTagName("bathrooms")[0].childNodes[0].nodeValue;
            price = description[0].getElementsByTagName("price")[0].childNodes[0].nodeValue;

            var html = "<p>Type: " + "<div id='type'>" + type + "</div>" + "</p>" +
                "<p>Guest: " + "<div id='guest'>" + guest + "</div>" + "</p>" +
                "<p>Location: " + "<div id='location'>" + location + "</div>" + "</p>" +
                "<p>Capacity: " + capacity + "</p>";

            if (type == "Room") {
                beds = description[0].getElementsByTagName("beds")[0].childNodes[0].nodeValue;
                privateBathroom = description[0].getElementsByTagName("privateBathrooms")[0].childNodes[0].nodeValue;

                html += "<p>Beds: " + beds + "</p>" +
                "<p>Private bathroom: " + privateBathroom + "</p>";
            } else if (type == "Property") {
                bedrooms = description[0].getElementsByTagName("bedrooms")[0].childNodes[0].nodeValue;
                html += "<p>Bathrooms: " + bathrooms + "</p>";
            }

            html += "<p>Price: " + price + "€</p>";
            $("#reservation-details").html(html);

            $("#from").datepicker("disable");
            $("#to").datepicker("disable");

            dialog_reservation.dialog("open");

            $("#from").datepicker("enable");
            $("#from").datepicker("option", "dateFormat", "yy-mm-dd");
            $("#to").datepicker("enable");
            $("#to").datepicker("option", "dateFormat", "yy-mm-dd");
        }
    }

    xmlhttp.open("GET", "scripts/php/GetDescReservations.php?type=" + type +
    "&location=" + location + "&guest=" + guest, true);
    xmlhttp.send();
}