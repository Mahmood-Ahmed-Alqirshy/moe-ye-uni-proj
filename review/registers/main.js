let requests = document.getElementById('requests');
let name = document.getElementById('name');
let sex = document.getElementById('sex');
let nationality = document.getElementById('nationality');
let dateOfBirth = document.getElementById('date-of-birth');
let grade = document.getElementById('grade');
let studentPhoto = document.getElementById('student-photo');
let school = document.getElementById('school');
let residence = document.getElementById('residence');
let birthCertificate = document.getElementById('birth-certificate');
let accept = document.getElementById('accept');
let reject = document.getElementById('reject');
let rejectMassage = document.getElementById('reject-massage');
// sex.removeAttribute('disabled');
// sex.setAttribute('disabled','');
const senders = document.getElementsByClassName('senders');
senders.forEach = Array.prototype.forEach;


let data = null;
renderRequest();

let requestIndex = -1;

accept.addEventListener('click', async () => {
  await fetch('http://localhost/moe-yemen/api/registers/', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({
      status: 'accepted',
      data: data[requestIndex]
    })
  })
  clearScreen();
  renderRequest();
});

reject.addEventListener('click', async () => {
  await fetch('http://localhost/moe-yemen/api/registers/', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({
      status: 'rejected',
      id: data[requestIndex].id,
      massage: rejectMassage.value
    })
  })
  clearScreen();
  renderRequest();
})

function clearScreen() {
  name.innerText = "";
  sex.innerText = "";
  nationality.innerText = "";
  dateOfBirth.innerText = "";
  grade.innerText = "";
  school.innerText = "";
  residence.innerText = "";
  studentPhoto.innerHTML = "";
  birthCertificate.innerHTML = "";
  rejectMassage.value = "";
  senders.forEach((e) => {
    e.setAttribute('disabled', '');
  })
}

async function getData() {
  data = await fetch('http://localhost/moe-yemen/api/registers/');
  data = await data.json();
}
async function renderRequest() {
  await getData();
  
  requests.innerHTML = "";
  for (let i = 0; i < data.length; i++) {
    requests.innerHTML += `<button class="btn btn-dark text-light text-center w-100 p-3 mb-3 request" id="request-${i}">${data[i].name}</button>`;
  }
  const requestsButtons = document.getElementsByClassName('request');
  requestsButtons.forEach = Array.prototype.forEach;
  requestsButtons.forEach((element) => {
    element.addEventListener('click', (event) => {
      requestIndex = +event.target.id.split('-').pop();
      name.innerText = data[requestIndex].name;
      sex.innerText = data[requestIndex].sexName;
      nationality.innerText = data[requestIndex].nationalityName;
      dateOfBirth.innerText = data[requestIndex].dateOfBirth;
      grade.innerText = data[requestIndex].gradeName;
      school.innerText = data[requestIndex].schoolName;
      residence.innerText = data[requestIndex].residenceName;
      studentPhoto.innerHTML = `<div class="mx-auto w-50 w-lg-25 bg-dark rounded" style="aspect-ratio: 1/1;"><img src="http://${location.hostname}/moe-yemen/images/students-photos/${data[requestIndex].studentPhoto}" alt="student" class="w-100 h-100 rounded" style="object-fit: cover;"></div>`;
      birthCertificate.innerHTML = `<img src="http://${location.hostname}/moe-yemen/images/birth-certificates/${data[requestIndex].birthCertificate}" class="w-100" alt=""></img>`
      senders.forEach((e) => {
        e.removeAttribute('disabled');
      })
    })
  })
}