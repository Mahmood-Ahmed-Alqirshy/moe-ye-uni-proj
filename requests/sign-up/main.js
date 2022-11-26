const username = document.getElementById('username');
const password = document.getElementById('password');
const repassword = document.getElementById('repassword');
const submit = document.getElementById('submit');
let usernames = [];

let strongPassword = /^(?=.*[0-9])(?=.*[!@#$%^\(\)\[\]\{\}&*])[a-zA-Z0-9!@#$%^\(\)\[\]\{\}&*]{6,16}$/;
// let strongPassword = /^(?=.*\d)(?=.*[a-zA-Z])[a-zA-Z0-9]{6,}$/;
// function isStrongPassword(string = "") {
//   if(string.match())
// }

function checkPassword(str) {
  // var re = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
  return re.test(str);
}


getUsernames()

async function getUsernames() {
  usernames = await fetch(`http://${location.hostname}/moe-yemen/api/usernames/`);
  usernames = await usernames.json();
}

submit.addEventListener('click', async (event) => {
  if (usernames.includes(username.value)) {
    username.classList.add('is-invalid');
    event.preventDefault();
  }
  else
    username.classList.remove('is-invalid');
  if (!strongPassword.test(password.value)) {
    password.classList.add('is-invalid');
    event.preventDefault();
  }
  else
    password.classList.remove('is-invalid');
  if (password.value !== repassword.value) {
    repassword.classList.add('is-invalid');
    event.preventDefault();
  }
  else
    repassword.classList.remove('is-invalid');
})