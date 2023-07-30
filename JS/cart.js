window.addEventListener("load", () => {
  let cart = jar.get("data");
  if (cart) {
    cart = JSON.parse(cart);
    const cartNumber = Object.keys(cart).length.toString();
    // const itemInCart = Object.keys(cart).length;
    cartAdd(cart, cartNumber);
  } else {
    badge.innerText = "0";
    smallBadge.textContent = "0";
    emptyCart();
  }
});

function emptyCart() {
  const emptyContainer = document.createElement("div");
  emptyContainer.className = "text-center p-5 rounded";

  const emptyImage = document.createElement("img");
  emptyImage.className = "mt-5 pt-4 rounded";
  emptyImage.setAttribute("src", "Img/empty.png");
  emptyImage.setAttribute("width", "200px");

  emptyContainer.appendChild(emptyImage);
  document.querySelector(".multiple-item").appendChild(emptyContainer);
  document.getElementById("cart-checkout-btn").classList.add("hidden");
}


function cartAdd(cart, cartNumber) {
  document.getElementById("item-length").setAttribute("value", cartNumber);
  document.getElementById("cart-checkout-btn").classList.remove("hidden");
  badge.textContent = cartNumber;
  smallBadge.textContent = cartNumber;
  document.getElementById("cart-section").innerHTML = "";

  const row = document.createElement("div");
  row.className = "row rounded cart-items cart-item-page pt-2";
  let totPrice = 0;

  Object.keys(cart).forEach((d) => {
    const cartName = cart[d].name;
    const cartPrice = cart[d].price;
    const cartImage = cart[d].image;
    const cartType = cart[d].type;
    const cartQuant = cart[d].quantity;

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

    // total Price
    let price = parseFloat(cartPrice);
    totPrice = totPrice + price * cartQuant;

    //Column 1 Image
    const col1 = document.createElement("div");
    col1.className = "col-5";
    const img1 = document.createElement("img");
    img1.setAttribute("src", cartImage);
    img1.setAttribute("width", "100px");

    // Column 2 Name
    const col2 = document.createElement("div");
    col2.className = "col-5";
    const itemLabel = document.createElement("p");
    itemLabel.className = "fw-semibold";
    itemLabel.textContent = cartName;
    const priceLabel = document.createElement("h6");
    priceLabel.textContent = cartPrice + "$";

    const inputGroup1 = document.createElement("div");
    inputGroup1.className = "input-group";
    const input1 = document.createElement("input");
    input1.setAttribute("type", "number");
    input1.setAttribute("name", "Item-quant[]");
    input1.setAttribute("min", "1");
    input1.setAttribute("max", "22");
    input1.setAttribute("value", cartQuant);
    input1.className = "form-control w-100";

    // Kit Size 
    const inputGroup2 = document.createElement("div");
    inputGroup2.className = "input-group";
    const select = document.createElement("select");
    select.setAttribute("name", "Item-size[]");
    select.className = "form-select";

    const xlSize = document.createElement("option");
    xlSize.setAttribute("value", "xl");
    xlSize.innerText = "XL";
    const lSize = document.createElement("option");
    lSize.setAttribute("value", "l");
    lSize.innerText = "L";
    const mSize = document.createElement("option");
    mSize.setAttribute("value", "m");
    mSize.innerText = "M";
    const sSize = document.createElement("option");
    sSize.setAttribute("value", "s");
    sSize.innerText = "S";

    // Boot size
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

    // Column 4 Remove
    const col3 = document.createElement("div");
    col3.className = "col-2";
    const itemRemove = document.createElement("a");
    itemRemove.setAttribute("href", "#");
    itemRemove.setAttribute("data-name", cartName);
    itemRemove.className =
      "remove-link-cart mt-4 btn pt-2 text-danger fw-semibold fs-4";
    itemRemove.textContent = "x";

    const hr = document.createElement("hr");
    hr.className = "my-3 text-dark";

    col1.appendChild(img1);

    col2.appendChild(itemLabel);
    col2.appendChild(priceLabel)
    col2.appendChild(inputGroup1);
    inputGroup1.appendChild(input1);
    col2.appendChild(inputGroup2);
    inputGroup1.appendChild(select);
    if (cartType === 'kit') {
      select.appendChild(xlSize);
      select.appendChild(lSize);
      select.appendChild(mSize);
      select.appendChild(sSize);
    } else if (cartType === 'boot') {
      select.appendChild(_42);
      select.appendChild(_41);
      select.appendChild(_40);
      select.appendChild(_39);
      select.appendChild(_38);
    }

    col3.appendChild(itemRemove);

    row.appendChild(col1);
    row.appendChild(col2);
    row.appendChild(col3);
    row.appendChild(hr);
    row.appendChild(nameOfItem);
    row.appendChild(itemPrice);
    row.appendChild(itemImage);

    // row.appendChild(form);

    document.querySelector(".multiple-item").appendChild(row);
  });

  // total price
  let totalPrice = totPrice;
  document.getElementById("total-price").textContent = totalPrice + "$";
  document
    .getElementById("total-input-price")
    .setAttribute("value", totalPrice);
  const cartDelete = document.querySelectorAll(".remove-link-cart");
  cartDelete.forEach(function (rem) {
    rem.addEventListener("click", function () {
      if (cartNumber === "1") {
        jar.remove("data");
        window.location.reload();
      } else {
        const cookieItemName = rem.getAttribute("data-name");
        const item = Object.keys(cart).find(
          (id) => id === cookieItemName
        );
        delete cart[cookieItemName];
        jar.set("data", JSON.stringify(cart));
        window.location.reload();
      }
    });
  });
}

// Carts
const badge = document.getElementById("badge-counter");
const smallBadge = document.getElementById("badged");
const cartBtns = document.querySelectorAll(".cart");

// add to cart
cartBtns.forEach(function (button) {
  button.addEventListener("click", function (event) {
    const itemPrice = this.children[0].getAttribute("data-price");
    const itemName = this.children[0].getAttribute("data-name");
    const itemImage = this.children[0].getAttribute("data-image");
    const itemType = this.children[0].getAttribute("data-type");

    // Cookie
    const store = jar.get("data");
    if (!store) {
      const data = {
        [itemName]: {
          price: itemPrice,
          name: itemName,
          image: itemImage,
          type: itemType,
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
          type: itemType,
          quantity: 1,
        };
        badge.innerText = (cartCounter + 1).toString();
        smallBadge.innerText = (cartCounter + 1).toString();
      }

      jar.set("data", JSON.stringify(data));
    }

    let cart = JSON.parse(jar.get("data"));
    const cartNumber = Object.keys(cart).length;
    cartAdd(cart, cartNumber);
  });
});


// cart clear
const cartClear = document.getElementById("clear-cart");
cartClear.addEventListener("click", function () {
  jar.remove("data");
  window.location.reload();
});

// cookie remover after buying multiple items
// if (jar.get("msg")) {
//   jar.remove("data");
//   jar.remove("msg");
// }
