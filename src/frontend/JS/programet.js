const container = document.getElementById('content');

function fetchBachelorPrograms() {
  fetch('/studentManagement/src/backend/Database/API/bachelorDataApi.php?bachelor=true')
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
          name.textContent = "Program: " + item.fushaStudimit;

          const dega = document.createElement('p');
          dega.textContent = "Faculty: " + item.emri_deges;

          div.appendChild(name);
          div.appendChild(dega);
          container.appendChild(div);
        });
      } else {
        console.error("No bachelor programs found or not an array", data);
      }
    })
    .catch(err => console.error("Fetch error:", err));
}

fetchBachelorPrograms();