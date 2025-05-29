document.addEventListener('DOMContentLoaded', function () {
  // Filtrage des produits
  document.querySelectorAll('#product-filters .nav-link').forEach(filter => {
    filter.addEventListener('click', function (e) {
      e.preventDefault();

      // Retire la classe active de tous les filtres
      document.querySelectorAll('#product-filters .nav-link').forEach(f => {
        f.classList.remove('active');
      });

      // Ajoute la classe active au filtre cliqué
      this.classList.add('active');

      const filterValue = this.dataset.filter;

      // Filtre les produits
      document.querySelectorAll('.product-item').forEach(product => {
        if (filterValue === 'all' || product.dataset.category === filterValue) {
          product.style.display = 'block';
        } else {
          product.style.display = 'none';
        }
      });
    });
  });


  // Gestion de la modal produit
  const productModal = document.getElementById('productModal');
  const viewButtons = document.querySelectorAll('.view-product');

  viewButtons.forEach(button => {
    button.addEventListener('click', function () {
      // Récupère les données du produit
      document.getElementById('modal-product-title').textContent = this.getAttribute('data-title');
      document.getElementById('modal-product-price').textContent = this.getAttribute('data-price') + ' FCFA';
      document.getElementById('modal-product-category').textContent = this.getAttribute('data-category');
      document.getElementById('modal-product-rating').innerHTML = `
          <i class="fas fa-star"></i>
          <span>${this.getAttribute('data-rating')}</span>
        `;
      document.getElementById('modal-product-image').src = this.getAttribute('data-image');
      document.getElementById('modal-product-description').textContent = this.getAttribute('data-description');
      document.getElementById('modal-product-artisan').innerHTML = `Par <a href="#" class="text-vert-benin">${this.getAttribute('data-artisan')}</a>`;

      // Gestion du prix original (pour les promos)
      const originalPrice = this.getAttribute('data-original-price');
      const originalPriceEl = document.getElementById('modal-product-original-price');

      if (originalPrice) {
        originalPriceEl.style.display = 'block';
        originalPriceEl.innerHTML = `<del>${originalPrice} FCFA</del>`;
      } else {
        originalPriceEl.style.display = 'none';
      }
    });
  });

  // Gestion de la quantité
  const quantityInput = productModal.querySelector('input[type="number"]');
  productModal.querySelectorAll('.btn-outline-secondary').forEach(btn => {
    btn.addEventListener('click', function () {
      let value = parseInt(quantityInput.value);
      if (this.textContent === '+') {
        quantityInput.value = value + 1;
      } else if (value > 1) {
        quantityInput.value = value - 1;
      }
    });
  });
});
// Script pour la newsletter
document.getElementById('newsletter-form').addEventListener('submit', function (e) {
  e.preventDefault();

  // Récupération des données
  const formData = {
    firstname: this.querySelector('#firstname').value,
    lastname: this.querySelector('#lastname').value,
    email: this.querySelector('#email').value,
    terms: this.querySelector('#terms').checked
  };

  // Ici vous ajouteriez la logique d'envoi au serveur
  console.log('Données du formulaire:', formData);

  // Feedback utilisateur
  alert('Merci pour votre inscription à notre newsletter !');
  this.reset();
});

document.addEventListener('DOMContentLoaded', function () {
  // Éléments du DOM
  const categoriesBtn = document.querySelector('.categories-menu button');
  const categoriesDropdown = document.querySelector('.categories-dropdown');
  const primaryNavbar = document.querySelector('.primary-navbar');

  // Variables d'état
  let isHoverEnabled = window.innerWidth > 992;
  let isClickOpened = false;
  let isMouseInDropdown = false;

  // Initialisation
  function init() {
    positionDropdown();
    setupEventListeners();

    if (isHoverEnabled) {
      enableHoverBehavior();
    }
  }

  // Configuration des écouteurs d'événements
  function setupEventListeners() {
    // Gestion du clic sur le bouton
    categoriesBtn.addEventListener('click', function (e) {
      e.stopPropagation();
      toggleCategoriesDropdown();
    });

    // Fermeture en cliquant à l'extérieur
    document.addEventListener('click', function (e) {
      if (!categoriesDropdown.contains(e.target) &&
        e.target !== categoriesBtn &&
        !categoriesBtn.contains(e.target)) {
        closeCategoriesDropdown();
      }
    });

    // Gestion du redimensionnement
    window.addEventListener('resize', handleResize);

    // Suivi de la souris dans le dropdown
    categoriesDropdown.addEventListener('mouseenter', function () {
      isMouseInDropdown = true;
    });

    categoriesDropdown.addEventListener('mouseleave', function () {
      isMouseInDropdown = false;
      if (isHoverEnabled && !isClickOpened) {
        closeCategoriesDropdown();
      }
    });
  }

  // Gestion du redimensionnement
  function handleResize() {
    positionDropdown();

    const shouldHoverBeEnabled = window.innerWidth > 992;
    if (shouldHoverBeEnabled !== isHoverEnabled) {
      isHoverEnabled = shouldHoverBeEnabled;
      if (isHoverEnabled) {
        enableHoverBehavior();
      } else {
        disableHoverBehavior();
        // Sur mobile, fermer le menu s'il était ouvert par hover
        if (!isClickOpened) {
          closeCategoriesDropdown();
        }
      }
    }
  }

  // Basculer l'état du menu
  function toggleCategoriesDropdown() {
    if (categoriesDropdown.classList.contains('d-none')) {
      openCategoriesDropdown();
    } else {
      closeCategoriesDropdown();
    }
  }

  // Ouvrir le menu
  function openCategoriesDropdown() {
    categoriesDropdown.classList.remove('d-none');
    positionDropdown();
    categoriesBtn.classList.add('active');
    isClickOpened = true;
  }

  // Fermer le menu
  function closeCategoriesDropdown() {
    // Ne pas fermer si la souris est dans le dropdown en mode hover
    if (isHoverEnabled && isMouseInDropdown) return;

    categoriesDropdown.classList.add('d-none');
    categoriesBtn.classList.remove('active');
    isClickOpened = false;
  }

  // Positionnement du dropdown
  function positionDropdown() {
    if (!categoriesDropdown || !primaryNavbar) return;

    const navbarRect = primaryNavbar.getBoundingClientRect();
    categoriesDropdown.style.top = `${navbarRect.bottom}px`;
    categoriesDropdown.style.left = `${navbarRect.left}px`;
    categoriesDropdown.style.width = `${navbarRect.width}px`;
  }

  // Activer le comportement hover
  function enableHoverBehavior() {
    categoriesBtn.addEventListener('mouseenter', handleMouseEnter);
    categoriesBtn.addEventListener('mouseleave', handleMouseLeave);
  }

  // Désactiver le comportement hover
  function disableHoverBehavior() {
    categoriesBtn.removeEventListener('mouseenter', handleMouseEnter);
    categoriesBtn.removeEventListener('mouseleave', handleMouseLeave);
  }

  // Gestionnaire d'entrée de souris
  function handleMouseEnter() {
    if (!isClickOpened) {
      openCategoriesDropdown();
      isClickOpened = false; // Maintenir l'état comme ouvert par hover
    }
  }

  // Gestionnaire de sortie de souris
  function handleMouseLeave() {
    // Ne rien faire si la souris est entrée dans le dropdown
    if (!isMouseInDropdown && !isClickOpened) {
      closeCategoriesDropdown();
    }
  }

  // Initialiser
  init();
});


