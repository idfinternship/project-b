var container = document.getElementById("globalArea");
var controller = new GIO.Controller(container);
controller.setInitCountry("LT");
// use the onCountryPicked() to set callback when clicked country changed

controller.onCountryPicked(callfirst);

$("#button_1").click(function(e) {
e.preventDefault();
document.getElementById("myInput").defaultValue = 0;
var inputVal = document.getElementById("myInput").value;
$("#testas").load(window.location + " #testas");
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
    
    $.ajax({
        url: "Duombaze2.php",
        type: "POST",
        data: {
            'inputID': ID,
        },
        success: function(inputData) {
                let test = JSON.parse(inputData);
            }
        })
        
}

function callfirst(selectedCountry)
{
    $("#countryChosen").text("Chosen country: " +selectedCountry.name);
    $("#infoFilter").fadeIn(1000)
    $("#countryFilter").text("Select filters:");

    setTimeout(function() {
        $("#infoFilter");

    }, 1000);
    localStorage.setItem('CountryName', selectedCountry.name); // sukuriamas lokalus kintamasis šalies pavadinimui
    let testas = document.getElementById("testas"); // gauna elementą pagal jo ID
    testas.innerHTML = null; // keičia duomenis kitos valstybės
    document.getElementById("textbox").style.display = 'none'; // paslepia paieškos laukus
    document.getElementById("search").style.display = 'none';  // paslepia paieškos laukus
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