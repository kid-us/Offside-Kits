// Carts
const badge = document.getElementById("badge-counter");
const smallBadge = document.getElementById("badged");
const cartBtns = document.querySelectorAll(".cart");

cartBtns.forEach(function (button) {
  button.addEventListener("click", function (event) {
    const itemPrice = this.children[0].getAttribute("data-price");
    const itemName = this.children[0].getAttribute("data-name");
    const itemImage = this.children[0].getAttribute("data-image");
    console.log();

    // Cookie
    const store = jar.get("data");
    // if (store) {
    // }
    if (!store) {
      const data = {
        [itemName]: {
          price: itemPrice,
          name: itemName,
          image: itemImage,
          quantity: 1,
        },
      };
      badge.innerText = "1";
      smallBadge.innerText = "1";
      jar.set("data", JSON.stringify(data));
    } else {
      let data = jar.get("data");
      data = JSON.parse(data);

      const item = Object.keys(data).find((id) => id === itemName);
      const cartCounter = Object.keys(data).length;

      if (item) {
        data[item].quantity++;

        badge.innerText = cartCounter.toString();
        smallBadge.innerText = cartCounter.toString();
      } else {
        data[itemName] = {
          price: itemPrice,
          name: itemName,
          image: itemImage,
          quantity: 1,
        };
        badge.innerText = (cartCounter + 1).toString();
        smallBadge.innerText = (cartCounter + 1).toString();
      }

      jar.set("data", JSON.stringify(data));
    }
  });
});

// Pagination code
let pageNumber = document.getElementById("page-number").textContent;
document
  .querySelector(".page" + pageNumber)
  .setAttribute("class", "bg-danger page-link btn text-light");

// cookie cleaner when sign-out link clicked
const signOutLink = document.getElementById("account-sign-out");
signOutLink.addEventListener("click", function () {
  jar.remove("data");
  // window.location.reload();
});

//cookie cleaner when single item buyer button (shop now) clicked
const showNowBtn = document.querySelectorAll(".shop-btn");
showNowBtn.forEach(function (shopbtn) {
  shopbtn.addEventListener("click", function () {
    jar.remove("data");
  });
});

// cookie remover after buying multiple items
if (jar.get("msg") === "yes") {
  jar.remove("data");
  jar.remove("msg");
}

// Dashboard viewer
const dashboardBtn = document.getElementById("user-log-reg-profile");
const dashboard = document.getElementById("dashboard");
// Account viewer
const accountBtn = document.getElementById("user-log-reg-profile");
const arrowDisplay = document.getElementById("arrow");
const accountDisplayPage = document.getElementById("accounts-page");

if (accountBtn.innerText === "Accounts ⇣") {
  accountBtn.addEventListener("click", function () {
    if (accountDisplayPage.classList.contains("hidden")) {
      accountDisplayPage.classList.remove("hidden");
      arrowDisplay.innerHTML = "⇡";
    } else {
      accountDisplayPage.classList.add("hidden");
      arrowDisplay.innerHTML = "⇣";
    }
  });
} else {
  dashboardBtn.addEventListener("click", function () {
    if (dashboard.classList.contains("hidden")) {
      dashboard.classList.remove("hidden");
    } else {
      dashboard.classList.add("hidden");
    }
  });
}
// Footer date provider
const date = new Date();
let d = date.getFullYear();
document.getElementById("date").innerHTML = d;

// Cart badge link controller
let data = jar.get("data");
data = JSON.parse(data);

const cartCounter = Object.keys(data).length;

if (cartCounter == 0) {
  badge.innerHTML = "";
} else {
  badge.innerText = cartCounter;
}
