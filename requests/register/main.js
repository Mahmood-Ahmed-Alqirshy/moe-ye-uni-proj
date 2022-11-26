const submit = document.getElementById('submit');
const eMail = document.getElementById('email');
const phone = document.getElementById('phone');
submit.addEventListener('click', (event) => {
  if (eMail.value.trim() === "" && phone.value.trim() === "") {
    eMail.classList.add('is-invalid');
    phone.classList.add('is-invalid');
    event.preventDefault();
  } else {
    eMail.classList.remove('is-invalid');
    phone.classList.remove('is-invalid');
  }
})