function showHint(str) {

    if (str.length === "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        
        // 4: request finished and response is ready
        // 200: "OK"

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
        }

    };

    xmlhttp.open("GET", "http://localhost/scripts/php/GetHint.php?q=" + str, true);
    xmlhttp.send();
}