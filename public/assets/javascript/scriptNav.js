let hamburgerButton = document.querySelector(".hamburger-button");
hamburgerButton.addEventListener("click", () => document.querySelector("nav.sidenav").style.width = "250px");

let xCloseButton = document.querySelector("a.xCloseButton");
xCloseButton.addEventListener("click", () => document.querySelector("nav.sidenav").style.width = "0");
  // function closeNav() {
  //   document.getElementById("mySidenav").style.width = "0";
  // }
  //Get the button:
mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}