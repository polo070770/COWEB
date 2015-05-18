<?php

// get variables
$email = isset($_GET['email']) ? $_GET ['type'] : "nomail";
$type = isset($_GET ['type']) ? $_GET ['type'] : 'notype';
$location = isset($_GET['location']) ? $_GET['location'] : 'nolocation';
$guest = isset($_GET['guest']) ? $_GET['guest'] : 'noguest';
$data_ini = isset($_GET['data_ini']) ? $_GET['data_ini'] : "nodataini";
$data_end = isset($_GET['data_end']) ? $_GET['data_end'] : "nodataend";

echo $email . " " . $type . " " . $location . " " . $guest . " " . $data_ini . " " . $data_end;