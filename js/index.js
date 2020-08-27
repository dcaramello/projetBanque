// Carousel in header




// Variables
// two array for images and description
const IMAGES = ["img/follow.jpg", "img/securite.jpg", "img/transfert.jpg", "img/stats.jpg", "img/mobile.jpg"];
const DESCRIPTIONS = ["Retrouvez nous dans vos appli", "Le meilleur de la sécurité pour vos données", "Transferer votre argent très facilement", "Suivez toutes les stats en direct", "Accedez a vos compte partout"];

// index for browse element in array and maxIndex for last value of index (4)
var index = 0;
const maxIndex = IMAGES.length - 1;


// DOM : image point id image in html and description id description
const image = document.getElementById("image");
const description = document.getElementById("description");


//Funcion for synchronize image and description at the same time
function playCarousel() {
    image.src = IMAGES[index];
    description.innerHTML = DESCRIPTIONS[index];
  }

// Function to scroll through table elements
function scrollIndex() {
    if (index < maxIndex) {
        index +=1 
    } else {
        index = 0;
    }
    playCarousel();
}


// Launch a carousel
playCarousel();

// rotate images in 3 secondes
var rotateImage = setInterval(scrollIndex, 3000);












// ChangeImage function which changes the images of the carousel if you click on "<" or ">"
// It takes in parameter flecheDirection, which retrieves the value -1 for "<"" or 1 for ">" with onclick
// If we click on next indexImages and indexDescriptions are incremented
// If we exceed the number of elements of the array indexImages and indexDescriptions are reset to 0
function changeImage(flecheDirection) {
    // image management
    indexImages = indexImages + flecheDirection;
    if (indexImages < 0){
        indexImages = images.length - 1;
    }
    if (indexImages > images.length - 1) {
        indexImages = 0;
    }
    
    document.getElementById("carousel").src = images[indexImages];
    console.log(indexImages);

    // description management
    indexDescriptions = indexDescriptions + flecheDirection;
    if (indexDescriptions < 0){
        indexDescriptions = descriptions.length - 1;
    }
    if (indexDescriptions > descriptions.length - 1) {
        indexDescriptions = 0;
    }
    
    document.getElementById("description").innerHTML = descriptions[indexDescriptions];
    console.log(indexDescriptions);
}

// Function changeImageAuto qui incrémente les positions des array images et descriptions
// If we arrive at the last element of the array we start again at 0
function changeImageAuto() {
    // image management
    document.getElementById("carousel").src = images[indexImages];
    if (indexImages == 2) {
        indexImages = 0;
    }
    else {
        indexImages ++;
    }

    // description management
    document.getElementById("description").innerHTML = descriptions[indexDescriptions];
    if (indexDescriptions == 2) {
        indexDescriptions = 0;
    }
    else {
        indexDescriptions ++;
    }
}

// We call the changeImageAuto function with setInterval () to increment the images and descriptions every 3 seconds
setInterval(changeImageAuto, 3000);
