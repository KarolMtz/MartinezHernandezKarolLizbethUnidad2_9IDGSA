        // Mobile menu toggle
        const mobileBtn = document.querySelector('.mobile-menu-btn');
        const mobileMenu = document.getElementById('mobileMenu');
        mobileBtn.addEventListener('click', () => {
            const expanded = mobileBtn.getAttribute('aria-expanded') === 'true' || false;
            mobileBtn.setAttribute('aria-expanded', !expanded);
            mobileMenu.classList.toggle('show');
        });

        // Carousel logic
        const prevBtn = document.querySelector('.carousel-button.prev');
        const nextBtn = document.querySelector('.carousel-button.next');
        const track = document.querySelector('.carousel-track');
        const cards = Array.from(track.children);
        let currentIndex = 0;

        // Calculate card width including margin
        function cardFullWidth() {
            if (cards.length === 0) return 0;
            const style = getComputedStyle(cards[0]);
            return cards[0].offsetWidth + parseFloat(style.marginLeft) + parseFloat(style.marginRight);
        }

        function updateCarousel() {
            const width = cardFullWidth();
            const maxIndex = cards.length - 1;
            if (currentIndex < 0) currentIndex = 0;
            if (currentIndex > maxIndex) currentIndex = maxIndex;
            const moveX = -currentIndex * width;
            track.style.transform = `translateX(${moveX}px)`;
            updateButtons();
        }

        function updateButtons() {
            prevBtn.disabled = currentIndex === 0;
            nextBtn.disabled = currentIndex === cards.length - 1;
        }

        prevBtn.addEventListener('click', () => {
            currentIndex -= 1;
            updateCarousel();
        });
        nextBtn.addEventListener('click', () => {
            currentIndex += 1;
            updateCarousel();
        });

        // Initialize
        updateCarousel();

        // Resize observer to update carousel on resize
        window.addEventListener('resize', updateCarousel);