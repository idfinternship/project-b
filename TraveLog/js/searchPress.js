document.getElementById("textbox").style.display = 'none';
document.getElementById("search").style.display = 'none';
$( "#searchIcon" ).click( function () {
        if(document.getElementById("textbox").style.display == 'none')
        {
            document.getElementById("textbox").style.display = '';
            document.getElementById("search").style.display = '';
        }
        else
        {
            document.getElementById("textbox").style.display = 'none';
            document.getElementById("search").style.display = 'none';
        }
});
