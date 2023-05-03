let imgSliderOne = [
  "images/slider-cel-1.png",
  "images/slider-cel-2.png",
  "images/slider-cel-3.png",
];
let imgSliderTwo = [
  "images/slider-cel-1.png",
  "images/slider-cel-2.png",
  "images/slider-cel-3.png",
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
