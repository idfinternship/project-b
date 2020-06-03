var container = document.getElementById("globalArea");
var controller = new GIO.Controller(container);
controller.setTransparentBackground( true );
controller.lightenMentioned(true);
controller.adjustMentionedBrightness(0.5);
controller.setInitCountry("LT"); // pirminė šalis
controller.onCountryPicked(callfirst); // pirmas iškviečiamas metodas

$("#button_1").click(function(e) { // metodas, kuris iškviečia listing'us, nustačius filtrus;
    e.preventDefault();
    Iskvietimas();
    });

$("#button_2").click(function(e) { // metodas, sukuriantis mygtuką, kuris iškviečia paprastų listing filtrų lentelę (div'ą);
    e.preventDefault();
    $("#filter").fadeIn(1000);
});

$("#button_3").click(function(e) { // metodas, sukuriantis mygtuką, kuris iškviečia individual listing filtrų  lentelę (div'ą);
    e.preventDefault();
    $("#individualfilter").fadeIn(1000);
});

$("#button_4").click(function(e) { // metodas, kuris iškviečia listing'us, nustačius filtrus individual listingam;
    e.preventDefault();
    IskvietimasIndividual();    
});

function IskvietimasIndividual(){
    var price1 = localStorage.getItem('priceFilter0');
    var price2 = localStorage.getItem('priceFilter1');
    var Laikas = localStorage.getItem('Laikas');
    var LaikasOut = localStorage.getItem('LaikasOut');
    var ID = localStorage.getItem('inputID'); // lokalūs kintamieji
    if (!price1) // gražina false jeigu yra kokia nors reikšmė
    {
        price1 = 10;
    }
    if (!price2) // gražina false jeigu yra kokia nors reikšmė
    {
        price2 = 5000;
    }
    if (!Laikas) // gražina false jeigu yra kokia nors reikšmė
    {
        Laikas = "2010-05-05"; 
    }
    if (!LaikasOut) // gražina false jeigu yra kokia nors reikšmė
    {
        LaikasOut = "2040-05-05";
    }
    console.log(Laikas);
    console.log(LaikasOut);
    console.log(price1);
    console.log(price2);
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
            console.log(inputData);
                document.getElementById("testas").innerText = ""; // nedubliuoja duomenų
                let testas = document.getElementById("testas");
                if (inputData.search("nulis") != -1) {
                    testas.insertAdjacentText("beforeend", "no matches found"); // jeigu duombazėje nėra duomenų apie šalį;
                } else{
                    let test = JSON.parse(inputData);
                 for (var i = 0; i < test.length; i++) {
                     if (!test[i].beforePrice){ //gražina false jeigu yra bent kažkokia reikšmė
                         test[i].beforePrice = "-";
                         test[i].savings = "-";
                     }
                     testas.insertAdjacentHTML("beforeend", "<tr> <td> " 
                     + test[i].checkIn + "</td> <td>" + test[i].checkOut + "</td><td>" + test[i].price +"</td><td>" + test[i].beforePrice + 
                     "</td><td>" + test[i].savings + "</td><td><button onClick='window.open(autoLogIn(\""+ test[i].listingID +"\",\""+ test[i].oDate +"\"))'>Click Me</button></td></tr>");
                 }
                }
            }
        })      
}


function Iskvietimas() // metodas, naudojamas išvesti lenteles be jokių filtrų;
{
    document.getElementById("infoTHead").innerHTML ="<tr><th>Destination name</th><th>Duration (days)</th><th>Rating</th></tr>"; // lentelių pavadinimo vardai
    var rating1 = localStorage.getItem('ratingFilter0');
    var rating2 = localStorage.getItem('ratingFilter1');
    var duration1 = localStorage.getItem('DurationFilter0');
    var duration2 = localStorage.getItem('DurationFilter1'); // lokalūs kintamieji 

    if (!duration1)
    {
        duration1 = 1;
    }
    if (!duration2)
    {
        duration1 = 20;
    }
    if (!rating1)
    {
        rating1 = 1;
    }
    if (!rating2)
    {
        rating2 = 5;
    }

    $('#infoTHead').fadeIn(10); // iškviečia lentelės esybių pavadinimus;
    $("#testas").text(""); // nedubliuoja duomenų;
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
                let testas = document.getElementById("testas");
               if (inputData.search("nulis") != -1) {
                testas.insertAdjacentHTML("beforeend", "<td colspan='3'>no matches found </td>"); // jeigu duombazėje nėra duomenų apie šalį;
               }
               else {
                   let test = JSON.parse(inputData);
                   for (var i = 0; i < test.length; i++) {
                    testas.insertAdjacentHTML("beforeend", "<tr> "+"<td><div class="+"button"+">"
                    +" <p class='textid' onClick='myScript("+ test[i].ID +")'>"
                     + test[i].name + " </p>"+" <figure><img src="+test[i].image+" width='400' height='300' alt='photo'></figure> </div>"+"</td><td>" + test[i].duration + "</td> <td>" + test[i].rating +"</td></tr>");
                 }
                }
            }
        })
}

function myScript(ID) // metodas, kuris išveda lentele individual listing'ų.
{
    var price1 = localStorage.getItem('priceFilter0');
    var price2 = localStorage.getItem('priceFilter1');
    var Laikas = localStorage.getItem('Laikas');
    var LaikasOut = localStorage.getItem('LaikasOut');
    if (!price1) // gražina false jeigu yra kokia nors reikšmė
    {
        price1 = 10;
    }
    if (!price2) // gražina false jeigu yra kokia nors reikšmė
    {
        price2 = 5000;
    }
    if (!Laikas) // gražina false jeigu yra kokia nors reikšmė
    {
        Laikas = "2010-05-05";
    }
    if (!LaikasOut) // gražina false jeigu yra kokia nors reikšmė
    {
        LaikasOut = "2040-05-05";
    }
    document.getElementById("infoTHead").innerHTML ="<tr><th>Check In</th><th>Check Out</th><th>Price</th><th>Before price</th><th>Savings</th><th>Link</th></tr>";
    localStorage.setItem('inputID', ID);
    $('#testas').fadeOut(1);
    $("#infoFilter").fadeIn(1000);
    $('#testas').fadeIn(1000);
    document.getElementById("button_2").style.display = 'none';
    $('#infoTHead').fadeIn(1);
    document.getElementById("button_3").style.display = '';
    $.ajax({
        url: "Duombaze2.php",
        type: "POST",
        data: {
            'inputID': ID,
            'checkIn': Laikas,
            'checkOut': LaikasOut,
            'priceFilter0': price1,
            'priceFilter1': price2,
        },
        success: function(inputData) {
            console.log(inputData);
              //  document.getElementById("button_1").onclick = null;
              document.getElementById("testas").innerText = ""; // nedubliuoja duomenų
              let testas = document.getElementById("testas");
              if (inputData.search("nulis") != -1) {
                testas.insertAdjacentHTML("beforeend", "<td colspan='6'>no matches found </td>"); // jeigu duombazėje nėra duomenų apie šalį;
            } else{
                let test = JSON.parse(inputData);
               for (var i = 0; i < test.length; i++) {
                   if (!test[i].beforePrice){ //gražina false jeigu yra bent kažkokia reikšmė
                       test[i].beforePrice = "-";
                       test[i].savings = "-";
                   }
                   testas.insertAdjacentHTML("beforeend", "<tr> <td> " 
                   + test[i].checkIn + "</td> <td>" + test[i].checkOut + "</td><td>" + test[i].price +"</td><td>" + test[i].beforePrice + 
                   "</td><td>" + test[i].savings + "</td><td><button onClick='window.open(autoLogIn(\""+ test[i].listingID +"\",\""+ test[i].oDate +"\"))'>Click Me</button></td></tr>");
               }
            }
          }
        })      
}

function callfirst(selectedCountry) // pirmas iškviestas metodas
{
    $("#countryChosen").text(selectedCountry.name);
    $("#infoFilter").fadeIn(1000);
    $('#button_2').fadeIn(1000);
    $('#infoTHead').fadeOut(1);
    localStorage.setItem('CountryName', selectedCountry.name); // sukuriamas lokalus kintamasis šalies pavadinimui
    document.getElementById("testas").innerText = ''; // gauna elementą pagal jo ID
    document.getElementById("button_3").style.display = 'none'; // paslepia individual listing'ų filtro ikoną.
    $('#button_1').fadeIn(1000); // filtro ikona;
    Iskvietimas(); // iškviečia sąrašą be jokių filtro nustatymų;
}

$.post('load_countries.php').done(function(data) {
    if(data != ""){
        var file = "user_data/" + data + ".json";
        console.log(file);
        $.ajax({
        url: file,
        type: "GET",
        contentType: "application/json; charset=utf-8",
        async: true,
        dataType: "json",
        success: function(inputData) {
            controller.addData( inputData );
            controller.init(); //gražina gio.js informaciją apie šalis
        }
        });
    }
    else{
        controller.init();
    }
    
});




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