// Alert message
function closeFunction() {
  document.getElementById("alert").style.display = "none";
  console.log("Hey");
}

// hamburger menu

document.getElementById("menu-box").addEventListener("click", function () {
  document.getElementById("nav-box").style.transition = "transform 0.4s";
  document.getElementById("nav-box").style.display = "flex";
  console.log("Hey");
});

document
  .getElementById("close-menu-btn")
  .addEventListener("click", function () {
    document.getElementById("nav-box").style.display = "none";
    console.log("Hey");
  });

/* View Password*/
document.getElementById("login__eye").addEventListener("click", function () {
  pwd = document.getElementById("login__pwd");
  if (pwd.type == "password") {
    pwd.type = "text";
  } else {
    pwd.type = "password";
  }
});
