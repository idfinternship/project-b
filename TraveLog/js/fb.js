window.fbAsyncInit = function() {
    FB.init({
    appId      : '887609555034388',
    cookie     : true,
    xfbml      : true,
    version    : 'v6.0'
    });
    
    FB.getLoginStatus(function(response) {
        statusChangeCallback(response);
    });
  
};

(function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function statusChangeCallback(response){
    if(response.status === 'connected'){
        FB.api('/me?fields=id', function(response){
            if(response && !response.error){
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                        window.location.href = 'fb_register.php';
                    }
                }
                xmlhttp.open("GET", "fb_request.php?q="+response.id, true);
                xmlhttp.send();
            }
        });
    } else {
        console.log('Not authenticated');
    }
}

function checkLoginState() {
    FB.getLoginStatus(function(response) {
        statusChangeCallback(response);
    });
}