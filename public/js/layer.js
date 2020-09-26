let securite_layer = document.getElementById("securite_layer");
let blocLayer = document.getElementById("blocLayer");
let layer = document.getElementById("layer");

document.getElementById("hiddenLayer").addEventListener("click", function() {
    blocLayer.style.visibility = "hidden";
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
