const form = document.getElementById("registerForm");
const message = document.getElementById("message");

form.addEventListener("submit", async (e) => {
  e.preventDefault();


  const formData = new FormData(form);

  try {
    const response = await fetch("/studentManagement/src/backend/API/registerApi.php", { 
      method: "POST",
      body: formData
    });

    const result = await response.json();

    if (result.success) {
      message.textContent = "You have successfully applied";
      message.style.color = "green";
      form.reset(); 
        setTimeout(() => {
     window.location.href = '../static/main.html';
  }, 1500);
    } else {
      message.textContent = (result.message || result.error);
      message.style.color = "red";
    }
  } catch (error) {
    console.error(error);
    message.textContent = "Failed to apply";
    message.style.color = "red";
  }
});