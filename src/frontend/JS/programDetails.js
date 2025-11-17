const selectedProgram = JSON.parse(localStorage.getItem('selectedProgram'));
if (selectedProgram) {
  document.getElementById('text').textContent = selectedProgram.lokacioni;
}
