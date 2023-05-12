const kitSize = document.getElementById("kit-size");
const bootSize = document.getElementById("boot-size");
const sizeIndicatorName = document.getElementById("name").textContent;

if (sizeIndicatorName === "Kit") {
  kitSize.classList.remove("hidden");
} else {
  bootSize.classList.remove("hidden");
}

// phone with flag indicator
let phoneInput = document.querySelector("#phone-flag");
intlTelInput(phoneInput, {
  initialCountry: "auto",
  geoIpLookup: function (success, failure) {
    $.get("https://ipinfo.io", function () {}, "jsonp").always(function (resp) {
      let countryCode = resp && resp.country ? resp.country : "us";
      success(countryCode);
    });
  },
});

// payment form validation
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
    console.log("Please fill the form correctly");
    stripeBtn.style.display = "none";
    infoParagraph.classList.remove("hidden");
    console.log(emailInput.value.length);
  } else {
    infoParagraph.classList.add("hidden");
    stripeBtn.style.display = "inline-block";
  }
});

mainBox.addEventListener("mouseleave", function () {
  stripeBtn.style.display = "inline-block";
  infoParagraph.classList.add("hidden");
});
