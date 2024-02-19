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


function showPassword() {
  const pass = document.getElementById('password')
  if (pass.type === "password") {
    pass.type = "text";
  } else {
    pass.type = "password";
  }
}

function validateUserName(event, type) {
  const feedback = document.getElementById('feedback')
  console.log("event", event.target.value)
  if (type == "text") {
    let expRegular = /^[A-Za-z0-9]+$/g;
    if (!expRegular.test(event.target.value)) {
      feedback.innerHTML = 'No introduzcas caracteres especiales ni espacios en blanco'
      feedback.classList.add('show-feedback')
      event.target.value = ""
      return;
    } else if (event.target.value.length > '10') {
      feedback.innerHTML = 'Máximo 10 caracteres'
      feedback.classList.add('show-feedback')
      event.target.value = ""
      return;
    } else {
      feedback.classList.remove('show-feedback')
    }
  }
}