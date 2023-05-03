const dark = document.getElementById("modo");
const body = document.getElementById("body");
const logo = document.getElementById("logo");
const moon = document.getElementById("moon");
const sun = document.getElementById("sun");
load();
dark.addEventListener("click", () => {
  let darkmode = body.classList.toggle("dark-mode");
  if (!darkmode) {
    logo.src = "images/logo-white.png";
    moon.style.display = "block";
    sun.style.display = "none";
  } else if (darkmode) {
    logo.src = "images/logo-oscuro.png";
    sun.style.display = "block";
    moon.style.display = "none";
  }
});

function load() {
  const darkMode = localStorage.getItem("dark-mode");
  if (!darkMode) {
    store("false");
    logo.src = "images/logo-white.png";
    moon.style.display = "block";
    sun.style.display = "none";
  } else if (darkMode) {
    body.classList.add("dark-mode");
    logo.src = "images/logo-oscuro.png";
    sun.style.display = "block";
    moon.style.display = "none";
  }
}

function store(value) {
  localStorage.setItem("dark-mode", value);
}
