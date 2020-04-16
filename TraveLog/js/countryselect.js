var container = document.getElementById("globalArea");
var controller = new GIO.Controller(container);
controller.setInitCountry("LT");
// use the onCountryPicked() to set callback when clicked country changed

controller.onCountryPicked(callfirst);

$("#button_1").click(function(e) {
e.preventDefault();
document.getElementById("myInput").defaultValue = 0;
var inputVal = document.getElementById("myInput").value;
$("#testas").text("")//.load(window.location + " #testas");

//
$.ajax({
    url: "Duombaze.php",
    type: "POST",
    data: {
        'inputValue': localStorage.getItem('CountryName'),
        'inputKaina': inputVal,
    },
    success: function(inputData) {

            document.getElementById("button_1").onclick = null;
        let testas = document.getElementById("testas");
           if (inputData.search("nulis") != -1) {
               testas.insertAdjacentText("beforeend", "no matches found"); // jeigu duombazėje nėra duomenų apie šalį;
           }
           else {

               let test = JSON.parse(inputData);
               for (var i = 0; i < test.length; i++) {
                   testas.insertAdjacentHTML("beforeend", "<tr> <td align='left'> <button onClick='myScript("+ test[i].ID +")'>" + test[i].name + " </button></td><td>"
                    + test[i].duration + "</td> <td align='left'>" + test[i].rating +"</td></tr>");
                }
            }
        }
    })
});

function myScript(ID)
{
    $('#testas').fadeOut(1);
    $('#button_1').fadeOut(1);
    $('#myInput').fadeOut(1);
    $("#countryChosen").fadeOut(1);
    $("#infoFilter").fadeIn(1000);
    $('#testas').fadeIn(1);
    document.getElementById("infoTHead").innerHTML ="<tr><th>Check In</th><th>Price</th><th>Link</th></tr>";
    $.ajax({
        url: "Duombaze2.php",
        type: "POST",
        data: {
            'inputID': ID,
        },
        success: function(inputData) {
                document.getElementById("button_1").onclick = null;
                document.getElementById("testas").innerText = "";

                let testas = document.getElementById("testas");
                let test = JSON.parse(inputData);
                $("#countryFilter").text(test[0 ].name);
                for (var i = 0; i < test.length; i++) {
                    testas.insertAdjacentHTML("beforeend", "<tr> <td align='left'> " 
                    + test[i].checkIn + "</td> <td align='left'>" 
                    + test[i].price+ 
                    "</td> <td align='left'>"+ "<a href="+test[i].link +"class="+"button"+" target="+"_blank"+" >Click Here</a>"+"</td></tr>");
                 }
            }
        })
        
}

function callfirst(selectedCountry)
{
    $("#countryChosen").text("Chosen country: " +selectedCountry.name);
    $("#infoFilter").fadeIn(1000)
    $("#countryFilter").text("Select filters:");
    document.getElementById("infoTHead").innerHTML ="<tr><th>Destination name</th><th>Duration</th><th>Rating</th></tr>";
    setTimeout(function() {
        $("#infoFilter");

    }, 1000);
    localStorage.setItem('CountryName', selectedCountry.name); // sukuriamas lokalus kintamasis šalies pavadinimui
    document.getElementById("testas").innerText = ""; // gauna elementą pagal jo ID
    document.getElementById("textbox").style.display = 'none'; // paslepia paieškos laukus
    document.getElementById("search").style.display = 'none';  // paslepia paieškos laukus
    $('#button_1').fadeIn(1000);
    $('#myInput').fadeIn(1000);
    $("#countryChosen").fadeIn(1);
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