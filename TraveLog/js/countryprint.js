var countries = new Array();
getCountries();

function printCountries(){
	console.log(countries.length);
	let testas = document.getElementById("testas");
	testas.innerText = '';
    for (var i = 0; i < countries.length; i++) {
    	testas.insertAdjacentHTML("beforeend", "<tr> <td align='left' class='align-middle' class='th-lg'> <p>" + countries[i].name 
    		+ " </p></td></tr>");
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