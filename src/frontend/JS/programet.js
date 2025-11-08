

const container = document.getElementById('content');
const bachelorBtn = document.getElementById('bachelorBtn');
const masterBtn = document.getElementById('masterBtn');
const phdBtn = document.getElementById('phdBtn');


function fetchProgram(program) {
  fetch('/studentManagement/src/backend/API/ProgrametDataApi.php?' + program + '=true')
    .then(response => {
      console.log("Fetch response:", response);
      if (!response.ok) {
        throw new Error("Network response was not ok: " + response.status);
      }
      return response.json();
    })
    .then(data => {
      console.log("Data received:", data);
      if (data.success && Array.isArray(data.programi)) {
        container.innerHTML = '';
        data.programi.forEach(item => {
          const div = document.createElement('div');
          div.classList.add('contentItem');

          const img = document.createElement('img');
            img.src = '..' + item.imgPath; 
            img.alt = item.programi; 
            img.style.width = '200px';
            img.style.borderRadius = '10px';

             console.log(item.imgPath);

          const name = document.createElement('p');
          name.textContent = "Programi: " + item.programi;

          const dega = document.createElement('p');
          dega.textContent = "Fusha e studimit: " + item.fushaStudimit;

          const pershkrimi = document.createElement('p');
          pershkrimi.textContent = "Pershkrimi: " + item.pershkrimi;

          div.appendChild(img);
          div.appendChild(name);
          div.appendChild(dega);
          div.appendChild(pershkrimi);
          container.appendChild(div);
        });
      } else {
        console.error("No bachelor programs found or not an array", data);
      }
    })
    .catch(err => console.error("Fetch error:", err));
}

bachelorBtn.addEventListener('click', () => {
    fetchProgram('bachelor');
  });

  masterBtn.addEventListener('click', () => {
      fetchProgram('master');
  });

  phdBtn.addEventListener('click', () => {

  });

const studyBtn = document.getElementById('studyBtn');
const applyBtn = document.getElementById('applyBtn');
const smisBtn = document.getElementById('smisBtn');



  studyBtn.addEventListener('click', () => {
    fetchProgram('bachelor');
  });

  applyBtn.addEventListener('click', () => {
container.innerHTML = '';
  });

  smisBtn.addEventListener('click', () => {
     window.location.href = "../static/login.html";
  });

fetchProgram('bachelor');