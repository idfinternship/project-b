$( function() {
    //$( '.slider-range').append('<div class="my-hanedle ui-slider-handle"></div>');
    $( ".slider-range").slider({
    range: true,
    min: 1,
    max: 5,
    values: [ 1, 5 ],
    slide: function( event, ui ) {
        localStorage.setItem('ratingFilter0', ui.values[0]);
        localStorage.setItem('ratingFilter1', ui.values[1]);
    $( "#amount" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
    $(".p1").text('Rating: ');
    }
    });
    $( "#amount" ).val($( ".slider-range" ).slider( "values", 0 ) +
    " - " + $( ".slider-range" ).slider( "values", 1 ) );
    
    });

    $( function() {
        $( ".slider-range1").slider({
        range: true,
        min: 1,
        max: 20,
        values: [ 1, 20 ],
        slide: function( event, ui ) {
            localStorage.setItem('DurationFilter0', ui.values[0]);
            localStorage.setItem('DurationFilter1', ui.values[1]);
        $( "#amount" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
        }
        });
        $( "#amount" ).val($( ".slider-range1" ).slider( "values", 0 ) +
        " - " + $( ".slider-range1" ).slider( "values", 1 ) );
        });

        $( function() {
          $( ".slider-range2").slider({
          range: true,
          min: 10,
          max: 5000,
          values: [ 10, 5000 ],
          slide: function( event, ui ) {
              localStorage.setItem('priceFilter0', ui.values[0]);
              localStorage.setItem('priceFilter1', ui.values[1]);
          $( "#amount1" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
          }
          });
          $( "#amount1" ).val($( ".slider-range2" ).slider( "values", 0 ) +
          " - " + $( ".slider-range2" ).slider( "values", 1 ) );
          });

          
dragElement(document.getElementById("filter"));
dragElement(document.getElementById("individualfilter"));

function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id + "header")) {
    /* if present, the header is where you move the DIV from:*/
    document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
  } else {
    /* otherwise, move the DIV from anywhere inside the DIV:*/
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    /* stop moving when mouse button is released:*/
    document.onmouseup = null;
    document.onmousemove = null;
  }
}