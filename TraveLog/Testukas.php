
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TraveLog test</title>

    <script src="js/three.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/gio.js"></script>     
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>  
    <link rel="stylesheet" href="css/common.css">
<!-- NavBar-->
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<script defer src="js/theme.js"></script>
<link rel="stylesheet" href="css/style.css" />
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet"/>

<!-- Info lenteles salim -->
<meta name="viewport" content="width=device-width, initial-scale=1">
    <style>

        #globalArea {

            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
        }

        #infoBoard {

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
        #countryArea {

            width: 100%;
            height: 10%;
        }
        
        .alert-close {
	       background: rgba(255,255,255,0.1);
	        -webkit-border-radius: 50%;
	        -moz-border-radius: 50%;
      	  -ms-border-radius: 50%;
	        -o-border-radius: 50%;
      	  border-radius: 50%;
	        -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.4),inset 0 -1px 2px rgba(255,255,255,0.25);
	        -moz-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.4),inset 0 -1px 2px rgba(255,255,255,0.25);
	        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.4),inset 0 -1px 2px rgba(255,255,255,0.25);
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

 <!-- navbar -->
  <nav class="navbar">
    <ul class="navbar-nav">
      <li class="logo">
        <a href="#" class="nav-link">
          <span class="link-text logo-text">TraveLog</span>
          <svg
            aria-hidden="true"
            focusable="false"
            data-prefix="fad"
            data-icon="angle-double-right"
            role="img"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 448 512"
            class="svg-inline--fa fa-angle-double-right fa-w-14 fa-5x"
          >
            <g class="fa-group">
              <path
                fill="currentColor"
                d="M224 273L88.37 409a23.78 23.78 0 0 1-33.8 0L32 386.36a23.94 23.94 0 0 1 0-33.89l96.13-96.37L32 159.73a23.94 23.94 0 0 1 0-33.89l22.44-22.79a23.78 23.78 0 0 1 33.8 0L223.88 239a23.94 23.94 0 0 1 .1 34z"
                class="fa-secondary"
              ></path>
              <path
                fill="currentColor"
                d="M415.89 273L280.34 409a23.77 23.77 0 0 1-33.79 0L224 386.26a23.94 23.94 0 0 1 0-33.89L320.11 256l-96-96.47a23.94 23.94 0 0 1 0-33.89l22.52-22.59a23.77 23.77 0 0 1 33.79 0L416 239a24 24 0 0 1-.11 34z"
                class="fa-primary"
              ></path>
            </g>
          </svg>
        </a>
      </li>

      <li class="nav-item">
        <a href="#" class="nav-link">
          <svg
            aria-hidden="true"
            focusable="false"
            data-prefix="fad"
            data-icon="Search"
            role="img"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 512 512"
            class="search"
          >
            <g class="fa-group">    
                <path fill="currentColor" d="M505.04 442.66l-99.71-99.69c-4.5-4.5-10.6-7-17-7h-16.3c27.6-35.3 44-79.69 44-127.99C416.03 93.09 322.92 0 208.02 0S0 93.09 0 207.98s93.11 207.98 208.02 207.98c48.3 0 92.71-16.4 128.01-44v16.3c0 6.4 2.5 12.5 7 17l99.71 99.69c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.59.1-33.99zm-297.02-90.7c-79.54 0-144-64.34-144-143.98 0-79.53 64.35-143.98 144-143.98 79.54 0 144 64.34 144 143.98 0 79.53-64.35 143.98-144 143.98zm.02-239.96c-40.78 0-73.84 33.05-73.84 73.83 0 32.96 48.26 93.05 66.75 114.86a9.24 9.24 0 0 0 14.18 0c18.49-21.81 66.75-81.89 66.75-114.86 0-40.78-33.06-73.83-73.84-73.83zm0 96c-13.26 0-24-10.75-24-24 0-13.26 10.75-24 24-24s24 10.74 24 24c0 13.25-10.75 24-24 24z"></path>
            </g>
          </svg>
          <span class="link-text">Search</span>
        </a>
      </li>

      <li class="nav-item">
        <a href="#" class="nav-link">
          <svg
            aria-hidden="true"
            focusable="false"
            data-prefix="fad"
            data-icon="alien-monster"
            role="img"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 576 512"
            class="svg-inline--fa fa-alien-monster fa-w-18 fa-9x"
          >
            <g class="fa-group">
                <path fill="currentColor" d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"></path>
              <path
                fill="currentColor"
                d="M160,320h64V224H160Zm192-96v96h64V224Z"
                class="fa-primary"
              ></path>
            </g>
          </svg>
          <span class="link-text">Log In</span>
        </a>
      </li>

      <li class="nav-item">
        <a href="profile.html" class="nav-link">
          <svg
            aria-hidden="true"
            focusable="false"
            data-prefix="fad"
            data-icon="space-station-moon-alt"
            role="img"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 512 512"
            class="svg-inline--fa fa-space-station-moon-alt fa-w-16 fa-5x"
          >
            <g class="fa-group">
                <path fill="currentColor" d="M313.6 304c-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 304 0 364.2 0 438.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-25.6c0-74.2-60.2-134.4-134.4-134.4zM400 464H48v-25.6c0-47.6 38.8-86.4 86.4-86.4 14.6 0 38.3 16 89.6 16 51.7 0 74.9-16 89.6-16 47.6 0 86.4 38.8 86.4 86.4V464zM224 288c79.5 0 144-64.5 144-144S303.5 0 224 0 80 64.5 80 144s64.5 144 144 144zm0-240c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 43.1-96 96-96z"></path>
            </g>
          </svg>
          <span class="link-text">Profile</span>
        </a>
      </li>

      <li class="nav-item">
        <a href="#" class="nav-link">
          <svg
            aria-hidden="true"
            focusable="false"
            data-prefix="fad"
            data-icon="info"
            role="img"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 640 512"
            class="svg-inline--fa fa-space-shuttle fa-w-20 fa-5x"
          >
            <g class="fa-group">
                <path fill="currentColor" d="M20 424.229h20V279.771H20c-11.046 0-20-8.954-20-20V212c0-11.046 8.954-20 20-20h112c11.046 0 20 8.954 20 20v212.229h20c11.046 0 20 8.954 20 20V492c0 11.046-8.954 20-20 20H20c-11.046 0-20-8.954-20-20v-47.771c0-11.046 8.954-20 20-20zM96 0C56.235 0 24 32.235 24 72s32.235 72 72 72 72-32.235 72-72S135.764 0 96 0z"></path>
            </g>
          </svg>
          <span class="link-text">About Page</span>
        </a>
      </li>


      <li class="nav-item" id="themeButton">
        <a href="#" class="nav-link">
          <svg
            class="theme-icon"
            id="lightIcon"
            aria-hidden="true"
            focusable="false"
            data-prefix="fad"
            data-icon="moon-stars"
            role="img"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 512 512"
            class="svg-inline--fa fa-moon-stars fa-w-16 fa-7x"
          >
            <g class="fa-group">
              <path
                fill="currentColor"
                d="M320 32L304 0l-16 32-32 16 32 16 16 32 16-32 32-16zm138.7 149.3L432 128l-26.7 53.3L352 208l53.3 26.7L432 288l26.7-53.3L512 208z"
                class="fa-secondary"
              ></path>
              <path
                fill="currentColor"
                d="M332.2 426.4c8.1-1.6 13.9 8 8.6 14.5a191.18 191.18 0 0 1-149 71.1C85.8 512 0 426 0 320c0-120 108.7-210.6 227-188.8 8.2 1.6 10.1 12.6 2.8 16.7a150.3 150.3 0 0 0-76.1 130.8c0 94 85.4 165.4 178.5 147.7z"
                class="fa-primary"
              ></path>
            </g>
          </svg>
          <svg
            class="theme-icon"
            id="solarIcon"
            aria-hidden="true"
            focusable="false"
            data-prefix="fad"
            data-icon="sun"
            role="img"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 512 512"
            class="svg-inline--fa fa-sun fa-w-16 fa-7x"
          >
            <g class="fa-group">
              <path
                fill="currentColor"
                d="M502.42 240.5l-94.7-47.3 33.5-100.4c4.5-13.6-8.4-26.5-21.9-21.9l-100.4 33.5-47.41-94.8a17.31 17.31 0 0 0-31 0l-47.3 94.7L92.7 70.8c-13.6-4.5-26.5 8.4-21.9 21.9l33.5 100.4-94.7 47.4a17.31 17.31 0 0 0 0 31l94.7 47.3-33.5 100.5c-4.5 13.6 8.4 26.5 21.9 21.9l100.41-33.5 47.3 94.7a17.31 17.31 0 0 0 31 0l47.31-94.7 100.4 33.5c13.6 4.5 26.5-8.4 21.9-21.9l-33.5-100.4 94.7-47.3a17.33 17.33 0 0 0 .2-31.1zm-155.9 106c-49.91 49.9-131.11 49.9-181 0a128.13 128.13 0 0 1 0-181c49.9-49.9 131.1-49.9 181 0a128.13 128.13 0 0 1 0 181z"
                class="fa-secondary"
              ></path>
              <path
                fill="currentColor"
                d="M352 256a96 96 0 1 1-96-96 96.15 96.15 0 0 1 96 96z"
                class="fa-primary"
              ></path>
            </g>
          </svg>
          <svg
            class="theme-icon"
            id="darkIcon"
            aria-hidden="true"
            focusable="false"
            data-prefix="fad"
            data-icon="sunglasses"
            role="img"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 576 512"
            class="svg-inline--fa fa-sunglasses fa-w-18 fa-7x"
          >
            <g class="fa-group">
              <path
                fill="currentColor"
                d="M574.09 280.38L528.75 98.66a87.94 87.94 0 0 0-113.19-62.14l-15.25 5.08a16 16 0 0 0-10.12 20.25L395.25 77a16 16 0 0 0 20.22 10.13l13.19-4.39c10.87-3.63 23-3.57 33.15 1.73a39.59 39.59 0 0 1 20.38 25.81l38.47 153.83a276.7 276.7 0 0 0-81.22-12.47c-34.75 0-74 7-114.85 26.75h-73.18c-40.85-19.75-80.07-26.75-114.85-26.75a276.75 276.75 0 0 0-81.22 12.45l38.47-153.8a39.61 39.61 0 0 1 20.38-25.82c10.15-5.29 22.28-5.34 33.15-1.73l13.16 4.39A16 16 0 0 0 180.75 77l5.06-15.19a16 16 0 0 0-10.12-20.21l-15.25-5.08A87.95 87.95 0 0 0 47.25 98.65L1.91 280.38A75.35 75.35 0 0 0 0 295.86v70.25C0 429 51.59 480 115.19 480h37.12c60.28 0 110.38-45.94 114.88-105.37l2.93-38.63h35.76l2.93 38.63c4.5 59.43 54.6 105.37 114.88 105.37h37.12C524.41 480 576 429 576 366.13v-70.25a62.67 62.67 0 0 0-1.91-15.5zM203.38 369.8c-2 25.9-24.41 46.2-51.07 46.2h-37.12C87 416 64 393.63 64 366.11v-37.55a217.35 217.35 0 0 1 72.59-12.9 196.51 196.51 0 0 1 69.91 12.9zM512 366.13c0 27.5-23 49.87-51.19 49.87h-37.12c-26.69 0-49.1-20.3-51.07-46.2l-3.12-41.24a196.55 196.55 0 0 1 69.94-12.9A217.41 217.41 0 0 1 512 328.58z"
                class="fa-secondary"
              ></path>
              <path
                fill="currentColor"
                d="M64.19 367.9c0-.61-.19-1.18-.19-1.8 0 27.53 23 49.9 51.19 49.9h37.12c26.66 0 49.1-20.3 51.07-46.2l3.12-41.24c-14-5.29-28.31-8.38-42.78-10.42zm404-50l-95.83 47.91.3 4c2 25.9 24.38 46.2 51.07 46.2h37.12C489 416 512 393.63 512 366.13v-37.55a227.76 227.76 0 0 0-43.85-10.66z"
                class="fa-primary"
              ></path>
            </g>
          </svg>
          <span class="link-text">Themify</span>
        </a>
      </li>
    </ul>
  </nav>
    </style>

    <div id="globalArea"></div>
<div id="infoBoard">
    <div class="alert-close">×</div>
    <div id="countryArea"></div>
    <font size="4" face="Calibri">
  <table class = "table table-responsive" style = "max-height: 90%">
  <thead>
   <tr><th>Kaina</th><th>Trukmė</th></tr>
  </thead>
   <tbody id="testas">
   </tbody>
  </table>

  <!-- Lentelės išjungimo scriptas -->
<script>
            $(document).ready(function(c) {
	          $('.alert-close').on('click', function(c){
		        $(this).parent().fadeOut('slow', function(c){
		    });
	  });	
});
</script>
<script src="js/countryselect.js"></script>
</body>
</html>