const overlay = document.getElementById("overlay");
const closed = document.getElementById("close");
const modalWindow = document.getElementById("modal");

closed.addEventListener("click", function () {
  overlay.classList.add("hidden");
  modalWindow.classList.add("hidden");
});

overlay.addEventListener("click", function () {
  overlay.classList.add("hidden");
  modalWindow.classList.add("hidden");
});

// contact page modal page
const contactOverlay = document.getElementById("overlay");
const contactModal = document.getElementById("contact-modal");

const contactLink = document.getElementById("contact-us");

const aboutLink = document.getElementById("about-us");

const quitBtn = document.getElementById("quit-contact");

contactLink.addEventListener("click", function () {
  contactModal.classList.remove("hidden");
  contactOverlay.classList.remove("hidden");
});

quitBtn.addEventListener("click", function () {
  contactModal.classList.add("hidden");
  contactOverlay.classList.add("hidden");
});

contactOverlay.addEventListener("click", function () {
  contactModal.classList.add("hidden");
});

// About page modal code
const aboutPage = document.getElementById("about-us-modal");
const aboutCloseBtn = document.getElementById("about-close");

aboutLink.addEventListener("click", function () {
  aboutPage.classList.remove("hidden");
  contactOverlay.classList.remove("hidden");
});

contactOverlay.addEventListener("click", function () {
  aboutPage.classList.add("hidden");
});

aboutCloseBtn.addEventListener("click", function () {
  aboutPage.classList.add("hidden");
  contactOverlay.classList.add("hidden");
});

// contact us validation
const contactBtn = document.getElementById("contact-btn");
const contactComment = document.getElementById("contact-comment");
const contactEmail = document.getElementById("contact-email");
const contactName = document.getElementById("contact-name");
