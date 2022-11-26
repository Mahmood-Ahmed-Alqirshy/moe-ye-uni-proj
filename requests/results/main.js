let yearSelector = document.getElementById('years');
let termSelector = document.getElementById('term');
let seatNumberDisplay = document.getElementById('seat-number-display');
let seatNumber = document.getElementById('seat-number');

console.log(seatNumber);
[yearSelector, termSelector].forEach((element => {
  element.addEventListener('change', () => {
    seatNumber.value = "";
    if (yearSelector.value == 12 && termSelector.value == 2) {
      seatNumber.setAttribute("required", "");
      seatNumberDisplay.classList.remove('d-none');
    }
    else {
      seatNumber.removeAttribute("required");
      seatNumberDisplay.classList.add('d-none');
    }
  })
}))

