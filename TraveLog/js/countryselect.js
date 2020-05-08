var container = document.getElementById("globalArea");
var controller = new GIO.Controller(container);
controller.setInitCountry("LT"); // use the onCountryPicked() to set callback when clicked country changed
controller.onCountryPicked(callfirst);

$("#button_1").click(function(e) {
    e.preventDefault();
    Iskvietimas();
    });

$("#button_2").click(function(e) {
    e.preventDefault();
    $("#filter").fadeIn(1000);
});

$("#button_3").click(function(e) {
    e.preventDefault();
    $("#individualfilter").fadeIn(1000);
});

$("#button_4").click(function(e) {
    e.preventDefault();
    var price1 = localStorage.getItem('priceFilter0');
    var price2 = localStorage.getItem('priceFilter1');
    var ID = localStorage.getItem('inputID');
    var Laikas = localStorage.getItem('Laikas');
    var LaikasOut = localStorage.getItem('LaikasOut');
   // $('#testas').fadeOut(1);
   // $("#infoFilter").fadeIn(1000);
   // $('#testas').fadeIn(1000);
   // document.getElementById("button_2").style.display = 'none';
  //  $('#infoTHead').fadeIn(1);
  //  document.getElementById("button_3").style.display = '';
  //  document.getElementById("infoTHead").innerHTML ="<tr><th><font size='4' color='#ff0000'>Check In</font></th><th>Check Out</th><th>Price</th><th>Before price</th><th>Savings</th><th>Link</th></tr>";
    $.ajax({
        url: "Duombaze2.php",
        type: "POST",
        data: {
            'inputID': ID,
            'priceFilter0': price1,
            'priceFilter1': price2,
            'checkIn': Laikas,
            'checkOut': LaikasOut,
        },
        success: function(inputData) {
                document.getElementById("button_4").onclick = null;
                document.getElementById("testas").innerText = "";
                let testas = document.getElementById("testas");
                let test = JSON.parse(inputData);
                 for (var i = 0; i < test.length; i++) {
                     if (!test[i].beforePrice){ //gražina false jeigu yra bent kažkokia reikšmė
                         test[i].beforePrice = "-";
                         test[i].savings = "-";
                     }
                    testas.insertAdjacentHTML("beforeend", "<tr> <td align='left'> " 
                    + test[i].checkIn + "</td> <td>" + test[i].checkOut + "</td><td>" + test[i].price +"</td><td align='left'>" + test[i].beforePrice + 
                    "</td><td>" + test[i].savings + "</td><td align='left'><a href="+test[i].link +"class='button' target='blank' >Click Here</a></td></tr>");
                 }
            }
        })      
});

function Iskvietimas()
{
    $("#stiliukas").fadeOut(1000);
    document.getElementById("infoTHead").innerHTML ="<tr><th>Destination name</th><th>Duration (days)</th><th>Rating</th></tr>"; // lentelių pavadinimo vardai
    var rating1 = localStorage.getItem('ratingFilter0');
    var rating2 = localStorage.getItem('ratingFilter1');
    var duration1 = localStorage.getItem('DurationFilter0');
    var duration2 = localStorage.getItem('DurationFilter1'); // lokalūs kintamieji 
    rating1.defaultValue = 1;
    rating2.defaultValue = 5;
    duration1.defaultValue = 1;
    duration2.defaultValue = 20;
    $('#infoTHead').fadeIn(10);
    $("#testas").text("");
    $.ajax({
        url: "Duombaze.php",
        type: "POST",
        data: {
            'inputValue': localStorage.getItem('CountryName'),
            'reitingas': rating1,
            'reitingas1': rating2,
            'DurationFilter0': duration1,
            'DurationFilter1': duration2,
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
                       testas.insertAdjacentHTML("beforeend", "<tr> <td align='left' class='align-middle'> <p class='textid' onClick='myScript("+ test[i].ID +")'>"
                        + test[i].name + " </p></td><td>" + test[i].duration + "</td> <td>" + test[i].rating +"</td></tr>");
                    }
                }
            }
        })
}

function myScript(ID)
{
    localStorage.setItem('inputID', ID);
    $('#testas').fadeOut(1);
    $("#infoFilter").fadeIn(1000);
    $('#testas').fadeIn(1000);
    document.getElementById("button_2").style.display = 'none';
    $('#infoTHead').fadeIn(1);
    document.getElementById("button_3").style.display = '';
    document.getElementById("infoTHead").innerHTML ="<tr><th><font size='4' color='#ff0000'>Check In</font></th><th>Check Out</th><th>Price</th><th>Before price</th><th>Savings</th><th>Link</th></tr>";
    var price1 = localStorage.getItem('priceFilter0');
    var price2 = localStorage.getItem('priceFilter1');
    $.ajax({
        url: "Duombaze2.php",
        type: "POST",
        data: {
            'inputID': ID,
            'priceFilter0': price1,
            'priceFilter1': price2,
        },
        success: function(inputData) {
                document.getElementById("button_1").onclick = null;
                document.getElementById("testas").innerText = "";
                let testas = document.getElementById("testas");
                let test = JSON.parse(inputData);
                for (var i = 0; i < test.length; i++) {
                    if (!test[i].beforePrice){ //gražina false jeigu yra bent kažkokia reikšmė
                        test[i].beforePrice = "-";
                        test[i].savings = "-";
                    }
                    testas.insertAdjacentHTML("beforeend", "<tr> <td align='left'> " 
                    + test[i].checkIn + "</td> <td>" + test[i].checkOut + "</td><td>" + test[i].price +"</td><td align='left'>" + test[i].beforePrice + 
                    "</td><td>" + test[i].savings + "</td><td align='left'><button onClick='window.open(autoLogIn(\""+ test[i].listingID +"\",\""+ test[i].oDate +"\"))'>Click Me</button></td></tr>");
                 }
            }
        })      
}

function autoLogIn(un, pw) {
    var form = document.createElement("form");
    var element1 = document.createElement("input"); 
    var element2 = document.createElement("input"); 
    var element3 = document.createElement("input"); 
    var element4 = document.createElement("input"); 
    var element5 = document.createElement("input"); 
    var element6 = document.createElement("input"); 
    var element7 = document.createElement("input"); 
    var element8 = document.createElement("input"); 
    var element9 = document.createElement("input"); 
    var element10 = document.createElement("input");  
    var element11 = document.createElement("input");
    var element12 = document.createElement("input");
    var element13 = document.createElement("input");

    form.method = "POST";
    form.action = "https://www.novaturas.lt/paieska/index/step3/start2checkout"; 
    form.target="_blank" ; 
    element1.type="hidden";
    element1.name="id";
    element1.value=un;
    form.appendChild(element1);  
    element2.type="hidden";
    element2.name="o_data";
    element2.value=pw;
    form.appendChild(element2);
    element4.type="hidden";
    element4.name="childs";
    element4.value="";
    form.appendChild(element4);
    element5.type="hidden";
    element5.name="child_age";
    element5.value="";
    form.appendChild(element5);
    element6.type="hidden";
    element6.name="adults";
    element6.value=1;
    form.appendChild(element6);
    element7.type="hidden";
    element7.name="checkin";
    element7.value="";
    form.appendChild(element7);
    element8.type="hidden";
    element8.name="offer_id";
    element8.value="";
    form.appendChild(element8);
    element9.type="hidden";
    element9.name="hotel";
    element9.value="";
    form.appendChild(element9);
    element10.type="hidden";
    element10.name="nights";
    element10.value="";
    form.appendChild(element10);
    element11.type="hidden";
    element11.name="room";
    element11.value="";
    form.appendChild(element11);
    element12.type="hidden";
    element12.name="accomodation";
    element12.value="";
    form.appendChild(element12);
    element13.type="hidden";
    element13.name="board";
    element13.value="";
    form.appendChild(element13);

    document.body.appendChild(form);
    form.submit();
}

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