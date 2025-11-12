document.addEventListener("DOMContentLoaded", function() {


    if(sessionStorage.getItem('student')){
       window.location.href = '../static/studentProfile.html';
      return;
    }
    const form = document.getElementById("loginForm");
    const errorDiv = document.getElementById('error');

//
    form.addEventListener("submit", function(e) {

        e.preventDefault(); 

        const formData = new FormData(form);
         console.log("Form submit prevented!");

        fetch('/studentManagement/src/backend/API/studentDataApi.php', {  method: 'POST', body:formData})
        .then(response => response.json()).then(data => {

              console.log(data.success);
            if(data.success){
                errorDiv.style.color = 'green';
                errorDiv.textContent = 'Login successful! Welcome ' + data.student.Emri;

                sessionStorage.setItem('student', JSON.stringify(data.student));

                setTimeout(() => {
                    window.location.href = '../static/studentProfile.html';
                }, 1000);

            }else {
                errorDiv.style.color = 'red';
                errorDiv.textContent = data.message;
            }
        }).catch(err => {
            console.error(err);
            errorDiv.style.color = 'red';
            errorDiv.textContent = 'An error occurred';
        });
    });
});