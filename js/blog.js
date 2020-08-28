
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
            cards.appendChild(card);
            card.style.backgroundColor = "#e9ecef";
            card.style.width= "50%"; 
            card.style.paddingLeft = "5%";
            card.style.paddingTop = "15px";
            card.style.margin = "10px";
            card.style.borderRadius = "10px";

            let cardId = document.createElement("h3");
            cardId.innerText = i.id;
            cardId.style.backgroundColor = "#e9ecef"; 
            cardId.style.display = "center";
            card.appendChild(cardId);
            

            let cardTitle = document.createElement("h5");           
            cardTitle.innerText = i.titre;
            cardTitle.style.padding = "10px"
            cardTitle.style.marginRight = "10%";
            cardTitle.style.backgroundColor = "white";

            let cardContent = document.createElement("p");    
            cardContent.innerText = i.contenu;
            cardContent.style.padding = "10px"
            cardContent.style.marginRight = "10%";
            cardContent.style.backgroundColor = "white";

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
