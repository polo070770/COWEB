function getCountry(str) {

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {  // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    var availableTags = [];

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            xmlDoc = $.parseXML(xmlhttp.responseText);

            var hints = xmlDoc.getElementsByTagName("hint");

            for (var i = 0; i < hints.length; i++) {
                var hint = hints[i].childNodes[0].nodeValue;
                availableTags.push(hint);
            }
        }
    }

    xmlhttp.open("GET", "scripts/php/GetCountry.php?country=" + str, true);
    xmlhttp.send();

    $("#country_list").autocomplete({
        source: availableTags
    });

}