// variables for the request object and to point to the html array
let request = new XMLHttpRequest();
let table = document.getElementById("table");

// function that will create each element of the array with for loops
request.onreadystatechange = function() {
    
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {

        let data = JSON.parse(this.response);
            
        let statistiques = data.statistiques;
        console.log(statistiques);

        // we create the line (tr) of the table with a for of
        for (stat of statistiques) {
            let tr = document.createElement("tr");
                // we create column for each line with for in loop
                for(prop in stat) {
                    let td = document.createElement("td");
                    td.innerText = stat[prop];
                    tr.appendChild(td);
                }
            table.appendChild(tr);              
        }              
    } 
    else {       
        console.log("une erreure est survenue");
    }
};

request.open('GET', "statistiques.json", true);
request.send();

