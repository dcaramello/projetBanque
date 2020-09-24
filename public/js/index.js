// Carousel in header for all pages

// Variables
// two array for images and description
const IMAGES = ["public/img/follow.jpg", "public/img/securite.jpg", "public/img/transfert.jpg", "public/img/stats.jpg", "public/img/mobile.jpg"];
const DESCRIPTIONS = ["Retrouvez nous dans vos appli préférées", "Le meilleur de la sécurité pour vos données bancaires", "Transferer votre argent très facilement", "Suivez toutes les stats en direct", "Accedez a vos comptes partout"];

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
