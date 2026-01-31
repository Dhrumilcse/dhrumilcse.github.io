// Photo Navigation - Keyboard shortcuts to navigate between viewport sections
(function() {
    // Get all image sections
    const sections = document.querySelectorAll('.img-wrap');
    
    if (sections.length === 0) return; // Exit if not on photos page
    
    let currentSection = 0;
    
    // Scroll to a specific section with fast animation
    function scrollToSection(index) {
        if (index >= 0 && index < sections.length) {
            currentSection = index;
            const targetPosition = sections[index].offsetTop;
            const startPosition = window.scrollY;
            const distance = targetPosition - startPosition;
            const duration = 2000; // 300ms for snappy transition
            const startTime = performance.now();
            
            function animate(currentTime) {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                
                // Use ease-out-cubic for snappy feel
                const eased = 1 - Math.pow(1 - progress, 3);
                
                window.scrollTo(0, startPosition + (distance * eased));
                
                if (progress < 1) {
                    requestAnimationFrame(animate);
                }
            }
            
            requestAnimationFrame(animate);
        }
    }
    
    // Find current section based on scroll position
    function updateCurrentSection() {
        const scrollPosition = window.scrollY + (window.innerHeight / 2);
        
        sections.forEach((section, index) => {
            const rect = section.getBoundingClientRect();
            const sectionTop = window.scrollY + rect.top;
            const sectionBottom = sectionTop + rect.height;
            
            if (scrollPosition >= sectionTop && scrollPosition < sectionBottom) {
                currentSection = index;
            }
        });
    }
    
    // Navigate to next section
    function nextSection() {
        if (currentSection < sections.length - 1) {
            scrollToSection(currentSection + 1);
        }
    }
    
    // Navigate to previous section
    function prevSection() {
        if (currentSection > 0) {
            scrollToSection(currentSection - 1);
        }
    }
    
    // Keyboard event handler
    function handleKeyPress(e) {
        // Ignore if user is typing in an input field
        if (e.target.tagName === 'INPUT' || e.target.tagName === 'TEXTAREA') {
            return;
        }
        
        switch(e.key) {
            case 'ArrowDown':
            case 'j':
            case ' ': // Space key
                e.preventDefault();
                nextSection();
                break;
            case 'ArrowUp':
            case 'k':
                e.preventDefault();
                prevSection();
                break;
        }
        
        // Handle Shift + Space for previous section
        if (e.key === ' ' && e.shiftKey) {
            e.preventDefault();
            prevSection();
        }
    }
    
    // Update current section on scroll
    let scrollTimeout;
    window.addEventListener('scroll', function() {
        clearTimeout(scrollTimeout);
        scrollTimeout = setTimeout(updateCurrentSection, 100);
    });
    
    // Add keyboard listener
    document.addEventListener('keydown', handleKeyPress);
    
    // Initialize current section
    updateCurrentSection();
})();
