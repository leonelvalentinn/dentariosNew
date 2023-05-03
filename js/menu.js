const menu = document.getElementById("menu");
const bars = document.getElementById("icon-menu");

bars.addEventListener("click", () => {
  bars.classList.toggle("open");
  menu.classList.toggle("open-menu");
});
