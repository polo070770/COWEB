<?php

$xmldoc = new DOMDocument();

$reservations_tag = $xmldoc->createElement("reservations");
$xmldoc->appendChild($reservations_tag);

include("Connection.php");

$link = connect();

$sql = "select ubicacion, anfitrion FROM habitacion;";

$result = mysql_query($sql, $link);

while ($row = mysql_fetch_assoc($result)) {

    $reservation_tag = $xmldoc->createElement("habitacion");
    $reservations_tag->appendChild($reservation_tag);

    $location_value = $xmldoc->createTextNode($row["ubicacion"]);
    $guest_value = $xmldoc->createTextNode($row["anfitrion"]);

    $location_tag = $xmldoc->createElement("location");
    $location_tag->appendChild($location_value);

    $guest_tag = $xmldoc->createElement("guest");
    $guest_tag->appendChild($guest_value);

    $reservation_tag->appendChild($location_tag);
    $reservation_tag->appendChild($guest_tag);

}

$sql = "select ubicacion, anfitrion FROM propiedad;";

$result = mysql_query($sql, $link);

while ($row = mysql_fetch_assoc($result)) {

    $reservation_tag = $xmldoc->createElement("propiedad");
    $reservations_tag->appendChild($reservation_tag);

    $location_value = $xmldoc->createTextNode($row["ubicacion"]);
    $guest_value = $xmldoc->createTextNode($row["anfitrion"]);

    $location_tag = $xmldoc->createElement("location");
    $location_tag->appendChild($location_value);

    $guest_tag = $xmldoc->createElement("guest");
    $guest_tag->appendChild($guest_value);

    $reservation_tag->appendChild($location_tag);
    $reservation_tag->appendChild($guest_tag);

}

$result = mysql_query($sql, $link);

mysql_close($link); // Closing Connection
echo $xmldoc->saveXML();

exit();











