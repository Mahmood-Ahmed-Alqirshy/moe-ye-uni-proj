const container = document.getElementById('container');
const governoratesCheckBoxes = document.querySelectorAll('#governorate input[type="checkbox"]');
const typesCheckBoxes = document.querySelectorAll('#type input[type="checkbox"]');
const gendersCheckBoxes = document.querySelectorAll('#gender input[type="checkbox"]');
const priceRanges = [
  document.getElementById('primary'),
  document.getElementById('middle'),
  document.getElementById('secondary')
];
const priceAmount = {
  primary: document.getElementById('primary-value'),
  middle: document.getElementById('middle-value'),
  secondary: document.getElementById('secondary-value')
};
const priceValues = {
  primary: '1000000',
  middle: '1000000',
  secondary: '1000000'
}
document.querySelectorAll('#prices input[type="range"]').forEach(element => {
  element.addEventListener('input', async (event) => {
    priceAmount[event.target.id].innerText = event.target.value;
  })
  element.addEventListener('change', event => {
    priceValues[event.target.id] = event.target.value;
    priceAmount[event.target.id].innerText = (+event.target.value >= 1000000) ? 'الكل' : (+event.target.value <= 0) ? 'مجانا' : event.target.value;
    renderData();
  })
})

governoratesCheckBoxes.reduce = Array.prototype.reduce;
let selectedGovernorates = [];
let selectedTypes = [];
let selectedGenders = [];

let fetchedData = null;
let data;

renderData();

checkBoxEventListener(governoratesCheckBoxes, selectedGovernorates);
checkBoxEventListener(typesCheckBoxes, selectedTypes);
checkBoxEventListener(gendersCheckBoxes, selectedGenders);

function checkBoxEventListener(checkBoxes, data) {
  checkBoxes.forEach(element => {
    element.addEventListener('change', (event) => {
      if (event.target.checked)
        data.push(e.target.value);
      else
        data.splice(data.indexOf(event.target), 1);
      renderData();
    })
  });
}
function dataFilter(data, selected, attribute) {
  if (selected.length > 0)
    return data.filter(e => selected.includes(e[attribute]));
  return data;
}
function priceFilter(data) {
  return data.filter(e => checkPrice(e, priceValues, 'primary') && checkPrice(e, priceValues, 'middle') && checkPrice(e, priceValues, 'secondary'));
}
function checkPrice(data, input, stage) {
  return ((+input[stage] < 1000000) ? ((data[stage]) ? data[stage] : Number.MAX_SAFE_INTEGER) <= +input[stage] : true)
}
async function getData() {
  fetchedData = await fetch(`http://${location.hostname}/moe-yemen/api/schools/`);
  fetchedData = await fetchedData.json();
}
async function renderData() {
  container.innerHTML = "";
  if (fetchedData == null)
    await getData();

  data = fetchedData;
  data = dataFilter(data, selectedGovernorates, 'governorate')
  data = dataFilter(data, selectedTypes, 'schoolType')
  data = dataFilter(data, selectedGenders, 'gender');
  data = priceFilter(data);
  for (let i = 0; i < data.length; i++) {
    container.innerHTML +=
      `<div class="p-4 mb-3 bg-light rounded">
<div class="row">
  <div class="col-12 m-auto col-md-4">
    <img src="1.jpg" alt="school-image" class="w-100 thumbnail-img">
  </div>
  <h4 class="col-12 col-md-8 my-5 mx-auto" style="display:flex; align-items:center; justify-content:center;">
    ${data[i].name}
  </h4>
</div>
<hr>
<div class="collapse" id="school-${data[i].ID}">
  <table class="w-100 table">
    <tr>
      <td>الموقع :</td>
      <td id="location">${data[i].governorate}, ${data[i].directorate}</td>
    </tr>
    ${(data[i].address) ?
        `<tr>
      <td>العنوان :</td>
      <td id="address">${data[i].address}</td>
    </tr>`
        :
        ``
      }
    <tr>
      <td>الجنسية :</td>
      <td id="nationality">${data[i].nationality}</td>
    </tr>
    <tr>
      <td>النوع :</td>
      <td id="school_type">${data[i].schoolType}</td>
    </tr>
    <tr>
      <td>الجنس :</td>
      <td id="gender">${data[i].gender}</td>
    </tr>
    ${(data[i].eMail) ?
        `<tr>
      <td>البريد الالكتروني :</td>
      <td id="e-mail">${data[i].eMail}</td>
    </tr>`
        :
        ``
      }
    ${(data[i].phone) ?
        `<tr>
      <td>رقم التواصل :</td>
      <td id="phone">${data[i].phone}</td>
    </tr>`
        :
        ``
      }
    <tr>
      <td colspan="2">مراحل التدريس ورسومها :</td>
    </tr>
    <tr>
      <td>الابتدائي :</td>
      <td id="primary">${(data[i].primary) ? data[i].primary : `لا تدرس`}</td>
    </tr>
    <tr>
      <td>الاعدادي :</td>
      <td id="mid-school">${(data[i].middle) ? data[i].middle : `لا تدرس`}</td>
    </tr>
    <tr>
      <td>الثانوية :</td>
      <td id="secondary">${(data[i].secondary) ? data[i].secondary : `لا تدرس`}</td>
    </tr>
  </table>
  ${(data[i].googleMap) ?
        `<a href="${data[i].googleMap}" id="google-map">الخريطة</a>` : ``}
  <hr>
  <hr>
</div>
<a href="http://${location.hostname}/moe-yemen/requests/register/?school=${data[i].ID}&name=${data[i].name}" class="btn mx-3 btn-dark text-light">تسجيل</a>
<button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#school-${data[i].ID}">تفاصيل</button>
</div>`
  }
}
