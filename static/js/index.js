// Alert message
function closeFunction() {
  document.getElementById("alert").style.display = "none";
  console.log("Hey");
}

// hamburger menu
var bars = document.getElementById("bars_img");
var close_menu = document.getElementById("close_img");
var flag = "off";
document.getElementById("menu-box").addEventListener("click", function () {
  if (flag == "off"){
    document.getElementById("nav-box").style.transition = "transform 0.4s";
    document.getElementById("nav-box").style.display = "flex";
    bars.style.display = 'none';
    close_menu.style.display = 'flex';
    flag = "on";
    console.log(flag);
  } else if (flag == "on"){
    document.getElementById("nav-box").style.display = "none";
    bars.style.display = 'flex';
    close_menu.style.display = 'none';
    flag = "off";
    console.log(flag);
  }
});

document
  .getElementById("close-menu-btn")
  .addEventListener("click", function () {
    document.getElementById("nav-box").style.display = "none";
    console.log("Hey");
  });


