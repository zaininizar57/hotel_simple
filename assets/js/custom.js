const btnModalRegister = document.getElementById("btn-modal-register");
const btnModalClose = document.getElementById("btn-modal-close");
const btnModalCloseX = document.getElementById("btn-close-x");
const modalRegister = document.getElementById("modal-register");

btnModalRegister.addEventListener("click", () => {
  modalRegister.classList.toggle("active");
});

btnModalClose.addEventListener("click", () => {
  modalRegister.classList.toggle("active");
});

btnModalCloseX.addEventListener("click", () => {
  modalRegister.classList.toggle("active");
});

const btnModalLogin = document.getElementById("btn-modal-login");
const btnModalCloseLogin = document.getElementById("btn-modal-close-login");
const btnModalCloseLoginX = document.getElementById("btn-close-login-x");
const modalLogin = document.getElementById("modal-login");

btnModalLogin.addEventListener("click", () => {
  modalLogin.classList.toggle("active");
});

btnModalCloseLogin.addEventListener("click", () => {
  modalLogin.classList.toggle("active");
});

btnModalCloseLoginX.addEventListener("click", () => {
  modalLogin.classList.toggle("active");
});
