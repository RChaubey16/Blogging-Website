function closeFunction() {
  document.getElementById("alert").style.display = "none";
  console.log("Hey");
}

document.getElementById("menu-box").addEventListener("click", function () {
  document.getElementById("nav-box").style.display = "flex";
  console.log("Hey");
});
