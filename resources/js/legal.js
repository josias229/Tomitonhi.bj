document.addEventListener('DOMContentLoaded', function () {
    // Smooth scroll pour les ancres
    document.querySelectorAll('.policy-toc a').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const targetId = this.getAttribute('href');
        const targetElement = document.querySelector(targetId);
  
        if (targetElement) {
          window.scrollTo({
            top: targetElement.offsetTop - 20,
            behavior: 'smooth'
          });
  
          // Ajout d'une classe active temporaire
          document.querySelectorAll('.policy-toc a').forEach(link => {
            link.classList.remove('active');
          });
          this.classList.add('active');
  
          setTimeout(() => {
            this.classList.remove('active');
          }, 1000);
        }
      });
    });
  
    // Highlight de la section en cours
    const sections = document.querySelectorAll('.policy-section');
    const navLinks = document.querySelectorAll('.policy-toc a');
  
    window.addEventListener('scroll', function () {
      let current = '';
  
      sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
  
        if (pageYOffset >= (sectionTop - 100)) {
          current = '#' + section.getAttribute('id');
        }
      });
  
      navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === current) {
          link.classList.add('active');
        }
      });
    });
  });
  
  // Gestion des étapes
  let currentStep = 1;
  
  function goToStep(step) {
    document.querySelectorAll('.onboarding-step').forEach(el => {
      el.style.display = 'none';
    });
    document.getElementById(`step${step}`).style.display = 'block';
    currentStep = step;
  
    // Animation de la barre de progression
    const progressPercent = (step / 3) * 100;
    document.getElementById('progressBar').style.width = `${progressPercent}%`;
  
    // Scroll vers le haut
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }
  
  function backToStep(step) {
    goToStep(step);
  }
  
  // Gestion du formulaire
  document.getElementById('preRegistrationForm').addEventListener('submit', function (e) {
    e.preventDefault();
    goToStep(2);
  });
  
  document.getElementById('legalValidationForm').addEventListener('submit', function (e) {
    e.preventDefault();
    goToStep(3);
  });
  
  document.getElementById('portfolioForm').addEventListener('submit', function (e) {
    e.preventDefault();
  
    // Simulation d'envoi
    document.getElementById('step3').style.display = 'none';
    document.getElementById('confirmation').style.display = 'block';
    document.getElementById('progressBar').style.width = '100%';
  
    // Ici, ajouter l'appel AJAX pour l'envoi réel
    // fetch('/api/artisans', { method: 'POST', body: formData });
  });
  
  // Gestion du drag & drop
  const dropzone = document.querySelector('.dropzone');
  const fileInput = document.querySelector('.dropzone input[type="file"]');
  
  dropzone.addEventListener('click', () => fileInput.click());
  
  fileInput.addEventListener('change', function () {
    const files = this.files;
    const preview = document.getElementById('imagePreview');
    preview.innerHTML = '';
  
    if (files.length > 0) {
      Array.from(files).forEach(file => {
        if (file.type.startsWith('image/')) {
          const reader = new FileReader();
          reader.onload = function (e) {
            const col = document.createElement('div');
            col.className = 'col-4';
            col.innerHTML = `
                          <div class="ratio ratio-1x1">
                              <img src="${e.target.result}" class="img-fluid rounded" alt="Preview">
                          </div>
                      `;
            preview.appendChild(col);
          };
          reader.readAsDataURL(file);
        }
      });
    }
  });
  
  // Validation RCCM
  document.querySelector('input[name="rccm"]').addEventListener('input', function () {
    this.value = this.value.toUpperCase();
  });
  
  
  // Script pour le suivi de la lecture
  document.addEventListener('DOMContentLoaded', function () {
    const articles = document.querySelectorAll('article');
    const progressBar = document.createElement('div');
    progressBar.className = 'position-fixed top-0 start-0 bg-vert-benin';
    progressBar.style.height = '3px';
    progressBar.style.zIndex = '1000';
    document.body.prepend(progressBar);
  
    window.addEventListener('scroll', function () {
      const scrollTop = window.scrollY;
      const docHeight = document.body.clientHeight - window.innerHeight;
      const progress = (scrollTop / docHeight) * 100;
      progressBar.style.width = progress + '%';
    });
  });