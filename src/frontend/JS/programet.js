
document.addEventListener("DOMContentLoaded", () => {
const container = document.getElementById('content');
const bachelorBtn = document.getElementById('bachelorBtn');
const masterBtn = document.getElementById('masterBtn');
const phdBtn = document.getElementById('phdBtn');
const studyBtn = document.getElementById('studyBtn');
const applyBtn = document.getElementById('applyBtn');
const smisBtn = document.getElementById('smisBtn');
const homeBtn = document.getElementById('homeBtn');
const buttonBar = document.getElementById('buttonBar');

function fetchProgram(program) {

  container.innerHTML = '';
  fetch('/studentManagement/src/backend/API/ProgrametDataApi.php?' + program + '=true')
    .then(response => {
      console.log("Fetch response:", response);
      if (!response.ok) {
        throw new Error("Network response was not ok: " + response.status);
      }
      return response.json();
    })
    .then(data => {
  
      if (data.success && Array.isArray(data.programi)) {
        data.programi.forEach(item => {
          const div = document.createElement('div');
          div.classList.add('contentItem');

          const img = document.createElement('img');
            img.src = '..' + item.imgPath; 
            img.alt = item.programi; 
            img.style.width = '200px';
            img.style.borderRadius = '10px';

          const name = document.createElement('p');
          name.textContent = "Programi: " + item.programi;

          const dega = document.createElement('p');
          dega.textContent = "Fusha e studimit: " + item.fushaStudimit;

          const pershkrimi = document.createElement('p');
          pershkrimi.textContent = "Pershkrimi: " + item.pershkrimi;

          div.appendChild(img);
          div.appendChild(name);
          div.appendChild(dega);
          div.appendChild(pershkrimi);
          container.appendChild(div);

          div.addEventListener('click', () => {

          localStorage.setItem('selectedProgram', JSON.stringify(item));
          window.location.href = 'programDetails.html';
          });
        });
      } else {
        container.innerHTML= '';
        console.error("No bachelor programs found or not an array s " + data.error);
      }
    })
    .catch(err => console.error("Fetch error:", err));
}

function showMain(){

    container.innerHTML = `
             
             
  
  <!-- INFO SECTION -->
<section id="infoSection">
  <p>
  <h2>Rreth Universitetit</h2>
  <p>
    Universiteti UBT është një institucion i njohur për standardet e larta akademike dhe përkushtimin ndaj zhvillimit profesional të studentëve. Me dekada përvojë në arsimin e lartë, UBT ofron një gamë të gjerë programesh Bachelor, Master dhe PhD në fushat më të kërkuara të teknologjisë, shkencës, biznesit dhe artit.
  </p>
  <p>
    Qëllimi ynë është të krijojmë një ambient mësimor inovativ dhe bashkëkohor, ku studentët mund të zhvillojnë aftësitë e tyre profesionale dhe personale. Ne investojmë vazhdimisht në laboratorë modernë, teknologji të avancuar dhe partneritete me kompanitë kryesore në treg, për të siguruar që studentët tanë të jenë të përgatitur për sfidat reale të karrierës.
  </p>
  <p>
    Fakultetet tona janë të strukturuara në mënyrë që çdo student të ketë mbështetje individuale dhe qasje të drejtpërdrejtë me profesorët dhe mentorët e specializuar. Ne besojmë se kombinimi i teorisë së thelluar me praktikën profesionale është çelësi për suksesin akademik dhe profesional të çdo studenti.
  </p>
  <p>
    Përveç studimeve, UBT ofron një ambient të pasur me aktivitete jashtëklasore, klube studentore, workshop-e dhe seminare ndërkombëtare. Këto aktivitete ndihmojnë studentët të zhvillojnë aftësi lidershipi, komunikimi dhe punë në ekip, të cilat janë të domosdoshme në tregun modern të punës.
  </p>
  <p>
    Përmes këtij seksioni informues, ne synojmë të ofrojmë një pasqyrë të qartë të vlerave, mundësive dhe përvojës unike që ofron UBT. Çdo aplikim dhe çdo student është i rëndësishëm për ne, dhe përkushtimi ndaj edukimit dhe suksesit të studentëve është prioriteti ynë kryesor.
  </p>
  </p>
</section>


<section id="testimonials">
  <h2>Çfarë thonë studentët tanë</h2>

  <div class="testimonial-cards">
    <div class="testimonial">
      <img src="../IMAGES/studenti1.jpg" alt="Student 1">
      <h3>Arbër Krasniqi</h3>
      <p>"UBT më dha mundësinë të zhvilloj aftësitë e mia në IT dhe të punoj në projekte reale me mentorë profesionistë."</p> <!-- mos rrej --!>
    </div>

    <div class="testimonial">
      <img src="../IMAGES/studentia2.avif" alt="Student 2">
      <h3>Elira Berisha</h3>
      <p>"Atmosfera në universitet është fantastike! Profesoret janë gjithmonë të gatshëm të ndihmojnë dhe të japin udhëzime."</p>
    </div>

    <div class="testimonial">
      <img src="../IMAGES/studenti3.jpg" alt="Student 3">
      <h3>Besart Gashi</h3>
      <p>"Pjesëmarrja në workshop-et dhe aktivitetet jashtëklasore më ka hapur dyert e karrierës që nga fillimi."</p>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <p>© 2025 UBT — Të gjitha të drejtat e rezervuara.</p>

  <div class="socials">
    <a href="#" class="fb">Facebook</a>
    <a href="#" class="ig">Instagram</a>
    <a href="#" class="tw">Twitter</a>
  </div>
</footer>

             `;

}

bachelorBtn.addEventListener('click', () => {
    fetchProgram('bachelor');
  });

  masterBtn.addEventListener('click', () => {
      fetchProgram('master');
  });

  phdBtn.addEventListener('click', () => {
      container.innerHTML = '';
  });
      studyBtn.addEventListener('click', () => {
     //   console.log("clicked");
        fetchProgram('bachelor');
    });

    applyBtn.addEventListener('click', () => {
      //  window.location.href = "/studentManagement/src/frontend/static/register.php";
      window.location.href = "../static/register.php";
    });

    smisBtn.addEventListener('click', () => {
        window.location.href = "../static/login.html";
    });


    homeBtn.addEventListener('click', ()=>{
           showMain();
    });

// fetchProgram('bachelor');
showMain();
  });