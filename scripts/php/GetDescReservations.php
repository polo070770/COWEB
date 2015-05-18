<?php

$xmldoc = new DOMDocument();

$reservation_tag = $xmldoc->createElement("reservations");
$xmldoc->appendChild($reservation_tag);

include("Connection.php");

// database connect
$link = connect();

// get variables
$type = isset($_GET ['type']) ? $_GET ['type'] : 'notype';
$location = isset($_GET['location']) ? $_GET['location'] : 'nolocation';
$guest = isset($_GET['guest']) ? $_GET['guest'] : 'noguest';

if ($type == "Room") {

    $sql = "select capacidad, camas, banyos, banyo_privado, precio from habitacion where ubicacion='$location' and anfitrion='$guest'";

    $result = mysql_query($sql, $link);

    while ($row = mysql_fetch_assoc($result)) {

        $description_tag = $xmldoc->createElement("description");
        $reservation_tag->appendChild($description_tag);

        $capacity_value = $xmldoc->createTextNode($row["capacidad"]);
        $bedroom_value = $xmldoc->createTextNode($row["camas"]);
        $bathrooms_value = $xmldoc->createTextNode($row["banyos"]);
        $privateBathroom_value = $xmldoc->createTextNode($row["banyo_privado"]);
        $price_value = $xmldoc->createTextNode($row["precio"]);

        $capacity_tag = $xmldoc->createElement("capacity");
        $capacity_tag->appendChild($capacity_value);

        $bedroom_tag = $xmldoc->createElement("beds");
        $bedroom_tag->appendChild($bedroom_value);

        $bathrooms_tag = $xmldoc->createElement("bathrooms");
        $bathrooms_tag->appendChild($bathrooms_value);

        $privateBathroom_tag = $xmldoc->createElement("privateBathrooms");
        $privateBathroom_tag->appendChild($privateBathroom_value);

        $price_tag = $xmldoc->createElement("price");
        $price_tag->appendChild($price_value);

        $description_tag->appendChild($capacity_tag);
        $description_tag->appendChild($bedroom_tag);
        $description_tag->appendChild($bathrooms_tag);
        $description_tag->appendChild($privateBathroom_tag);
        $description_tag->appendChild($price_tag);

    }

} else if ($type == "Property") {

    $sql = "select capacidad, dormitorios, banyos, precio from propiedad
where ubicacion='$location' and anfitrion='$guest'";

    $result = mysql_query($sql, $link);

    while ($row = mysql_fetch_assoc($result)) {

        $description_tag = $xmldoc->createElement("description");
        $reservation_tag->appendChild($description_tag);

        $capacity_value = $xmldoc->createTextNode($row["capacidad"]);
        $bedroom_value = $xmldoc->createTextNode($row["dormitorios"]);
        $bathrooms_value = $xmldoc->createTextNode($row["banyos"]);
        $price_value = $xmldoc->createTextNode($row["precio"]);

        $capacity_tag = $xmldoc->createElement("capacity");
        $capacity_tag->appendChild($capacity_value);

        $bedroom_tag = $xmldoc->createElement("bedrooms");
        $bedroom_tag->appendChild($bedroom_value);

        $bathrooms_tag = $xmldoc->createElement("bathrooms");
        $bathrooms_tag->appendChild($bathrooms_value);

        $price_tag = $xmldoc->createElement("price");
        $price_tag->appendChild($price_value);

        $description_tag->appendChild($capacity_tag);
        $description_tag->appendChild($bedroom_tag);
        $description_tag->appendChild($bathrooms_tag);
        $description_tag->appendChild($price_tag);

    }

}

mysql_close($link); // Closing Connection

echo $xmldoc->saveXML();

exit();