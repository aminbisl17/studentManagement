document.addEventListener("DOMContentLoaded", function() {

  const  studentData = sessionStorage.getItem('student');
  if (!studentData) {
    window.location.href = '../static/login.html';
    return;
  }

  const student = JSON.parse(studentData);
  const content = document.getElementById('content');
  
       let dateStr = student.CreatedAt;

    if (typeof dateStr === 'object' && dateStr.date) {
        dateStr = dateStr.date; // e formaton daten
    }

<<<<<<< HEAD

    const grupi = document.createElement('p');
    grupi.textContent = `Grupi: ${student.grupi}`;

    const email = document.createElement('p')
    email.textContent = `Email: ${student.emailUBT}`;

   content.appendChild(grupi);
   content.appendChild(email);
   content.appendChild(createdAt);
=======
     document.getElementById('emri').textContent = `${student.Emri}`;
     document.getElementById('mbiemri').textContent = `${student.Mbiemri}!`;
     document.getElementById('grupi').textContent = `${student.grupi}`;
     document.getElementById('email').textContent = `${student.emailUBT}`;
     //document.getElementById('nrtel').textContent = `${student.numri_telefonit}`;
     document.getElementById('fushastudimit').textContent = `${student.fushaStudimit}`;
     document.getElementById('programi').textContent = `${student.programi}`;
     document.getElementById('datareg').textContent = (new Date(dateStr.replace(' ', 'T'))).toLocaleString();
     document.getElementById('statusi').textContent = student.isActive ? "Aktiv" : "Jo Aktiv";
 //  content.appendChild(createdAt);
>>>>>>> 2f200d343ca195b698ff1c4dffc88a5b157f7151


    document.getElementById('logoutBtn').addEventListener('click', () =>{
         if (confirm("Are you sure you want to log out?")) {
        sessionStorage.removeItem('student');
        window.location.href = '../static/main.html';
         }
    });
});