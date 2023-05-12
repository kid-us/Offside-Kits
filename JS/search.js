let searchInput = document.getElementById("search");
searchInput.addEventListener("keyup", function () {
  console.log(searchInput.value);
  if (!searchInput.value == "") {
    let xhg = new XMLHttpRequest();
    xhg.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("search-item").innerHTML = this.responseText;
      }
    };
    xhg.open("GET", "/search.php?national=" + searchInput.value, true);
    xhg.send();
  } else {
    document.getElementById("search-item").innerHTML = "";
  }
});
