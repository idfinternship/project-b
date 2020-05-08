$( "#search" ).click( function () {
    var countrydata = document.getElementById("textbox").value;


function readTextFile(file, callback) {
    var rawFile = new XMLHttpRequest();
    rawFile.overrideMimeType("application/json");
    rawFile.open("GET", file, true);
    rawFile.onreadystatechange = function() {
        if (rawFile.readyState === 4 && rawFile.status == "200") {
            callback(rawFile.responseText);
        }
    }
    rawFile.send(null);
}

readTextFile("data/countryISO.json", function(text){
    var obj = JSON.parse(text, function (name, value) {
        if (name.toLowerCase() == countrydata.toLowerCase()) {
            console.log(value);
            controller.switchCountry(value);
          return value;
        }
      });
});
} );