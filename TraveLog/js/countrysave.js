var container = document.getElementById("globalArea");
var controller = new GIO.Controller(container);
var countries = new Array();
controller.setInitCountry("LT"); // use the onCountryPicked() to set callback when clicked country changed
controller.onCountryPicked(callfirst);

function callfirst(selectedCountry)
{	
	console.log(countries.includes(selectedCountry));
	var index = -1;
	for(var i = 0; i < countries.length; i++) {
	    if (countries[i].name == selectedCountry.name) {
	        index = i;
	        break;
	    }
	}
	if(index < 0){
		countries.push(selectedCountry);
	}
	else{
		countries.splice(index, 1);
	}

	console.log(selectedCountry);
	$("#selectedList").fadeIn(1000);
    document.getElementById("testas").innerText = ''; // gauna elementą pagal jo ID


    $('#infoTHead').fadeIn(10);
	let testas = document.getElementById("testas");
    for (var i = 0; i < countries.length; i++) {
    	testas.insertAdjacentHTML("beforeend", "<tr> <td align='left' class='align-middle'> <p>" + countries[i].name 
    		+ " </p></td></tr>");
    }
}


$( "#saveCountries" ).click( function () {
	var json = JSON.stringify(countries);
	console.log(json);
    $.post('save_countries.php', {json: json}).done(function() {
    	console.log( "success" );
  	});
} );

$.ajax({

    url: "data/sampleData.json",
    type: "GET",
    contentType: "application/json; charset=utf-8",
    async: true,
    dataType: "json",
    success: function(inputData) {
        controller.init();
        //gražina gio.js informaciją apie šalis
    }
});