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
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="js/jquery-1.12.4.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/three.min.js"></script>
        <script src="js/gio.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/StyleFilters.css">
        <link rel="stylesheet" href="css/StyleListings.css">
        <link rel="stylesheet" href="css/search.css">
        <link rel="stylesheet" href="datetimepicker/jquery.datetimepicker.min.css"/>
        <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="datetimepicker/jquery.datetimepicker.full.js"></script>
        <?php require('style.php'); ?>
            <?php require('navbar.php'); ?>
    <body>
    
<?php
include 'GlobeStyle.html';
?>
<script src="js/fb.js"></script>
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/lt_LT/sdk.js#xfbml=1&version=v6.0&appId=558173124816363&autoLogAppEvents=1"></script>
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

     <script src="js/search.js"></script>
    <script src="js/searchPress.js"></script>
    <script src="js/autocomplete.js"></script>
  <script src="js/CloseButton.js"></script>
  <script src="js/countryselect.js"></script>

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