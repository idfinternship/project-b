document.getElementById("AboutPage").style.display = 'none';
document.getElementById("AboutPageText").style.display = 'none';
$( "#asd").click( function () {
    document.getElementById("AboutPageText").style.display = '';
    document.getElementById("AboutPageText").innerText = "";
    let AboutUS = document.getElementById("AboutPageText");
    var First = "We made a page for your travel plans to be way easier than it usually is. Our main goal is to make travel plan making to be interactive and way more pleasing to the eye rather than scrolling through pages of useless advertisements.";
    var Second = "<strong> Team members: </strong> <br> • Dalius Visokinskas <br> • Erikas Masaitis <br> • Vilius Gečas <br> • Vilius Grimalauskas <br>";
    var Third = "<br> <strong>If you have questions, contacts:</strong> <br> info@travelog.com";
    var th = "<br><br><br><br><center>© 2020 KTU</center>";
    AboutUS.insertAdjacentHTML("beforeend", "<strong><center>TraveLog</center></strong></> <br>" + First + " <br> <br>" + Second + Third + th);
        if(document.getElementById("AboutPage").style.display == 'none')
        {
            document.getElementById("AboutPage").style.display = '';
        }
        else
        {
            document.getElementById("AboutPage").style.display = 'none';
        }
});