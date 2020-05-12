var container = document.getElementById("globalArea");
var controller = new GIO.Controller(container);
controller.setInitCountry("LT"); // use the onCountryPicked() to set callback when clicked country changed
controller.setStyle("blueInk");
var countries = new Array();
getCountries();

controller.onCountryPicked(callfirst);

function callfirst(selectedCountry)
{	
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

    printCountries();
}

function printCountries(){

	let testas = document.getElementById("testas");
	testas.innerText = '';
    for (var i = 0; i < countries.length; i++) {
    	testas.insertAdjacentHTML("beforeend", "<tr> <td align='left' class='align-middle' class='th-lg'> <p>"
    		+ countries[i].name + " </p></td></tr>");
    }
    if(countries.length == 0){
    	testas.insertAdjacentHTML("beforeend", "<tr> <td align='left' class='align-middle' class='th-lg'> <p> You haven\'t selected any countries. </p></td></tr>");
    }
}

function getCountries(){
	$.getJSON('get_countries.php', function(e){
		for(var i = 0; i < e.length; i++){
			countries.push(e[i]);
		}
	})
	.always(function(){
		printCountries();
	});
}


$( "#saveCountries" ).click( function () {
	var json = JSON.stringify(countries);
	console.log(json);
    $.post('save_countries.php', {json: json}).done(function() {
    	var successmsg = document.getElementsByClassName('alert-dismissible2')[0];
    	successmsg.style.display = "block";
  	});
} );

$.ajax({

    url: "data/selectionJSON.json",
    type: "GET",
    contentType: "application/json; charset=utf-8",
    async: true,
    dataType: "json",
    success: function(inputData) {
    	//controller.addData( inputData );
        controller.init();
    }
});