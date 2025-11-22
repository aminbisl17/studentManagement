document.addEventListener("DOMContentLoaded", function() {

  const  studentData = sessionStorage.getItem('student');
  if (!studentData) {
    window.location.href = '../static/login.html';
    return;
  }

  const student = JSON.parse(studentData);
  const content = document.getElementById('content');
  
  document.getElementById('data').textContent =
    `${student.Emri} ${student.Mbiemri}!`;

       let dateStr = student.CreatedAt;

    if (typeof dateStr === 'object' && dateStr.date) {
        dateStr = dateStr.date; // e formaton daten
    }
    const date = new Date(dateStr.replace(' ', 'T'));
    const createdAt = document.createElement('p');
    createdAt.textContent = date.toLocaleString();


    const grupi = document.createElement('p');
    grupi.textContent = `Grupi: ${student.grupi}`;

    const email = document.createElement('p')
    email.textContent = `Email: ${student.emailUBT}`;

   content.appendChild(grupi);
   content.appendChild(email);
   content.appendChild(createdAt);


    document.getElementById('logoutBtn').addEventListener('click', () =>{
         if (confirm("Are you sure you want to log out?")) {
        sessionStorage.removeItem('student');
        window.location.href = '../static/main.html';
         }
    });
});