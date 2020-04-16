$( "#search" ).click( function () {

    // use the switchCountry() API to directly change the clicked country without clicked on the surface
    var countrydata = document.getElementById("textbox").value;
    controller.switchCountry( countrydata );
    //controller.switchCountry( "LT" );
} );