let password = document.getElementById("pass");
let showBtn = document.getElementById("show-password");

showBtn.addEventListener("click", function () {
  if (password.getAttribute("type") === "password") {
    password.setAttribute("type", "text");
  } else {
    password.setAttribute("type", "password");
  }
});
