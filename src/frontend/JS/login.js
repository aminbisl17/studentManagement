document.addEventListener("DOMContentLoaded", function() {


    const form = document.getElementById("loginForm");
    const errorDiv = document.getElementById('error');


    form.addEventListener("submit", function(e) {

        e.preventDefault(); 

        const formData = new FormData(form);
         console.log("Form submit prevented!");

        fetch('/studentManagement/src/backend/Database/API/studentDataApi.php', {  method: 'POST', body:formData})
        .then(response => response.json()).then(data => {

            if(data.success){

                errorDiv.style.color = 'green';
                errorDiv.textContent = 'Login successful! Welcome ' + data.student.Emri;
                setTimeout(() => {
                    window.location.href = '../static/main.html';
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