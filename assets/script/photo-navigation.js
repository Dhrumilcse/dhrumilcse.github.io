// Photo Navigation - Keyboard shortcuts to navigate between viewport sections
(function() {
    // Get all image sections
    const sections = document.querySelectorAll('.img-wrap');
    
    if (sections.length === 0) return; // Exit if not on photos page
    
    let currentSection = 0;
    let audioCtx = null;
    let shutterBuffer = null;

    // Short mechanical shutter: two curtains, like a camera capture
    function playCapture() {
        const AudioContext = window.AudioContext || window.webkitAudioContext;
        if (!AudioContext) return;

        if (!audioCtx) audioCtx = new AudioContext();

        const start = () => {
            const ctx = audioCtx;
            const t = ctx.currentTime;

            if (!shutterBuffer) {
                const duration = 0.09;
                const length = Math.floor(ctx.sampleRate * duration);
                shutterBuffer = ctx.createBuffer(1, length, ctx.sampleRate);
                const data = shutterBuffer.getChannelData(0);

                for (let i = 0; i < length; i++) {
                    const time = i / ctx.sampleRate;
                    const open = Math.exp(-time * 220);
                    const closeTime = time - 0.042;
                    const close = closeTime > 0 ? Math.exp(-closeTime * 160) * 0.72 : 0;
                    data[i] = (Math.random() * 2 - 1) * (open + close);
                }
            }

            const source = ctx.createBufferSource();
            source.buffer = shutterBuffer;

            const filter = ctx.createBiquadFilter();
            filter.type = 'bandpass';
            filter.frequency.value = 2400;
            filter.Q.value = 0.7;

            const gain = ctx.createGain();
            gain.gain.setValueAtTime(0.42, t);
            gain.gain.exponentialRampToValueAtTime(0.001, t + 0.09);

            source.connect(filter);
            filter.connect(gain);
            gain.connect(ctx.destination);
            source.start(t);
            source.stop(t + 0.1);
        };

        if (audioCtx.state === 'suspended') {
            audioCtx.resume().then(start);
        } else {
            start();
        }
    }
    
    // Scroll to a specific section with fast animation
    function scrollToSection(index) {
        if (index >= 0 && index < sections.length) {
            currentSection = index;
            const targetPosition = sections[index].offsetTop;
            const startPosition = window.scrollY;
            const distance = targetPosition - startPosition;
            const duration = 200; // 200ms for snappy transition
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
            return true;
        }
        return false;
    }
    
    // Navigate to previous section
    function prevSection() {
        if (currentSection > 0) {
            scrollToSection(currentSection - 1);
            return true;
        }
        return false;
    }
    
    // Keyboard event handler
    function handleKeyPress(e) {
        // Ignore if user is typing in an input field
        if (e.target.tagName === 'INPUT' || e.target.tagName === 'TEXTAREA') {
            return;
        }
        
        switch(e.key) {
            case 'ArrowDown':
                e.preventDefault();
                if (nextSection()) playCapture();
                break;
            case 'j':
            case ' ': // Space key
                e.preventDefault();
                nextSection();
                break;
            case 'ArrowUp':
                e.preventDefault();
                if (prevSection()) playCapture();
                break;
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
