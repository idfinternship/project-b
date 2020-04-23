<?php 
  require('config/config.php');
  require('config/db.php');
  require("login_session.php");

  $msg = '';
  $msgClass = '';

  require("login_logic.php");
  require("register_logic.php");
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>TraveLog test</title>

        <script src="js/three.min.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/gio.js"></script>
        <?php require('style.php'); ?>
            

                <!-- Info lenteles salim -->
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <style>
                    #search,
                    #textbox {
                        position: absolute;
                        height: 40px;
                        line-height: 40px;
                        text-align: center;
                        color: #cbcbcb;
                        cursor: pointer;
                        user-select: none;
                        box-sizing: border-box;
                        transition: 1s;
                        background-color: rgba(110, 110, 110, 0.8);
                        top: 50px;
                    }
                    
                    #search {
                        left: 950px;
                        width: 60px;
                    }
                    
                    #textbox {
                        left: 800px;
                        width: 150px;
                    }
                    
                    #globalArea {
                        height: 100%;
                        width: 100%;
                        margin: 0;
                        padding: 0;
                    }
                    
                    #infoFilter {
                        position: absolute;
                        left: 26%;
                        top: 20%;
                        width: 50%;
                        height: 50%;
                        line-height: 50px;
                        text-align: center;
                        color: white;
                        font-size: 20px;
                        background-color: rgba(106, 107, 111, 0.6);
                        display: none;
                    }
                    /* Pasirinktos šalies teksto laukas */
                    
                    #countryChosen {
                        width: 20%;
                        height: 2%;
                    }
                    
                    #countryFilter {
                        width: 100%;
                        height: 10%;
                    }
                    
                    .alert-close {
                        background: rgba(255, 255, 255, 0.1);
                        -webkit-border-radius: 50%;
                        -moz-border-radius: 50%;
                        -ms-border-radius: 50%;
                        -o-border-radius: 50%;
                        border-radius: 50%;
                        -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.4), inset 0 -1px 2px rgba(255, 255, 255, 0.25);
                        -moz-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.4), inset 0 -1px 2px rgba(255, 255, 255, 0.25);
                        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.4), inset 0 -1px 2px rgba(255, 255, 255, 0.25);
                        color: #FFFFFF;
                        cursor: pointer;
                        font-size: 18px;
                        font-weight: normal;
                        height: 22px;
                        line-height: 24px;
                        position: absolute;
                        right: 11px;
                        text-align: center;
                        top: 9px;
                        -webkit-transition: color 0.2s ease-in-out;
                        -moz-transition: color 0.2s ease-in-out;
                        -o-transition: color 0.2s ease-in-out;
                        transition: color 0.2s ease-in-out;
                        width: 22px;
                    }
                </style>
    </head>

    <body>
        <div class="container">
            <?php if($msg != ''): ?>
                <script type="text/javascript">$('.alert').alert()</script>
                <div class="alert <?php echo $msgClass; ?> alert-dismissible2 fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="false">&times;</span>
                    </button>
                    <?php echo $msg; ?>
                    
                </div>
            <?php endif; ?>
        </div>
        <?php require('navbar.php'); ?>
        <input id="textbox" type="text" name="fname">
        <div id="search">Search</div>
        <script src="js/search.js"></script>

        <div id="globalArea"></div>
        <div id="infoFilter">
            <div class="alert-close">×</div>
            <div id="countryChosen"></div>
            <div id="countryFilter"></div>
            <button id="button_1">Try it</button>
            <input type="text" placeholder="Type something..." id="myInput">
            <font size="4" face="Calibri">
    <table class = "table table-responsive" style = "max-height: 77%">
    <thead id="infoTHead">
    <tr><th>Destination name</th><th>Duration</th><th>Rating</th></tr>
    </thead>
    <tbody id="testas">
    </tbody>
    </table>
    <!-- Lentelės išjungimo scriptas -->
  <script>
              $(document).ready(function(c) {
                $('.alert-close').on('click', function(c){
                  document.getElementById("textbox").style.display = '';
                  document.getElementById("search").style.display = '';
                  $(this).parent().fadeOut('slow', function(c){
              });
        });   
  });
  </script>
  <script src="js/countryselect.js"></script>
    </div>

    <div id="myModalL" class="modal">
      <div class="modal-content">
        <div class="mdl-layout-spacer"><span class="close">&times;</span></div>
        <?php require("login_popup.php"); ?>
      </div>
    </div>

    <div id="myModalR" class="modal">
      <div class="modal-content">
        <div class="mdl-layout-spacer"><span class="close">&times;</span></div>
        <?php require("register_popup.php"); ?>
      </div>
    </div>

    <script src="js/modal.js"></script>
  </body>
  </html>