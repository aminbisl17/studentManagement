document.addEventListener("DOMContentLoaded", function() {

    const studentData = sessionStorage.getItem('student');
    const form = document.getElementById("emailForm");
    const name = document.getElementById('name');
    const email = document.getElementById('email');
    const submitBtn = form.querySelector('button[type="submit"]');

    if(studentData){
        const student = JSON.parse(studentData);
        name.value = student.Emri;
        email.value = student.emailUBT;
        name.readOnly = true;
        email.readOnly = true;
    }

    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        submitBtn.disabled = true;
        submitBtn.innerText = "Sending...";

        const formData = new FormData(form);

        try {
            const response = await fetch("/studentManagement/src/backend/API/mailApi.php", { 
                method: "POST",
                body: formData
            });

            const result = await response.json();

            if(result.success){
                alert("Emaili i juaj eshte derguar!");
                document.getElementById('subject').value = '';
                document.getElementById('message').value = '';
            } else {
                alert("Failed to send email: " + (result.message || ""));
            }

        } catch(error) {
            console.log(error);
            alert("An error occurred: " + error);
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerText = "Send Message";
        }
    });

});