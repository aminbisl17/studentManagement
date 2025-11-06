const studyBtn = document.getElementById('studyBtn');
const applyBtn = document.getElementById('applyBtn');
const smisBtn = document.getElementById('smisBtn');



  studyBtn.addEventListener('click', () => {
    fetchBachelorPrograms();
  });

  applyBtn.addEventListener('click', () => {
container.innerHTML = '';
  });

  smisBtn.addEventListener('click', () => {
     window.location.href = "../static/login.html";
  });