var modalL = document.getElementById("myModalL");
var modalR = document.getElementById("myModalR");

// Get the button that opens the modal
var btnL = document.getElementById("loginBtn");
var btnR = document.getElementById("registerBtn");

// Get the <span> element that closes the modal
var spanL = document.getElementById("modalClose1");
var spanR = document.getElementById("modalClose2");

// When the user clicks on the button, open the modal
btnL.onclick = function() {
  modalL.style.display = "block";
}

btnR.onclick = function() {
  modalR.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spanL.onclick = function() {
  modalL.style.display = "none";
}

spanR.onclick = function() {
  modalR.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modalL) {
    modalL.style.display = "none";
  }
  else if (event.target == modalR) {
    modalR.style.display = "none";
  }
} 