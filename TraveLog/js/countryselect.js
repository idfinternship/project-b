
var container = document.getElementById( "globalArea" );
var controller = new GIO.Controller( container );

// use the onCountryPicked() to set callback when clicked country changed

controller.onCountryPicked( callback );

// the callback function can get parameter contains some country data, the detailed of the parameter can be found in the API document

function callback ( selectedCountry ) {
    
    $( "#countryArea" ).text( selectedCountry.name + " picked!" );
    $( "#infoBoard" ).fadeIn( 1000 );

    setTimeout( function () {

        // $( "#infoBoard" ).fadeOut( 1000 );
        $("#infoBoarad");

    }, 3000 );

}

$.ajax( {

    url: "data/sampleData.json",
    type: "GET",
    contentType: "application/json; charset=utf-8",
    async: true,
    dataType: "json",
    success: function ( inputData ) {

        //controller.addData( inputData );
        controller.init();


    }

} );
