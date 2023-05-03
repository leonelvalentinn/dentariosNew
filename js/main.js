const data = [
  {
    img1: "images/slider-cel-1.png",
    img2: "images/slider-1.png",
  },
  {
    img1: "images/slider-cel-2.png",
    img2: "images/slider-3.png",
  },
  {
    img1: "images/slider-cel-3.png",
    img2: "images/slider-4.png",
  },
];

let imgSlider = document.getElementById("slider");
let knowUs = document.getElementById("know-us");
console.log(data);

data.forEach((element) => {
  console.log(element);

  imgSlider.innerHTML += `
  <div class="mySlider fade">
  <img src="${element.img1}" alt="" class="slider-movil" />
  <img src="${element.img2}" alt="" class="slider-descktop" />
</div>

  `;
});
