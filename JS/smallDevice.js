const menuBtn = document.getElementById("click-me");
const menuPage = document.getElementById("menu-page");
const searchSmallDevice = document.getElementById("search-small");
const searchBtn = document.getElementById("search-btn");

menuBtn.addEventListener("click", function () {
  if (menuPage.classList.contains("hidden")) {
    menuPage.classList.remove("hidden");
  } else {
    menuPage.classList.add("hidden");
  }
});

// On small device search btn clicked
searchBtn.addEventListener("click", function () {
  if (searchSmallDevice.classList.contains("hidden")) {
    searchSmallDevice.classList.remove("hidden");
  } else {
    searchSmallDevice.classList.add("hidden");
  }
});

// Small device search
let smallSearchInput = document.getElementById("search-small");
smallSearchInput.addEventListener("keyup", function () {
  console.log(smallSearchInput.value);
  if (!smallSearchInput.value == "") {
    let xhg = new XMLHttpRequest();
    xhg.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("search-items").innerHTML = this.responseText;
      }
    };
    xhg.open("GET", "/search.php?search=" + smallSearchInput.value, true);
    xhg.send();
  } else {
    document.getElementById("search-items").innerHTML = "";
  }
});

// // small device cart link controller
let cookieData = jar.get("data");
cookieData = JSON.parse(cookieData);

const cookieCartCounter = Object.keys(cookieData).length;
if (cookieCartCounter == 0) {
  smallBadge.innerHTML = "";
} else {
  smallBadge.innerText = cookieCartCounter;
}
