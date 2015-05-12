<?php

$countries[] = "France";
$countries[] = "Finland";
$countries[] = "Germany";
$countries[] = "Greece";
$countries[] = "Italy";
$countries[] = "Ireland";
$countries[] = "Netherlands";
$countries[] = "Norway";
$countries[] = "Spain";
$countries[] = "Sweden";
$countries[] = "United Kingdom";
$countries[] = "Ukraine";

$hints = array();
$country = $_REQUEST["country"];
if ($country !== "") {
    $country = strtolower($country);
    $len = strlen($country);
    foreach ($countries as $name) {
        if (stristr($country, substr($name, 0, $len))) {
            array_push($hints, $name);
        }
    }
}

$xmldoc = new DOMDocument();
$hints_tag = $xmldoc->createElement("hints");
$xmldoc->appendChild($hints_tag);

if (count($hints) == 0){
    #No hints
    $hint_tag = $xmldoc->createElement("hint");
    $hints_tag->appendChild($hint_tag);
    $hint_value = $xmldoc->createTextNode("No hints!");
    $hint_tag->appendChild($hint_value);

}else{

    foreach($hints as $hint){
        $hint_tag = $xmldoc->createElement("hint");
        $hints_tag->appendChild($hint_tag);

        $hint_value = $xmldoc->createTextNode($hint);
        $hint_tag->appendChild($hint_value);
    }

}

echo $xmldoc->saveXML();

exit();