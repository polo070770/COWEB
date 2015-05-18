var dialog;

function preparateBookingDialog(){

     dialog = $("#booking-form").dialog({
        autoOpen: false,
        height: 300,
        width: 350,
        modal: true,
        buttons: {
            "Book it!": null,
            Cancel: function () {
                dialog.dialog("close");
            }
        },
        close: function () {
            form[0].reset();
            allFields.removeClass("ui-state-error");
        }
    });


}

function showDescReserveration(elements) {



    var type = elements[0];
    var location = elements[1];
    var guest = elements[2];


    dialog.dialog("open");

}