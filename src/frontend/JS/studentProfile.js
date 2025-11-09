document.addEventListener("DOMContentLoaded", function() {
  const studentData = localStorage.getItem('student');

  if (!studentData) {
    window.location.href = '../static/login.html';
    return;
  }

  const student = JSON.parse(studentData);
  
  document.getElementById('data').textContent =
    `Welcome, ${student.Emri} ${student.Mbiemri}!`;
});