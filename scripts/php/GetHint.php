<?php

$countries[] = "Spain";
$countries[] = "France";

$cities_spain[] = "Barcelona";
$cities_spain[] = "Madrid";

$cities_france[] = "Paris";
$cities_france[] = "Marsella";

// get the q parameter from URL
$country = $_REQUEST["country"];
$city = $_REQUEST["city"];

$hint = "";

if ($city === "") {
    if ($country !== "") {
        $country = strtolower($country);
        $len = strlen($country);
        foreach ($countries as $name) {
            if (stristr($country, substr($name, 0, $len))) {
                if ($hint === "") {
                    $hint = $name;
                } else {
                    $hint .= ", $name";
                }
            }
        }
    }
} else {
    $country = strtolower($country);
    if ($country === "spain") {

        $city = strtolower($city);
        $len = strlen($city);
        foreach ($cities_spain as $name) {
            if (stristr($city, substr($name, 0, $len))) {
                if ($hint === "") {
                    $hint = $name;
                } else {
                    $hint .= ", $name";
                }
            }
        }
    } else if ($country === "france") {
        $city = strtolower($city);
        $len = strlen($city);
        foreach ($cities_france as $name) {
            if (stristr($city, substr($name, 0, $len))) {
                if ($hint === "") {
                    $hint = $name;
                } else {
                    $hint .= ", $name";
                }
            }
        }
    }
}

echo $hint === "" ? "No suggestion" : $hint;
?>

