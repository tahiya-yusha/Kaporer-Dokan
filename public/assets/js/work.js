const signUpBtn = document.getElementById("signUp");
const signInBtn = document.getElementById("signIn");
const container = document.querySelector(".container");

signUpBtn.addEventListener("click", () => {
  container.classList.add("right-panel-active");
});
signInBtn.addEventListener("click", () => {
  container.classList.remove("right-panel-active");
});



function openPopup(popupId) {
  var popup = document.getElementById(popupId);
  popup.classList.add("open-popup");
}

function closePopup(popupId) {
  var popup = document.getElementById(popupId);
  popup.classList.remove("open-popup");
}


