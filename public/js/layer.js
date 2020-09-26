let securite_layer = document.getElementById("securite_layer");
let blocLayer = document.getElementById("blocLayer");
let layer = document.getElementById("layer");
let blocCarousel = document.getElementById("blocCarousel");
let createAccount = document.getElementById("createAccount");
let navBar = document.getElementById("navBar");
// let logoBank = document.getElementById("logoBank");
let menuBurger = document.getElementById("menuBurger");

createAccount.style.visibility = "hidden";
blocCarousel.style.visibility = "hidden";
navBar.style.visibility = "hidden";
// logoBank.style.visibility = "hidden"
menuBurger.style.visibility = "hidden";


document.getElementById("hiddenLayer").addEventListener("click", function() {
    blocLayer.style.visibility = "hidden";
    blocCarousel.style.visibility = "visible";
    createAccount.style.visibility = "visible";
    navBar.style.visibility = "visible";
    // logoBank.style.visibility = "visible";
    menuBurger.style.visibility = "visible";
});

// variables for the request object and to point to the html array
let request = new XMLHttpRequest();
let ul = document.getElementById("ul");

// function that will create each rules with a loop
request.onreadystatechange = function() {

    if (this.readyState === XMLHttpRequest.DONE) {

      if(this.status === 200) {
        let data = (this.response);
        let p = document.createElement("p")
        p.innerText = data;
        securite_layer.append(data);
      }
      else {
        alert("une erreure est survenue");
      }
  }
};

request.open('GET', "securite.json", true);
request.send();
