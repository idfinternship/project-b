$(' #datetimepicker').datetimepicker({

timepicker:false,
format:'Y-m-d'
});

$("#button_4").click(function(e) {
    e.preventDefault();
    var Laikas = document.getElementById("datetimepicker").value;
    localStorage.setItem('Laikas', Laikas);
});

$(' #datetimepicker1').datetimepicker({

    timepicker:false,
    format:'Y-m-d'
    });
    
    $("#button_4").click(function(e) {
        e.preventDefault();
        var LaikasOut = document.getElementById("datetimepicker1").value;
        localStorage.setItem('LaikasOut', LaikasOut);
    });