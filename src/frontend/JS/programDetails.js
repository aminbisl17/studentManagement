document.addEventListener("DOMContentLoaded", function() {

const selectedProgram = JSON.parse(localStorage.getItem('selectedProgram'));
if (selectedProgram) {
  document.getElementById('text').textContent = selectedProgram.lokacioni;
  document.querySelector(".hero").style.backgroundImage = `url(${'..' + selectedProgram.imgPath})`;
}
});