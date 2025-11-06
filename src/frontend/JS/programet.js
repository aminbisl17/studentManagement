

const container = document.getElementById('content');
const bachelorBtn = document.getElementById('bachelorBtn');
const masterBtn = document.getElementById('masterBtn');
const phdBtn = document.getElementById('phdBtn');


function fetchBachelorPrograms() {
  fetch('/studentManagement/src/backend/API/ProgrametDataApi.php?bachelor=true')
    .then(response => {
      console.log("Fetch response:", response);
      if (!response.ok) {
        throw new Error("Network response was not ok: " + response.status);
      }
      return response.json();
    })
    .then(data => {
      console.log("Data received:", data);
      if (data.success && Array.isArray(data.bachelor)) {
        container.innerHTML = '';
        data.bachelor.forEach(item => {
          const div = document.createElement('div');
          div.classList.add('contentItem');

          const name = document.createElement('p');
          name.textContent = "Programi: " + item.programi;

          const dega = document.createElement('p');
          dega.textContent = "Fusha e studimit: " + item.fushaStudimit;

          const pershkrimi = document.createElement('p');
          pershkrimi.textContent = "Pershkrimi: " + item.pershkrimi;

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


function fetchMasterPrograms() {
  fetch('/studentManagement/src/backend/API/ProgrametDataApi.php?master=true')
    .then(response => {
      console.log("Fetch response:", response);
      if (!response.ok) {
        throw new Error("Network response was not ok: " + response.status);
      }
      return response.json();
    })
    .then(data => {
      console.log("Data received:", data);
      if (data.success && Array.isArray(data.master)) {
        container.innerHTML = '';
        data.master.forEach(item => {
          const div = document.createElement('div');
          div.classList.add('contentItem');

          const name = document.createElement('p');
          name.textContent = "Programi: " + item.programi;

          const dega = document.createElement('p');
          dega.textContent = "Fusha e studimit: " + item.fushaStudimit;

          const pershkrimi = document.createElement('p');
          pershkrimi.textContent = "Pershkrimi: " + item.pershkrimi;

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
    fetchBachelorPrograms();
  });

  masterBtn.addEventListener('click', () => {
     fetchMasterPrograms();
  });

  phdBtn.addEventListener('click', () => {

  });

fetchBachelorPrograms();