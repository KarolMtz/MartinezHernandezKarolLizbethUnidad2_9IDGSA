    // Toggle menú hamburguesa móvil
    const hamburgerBtn = document.getElementById('hamburger-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    hamburgerBtn.addEventListener('click', () => {
      const expanded = hamburgerBtn.getAttribute('aria-expanded') === 'true' || false;
      hamburgerBtn.setAttribute('aria-expanded', !expanded);
      mobileMenu.classList.toggle('show');

      // Fix tabindex for accessibility
      const links = mobileMenu.querySelectorAll('a');
      links.forEach(link => {
        link.tabIndex = mobileMenu.classList.contains('show') ? 0 : -1;
      });
    });