const emptyCart = document.getElementById("empty");
const addedCart = document.getElementById("added-cart");

const data = JSON.parse(jar.get("data"));
const itemsInsideCookie = Object.keys(data).length;
if (itemsInsideCookie === 0) {
  empty.classList.remove("hidden");
  addedCart.classList.add("hidden");

  const emptyCart = document.createElement("p");
  emptyCart.className = "text-danger font-weight-bold";
  emptyCart.innerText = "Items are not added to the cart yet!";
  document.querySelector(".empty-cart").appendChild(emptyCart);
} else {
  empty.classList.add("hidden");
  addedCart.classList.remove("hidden");

  const parent = document.createElement("table");
  parent.className = "table table-responsive table-hover rounded";

  let totalPrice = 0;

  Object.keys(data).forEach((d) => {
    // cookie data variables
    const cartPrice = data[d].price;
    const cartName = data[d].name;
    const cartQuant = data[d].quantity;
    const cartImage = data[d].image;

    // Hidden input type sender
    const nameOfItem = document.createElement("input");
    nameOfItem.setAttribute("value", cartName);
    nameOfItem.setAttribute("hidden", true);
    nameOfItem.setAttribute("name", "Item-name[]");

    const itemPrice = document.createElement("input");
    itemPrice.setAttribute("value", cartPrice);
    itemPrice.setAttribute("hidden", true);
    itemPrice.setAttribute("name", "Item-price[]");

    const itemImage = document.createElement("input");
    itemImage.setAttribute("value", cartImage);
    itemImage.setAttribute("hidden", true);
    itemImage.setAttribute("name", "Item-image[]");

    const itemQuantity = document.createElement("input");
    itemQuantity.setAttribute("value", cartQuant);
    itemQuantity.setAttribute("hidden", true);
    itemQuantity.setAttribute("name", "Item-quantity[]");

    //Table row displayer

    const subParent = document.createElement("tr");
    subParent.className = "font-weight-bold alert alert-danger";

    const priceEl = document.createElement("td");
    // priceEl.className = "pl-5 pr-5"
    priceEl.innerText = cartPrice;

    const quantEl = document.createElement("td");
    quantEl.className = "pr-3 pl-3";
    quantEl.innerText = cartQuant;

    const nameEl = document.createElement("td");
    nameEl.innerText = cartName;

    const imageEl = document.createElement("td");
    const productImage = document.createElement("img");
    productImage.setAttribute("src", cartImage);
    productImage.setAttribute("width", "50px");

    const btnEl = document.createElement("td");
    const btnDel = document.createElement("a");
    btnDel.className = "cart-btn btn btn-danger";
    btnDel.innerText = "x";
    btnDel.setAttribute("data-name", cartName);

    let price = parseFloat(cartPrice);
    totalPrice = totalPrice + price * cartQuant;

    // size elements

    const sizeEl = document.createElement("td");
    const sizeSelect = document.createElement("select");
    sizeSelect.setAttribute("name", "size[]");
    sizeSelect.setAttribute("id", "multiple-size");

    sizeSelect.className = "w-100 form-control font-weight-bold";
    const selectLabel = document.createElement("option");
    selectLabel.innerText = "Size";
    selectLabel.setAttribute("value", "Size");
    selectLabel.setAttribute("hidden", true);
    selectLabel.setAttribute("selected", true);
    selectLabel.setAttribute("disabled", true);
    // Kit sizes
    const xlSize = document.createElement("option");
    xlSize.setAttribute("value", "xl");
    xlSize.innerText = "XL";
    const mSize = document.createElement("option");
    mSize.setAttribute("value", "m");
    mSize.innerText = "M";
    const sSize = document.createElement("option");
    sSize.setAttribute("value", "s");
    sSize.innerText = "S";
    // Boot sizes
    // Kit sizes
    const _42 = document.createElement("option");
    _42.setAttribute("value", "42");
    _42.innerText = "42";
    const _41 = document.createElement("option");
    _41.setAttribute("value", "41");
    _41.innerText = "41";
    const _40 = document.createElement("option");
    _40.setAttribute("value", "40");
    _40.innerText = "40";
    const _39 = document.createElement("option");
    _39.setAttribute("value", "39");
    _39.innerText = "39";
    const _38 = document.createElement("option");
    _38.setAttribute("value", "38");
    _38.innerText = "38";
    // Appender to the container class
    // appending option to select
    sizeSelect.appendChild(xlSize);
    sizeSelect.appendChild(mSize);
    sizeSelect.appendChild(sSize);
    sizeSelect.appendChild(_42);
    sizeSelect.appendChild(_41);
    sizeSelect.appendChild(_40);
    sizeSelect.appendChild(_39);
    sizeSelect.appendChild(_38);
    // sizeSelect.appendChild(xlSize);

    sizeSelect.appendChild(selectLabel);
    // appending select to the table td
    sizeEl.appendChild(sizeSelect);

    imageEl.appendChild(productImage);
    btnEl.appendChild(btnDel);
    subParent.appendChild(nameEl);
    subParent.appendChild(priceEl);
    subParent.appendChild(quantEl);
    subParent.appendChild(imageEl);
    subParent.appendChild(btnEl);
    parent.appendChild(subParent);
    parent.appendChild(nameOfItem);
    parent.appendChild(itemPrice);
    parent.appendChild(itemQuantity);
    parent.appendChild(sizeEl);
    parent.appendChild(itemImage);
    // cartLength.appendChild(span);
    document.querySelector(".multiple-cart-item").appendChild(parent);
  }); // end of for loop

  // Total Price Teller
  const hiddenTotalPrice = document.createElement("input");
  hiddenTotalPrice.setAttribute("hidden", true);
  hiddenTotalPrice.setAttribute("name", "tot-price");
  hiddenTotalPrice.setAttribute("value", totalPrice);
  hiddenTotalPrice.setAttribute("id", "totalMoney");
  document.querySelector(".table").appendChild(hiddenTotalPrice);

  const totalPriceTeller = document.createElement("p");
  totalPriceTeller.className =
    "bg-success rounded text-light mb-3 w-50 mt-4 p-2";
  totalPriceTeller.innerText = "Total Price: " + totalPrice + "$";
  document.querySelector(".table").appendChild(totalPriceTeller);

  // getting cookie item length
  const cartCounter = Object.keys(data).length;
  const cartLength = document.createElement("input");
  cartLength.setAttribute("value", cartCounter);
  cartLength.setAttribute("name", "length");
  cartLength.setAttribute("hidden", true);

  document.querySelector(".multiple-cart-item").appendChild(cartLength);
} // end of else

// Delete btn clicked
const cartDelete = document.querySelectorAll(".cart-btn");

cartDelete.forEach(function (del) {
  del.addEventListener("click", function () {
    const cookieItemName = del.getAttribute("data-name");

    let data = jar.get("data");
    data = JSON.parse(data);

    const item = Object.keys(data).find((id) => id === cookieItemName);

    delete data[cookieItemName];
    jar.set("data", JSON.stringify(data));
    window.location.reload();
  });
});

// phone and flag provider
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

// input form validation

// Footer date provider
const date = new Date();
let d = date.getFullYear();
document.getElementById("date").innerHTML = d;
