let imgSliderOne = [
  "images/Clientes/juarez.png",
  "images/Clientes/juarez.png",
  "images/Clientes/juarez.png",
];
let imgSliderTwo = [
  "images/Clientes/thesmilingsociety.png",
  "images/Clientes/thesmilingsociety.png",
  "images/Clientes/thesmilingsociety.png",
];

curIndex = 0;
imgDuration = 3000;

function slidesShow() {
  document.getElementById("imgSliderOne").src = imgSliderOne[curIndex];
  document.getElementById("imgSliderTwo").src = imgSliderTwo[curIndex];
  curIndex++;
  if (curIndex === imgSliderOne.length || curIndex === imgSliderTwo.length) {
    curIndex = 0;
  }
  setTimeout("slidesShow()", imgDuration);
}

slidesShow();
