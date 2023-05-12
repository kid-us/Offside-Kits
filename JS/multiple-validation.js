const infoParagraph = document.getElementById("info-p");
const emailInput = document.getElementById("email-input");
const addressInput = document.getElementById("address-input");
const nameInput = document.getElementById("name-input");
const mainBox = document.getElementById("main-box");
const stripeBtn = document.querySelector(".stripe-button-el");

mainBox.addEventListener("mouseenter", function () {
  if (
    emailInput.value === "" ||
    emailInput.value.length < 10 ||
    nameInput.value === "" ||
    nameInput.value.length < 4 ||
    addressInput.value === "" ||
    addressInput.value.length < 7 ||
    phoneInput.value === "" ||
    phoneInput.value.length < 9
  ) {
    stripeBtn.style.display = "none";
    infoParagraph.classList.remove("hidden");
  } else {
    infoParagraph.classList.add("hidden");
    stripeBtn.style.display = "inline-block";
  }
});

mainBox.addEventListener("mouseleave", function () {
  stripeBtn.style.display = "inline-block";
  infoParagraph.classList.add("hidden");
});
