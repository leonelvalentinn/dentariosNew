let imgSliderOne = [
  "images/Clientes/dentalsonrix.png",
  "images/Clientes/dentalsonrix.png",
  "images/Clientes/dentalsonrix.png",
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
