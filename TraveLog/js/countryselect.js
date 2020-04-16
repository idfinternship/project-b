var container = document.getElementById("globalArea");
var controller = new GIO.Controller(container);

// use the onCountryPicked() to set callback when clicked country changed

controller.onCountryPicked(callback);

// the callback function can get parameter contains some country data, the detailed of the parameter can be found in the API document

function callback(selectedCountry) {

    $("#countryArea").text(selectedCountry.name + " picked!");
    $("#infoBoard").fadeIn(1000);

    testfunction(selectedCountry.name);

    setTimeout(function() {

        // $( "#infoBoard" ).fadeOut( 1000 );
        $("#infoBoard");

    }, 1000);

}

$.ajax({

    url: "data/sampleData.json",
    type: "GET",
    contentType: "application/json; charset=utf-8",
    async: true,
    dataType: "json",
    success: function(inputData) {

        //controller.addData( inputData );
        controller.init();
    }

});

function testfunction(name) {
    $.ajax({
        url: "Duombaze.php",
        type: "POST",
        data: {
            'countryname': name,
        },
        success: function(inputData) {
            let testas = document.getElementById("testas");
            testas.innerHTML = null; // keičia duomenis kitos valstybės
            if (inputData.search("nulis") != -1)
                testas.insertAdjacentText("beforeend", "no matches found"); // jeigu duombazėje nėra duomenų
            else {
                let test = JSON.parse(inputData);
                for (var i = 0; i < test.length; i++) {
                    testas.insertAdjacentHTML("beforeend", "<tr>  <td>" + test[i].price + "</td><td>" + test[i].duration + "</td></tr>");
                }
            }
        }
    });

}