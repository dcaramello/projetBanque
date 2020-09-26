
// variables for the request object and to point to the html cards
let cards = document.getElementById("cards");
let request = new XMLHttpRequest();

request.onreadystatechange = function() {

    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {

        let articles = JSON.parse(this.responseText);
        console.log(articles);

        // we create the articles with a for of loop, if an article is added it will be automatically displayed with a style
        for (let i of articles) {

            let card = document.createElement("div");
            card.style.backgroundColor = "#8c949c";
            card.style.border = "5px rgb(2, 162, 241)solid";
            card.style.borderRadius = "6px";
            card.style.boxShadow = "10px 5px 5px rgb(86, 234, 249)";
            card.classList.add("col-", "col-lg-", "m-5","blog");
            cards.appendChild(card);

            let cardId = document.createElement("h3");
            cardId.innerText = i.id;
            cardId.style.display = "center";
            cardId.classList.add("card-body");
            card.appendChild(cardId);

            let cardTitle = document.createElement("h5");
            cardTitle.innerText = i.titre;
            cardTitle.classList.add("card-title");
            cardTitle.style.borderBottom = "3px rgb(85, 85, 85) solid";

            let cardContent = document.createElement("p");
            cardContent.innerText = i.contenu;
            cardContent.classList.add("card-text");

            cardId.appendChild(cardTitle);
            cardId.appendChild(cardContent);
        }
    }
    else {
        console.log("une erreure est survenue");
    }
};

request.open('GET', "https://oc-jswebsrv.herokuapp.com/api/articles", true);
request.send();
