const editBtn = document.getElementById("edit");
const cancelBtn = document.getElementById("cancel");
const doneBtn = document.getElementById("done");
const passInfo = document.getElementById("pass-info");
const email = document.getElementById("email");
const username = document.getElementById("username");
const changeText = document.getElementById("change-text");
const currentPassword = document.getElementById("input-password");
const newPassword = document.getElementById("new-password");

const dashSignOutLink = document.getElementById("dash-sign-out");
dashSignOutLink.addEventListener("click", function () {
  jar.remove("data");
});
// When also change password link clicked
changeText.addEventListener("click", function () {
  if (newPassword.classList.contains("hidden")) {
    newPassword.classList.remove("hidden");
    passInfo.classList.remove("hidden");
  } else {
    passInfo.classList.add("hidden");
    newPassword.classList.add("hidden");
  }
});

// When edit btn clicked
editBtn.addEventListener("click", function () {
  cancelBtn.classList.remove("hidden");
  changeText.classList.remove("hidden");

  doneBtn.removeAttribute("disabled");
  email.removeAttribute("disabled");
  username.removeAttribute("disabled");
  currentPassword.removeAttribute("disabled");
  currentPassword.setAttribute("value", "");
});

// When cancel btn clicked
cancelBtn.addEventListener("click", function () {
  cancelBtn.classList.add("hidden");
  changeText.classList.add("hidden");
  newPassword.classList.add("hidden");
  passInfo.classList.add("hidden");

  doneBtn.setAttribute("disabled", true);
  email.setAttribute("disabled", true);
  username.setAttribute("disabled", true);
  currentPassword.setAttribute("value", "00000000000");
  currentPassword.setAttribute("disabled", true);
});

// Footer date provider
const date = new Date();
let d = date.getFullYear();
document.getElementById("date").innerHTML = d;
