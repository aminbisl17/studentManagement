document.addEventListener("DOMContentLoaded", function() {

  const  studentData = sessionStorage.getItem('student');
  if (!studentData) {
    window.location.href = '../static/login.html';
    return;
  }

  const student = JSON.parse(studentData);
  
  document.getElementById('data').textContent =
    `Welcome, ${student.Emri} ${student.Mbiemri}!`;


    document.getElementById('logoutBtn').addEventListener('click', () =>{
         if (confirm("Are you sure you want to log out?")) {
        sessionStorage.removeItem('student');
        window.location.href = '../static/main.html';
         }
    });
});