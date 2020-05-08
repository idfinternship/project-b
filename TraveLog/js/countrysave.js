var container = document.getElementById("globalArea");
var controller = new GIO.Controller(container);
controller.setInitCountry("LT"); // use the onCountryPicked() to set callback when clicked country changed
controller.onCountryPicked(callfirst);

function callfirst(selectedCountry)
{
    $("#countryChosen").text(selectedCountry.name);
    $("#infoFilter").fadeIn(1000);
    $('#button_2').fadeIn(1000);
    $('#infoTHead').fadeOut(1);
    setTimeout(function() {
        $("#infoFilter");
    }, 1000);
    localStorage.setItem('CountryName', selectedCountry.name); // sukuriamas lokalus kintamasis šalies pavadinimui
    document.getElementById("testas").innerText = ''; // gauna elementą pagal jo ID
    document.getElementById("textbox").style.display = 'none'; // paslepia paieškos laukus
    document.getElementById("search").style.display = 'none';  // paslepia paieškos laukus
    document.getElementById("button_3").style.display = 'none';
    $('#button_1').fadeIn(1000);
    Iskvietimas();
}