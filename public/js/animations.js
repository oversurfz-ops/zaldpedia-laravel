// ZALD PEDIA - Premium UX Interactive Animations Script

document.addEventListener("DOMContentLoaded", () => {
    initScrollFadeUp();
    initMouseGlowEffect();
    initCyberParticles();
});

// Staggered screen-load animations (Fade In Up)
function initScrollFadeUp() {
    const fadeElements = document.querySelectorAll(".animate-fade-up");
    
    // Staggered trigger on load
    fadeElements.forEach((el, index) => {
        setTimeout(() => {
            el.classList.add("visible");
        }, index * 120); // 120ms delay per element for smooth cascading entry
    });
}

// Mouse glow spot coordinate tracking for cursor glow reflections
function initMouseGlowEffect() {
    // Dynamic binding using event delegation to support content loaded later
    document.addEventListener("mousemove", (e) => {
        const card = e.target.closest(".glow-card, .item-card, .payment-method-card");
        if (!card) return;

        // Apply glow-card properties if not already present
        if (!card.classList.contains("glow-card")) {
            card.classList.add("glow-card");
        }

        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        card.style.setProperty("--mouse-x", `${x}px`);
        card.style.setProperty("--mouse-y", `${y}px`);
    });
}

// Cybernetic Floating Particles Canvas Overlay Background
function initCyberParticles() {
    // Check if index.html or dashboard has main header. Add canvas background.
    const canvas = document.createElement("canvas");
    canvas.id = "particle-canvas";
    canvas.style.position = "fixed";
    canvas.style.top = "0";
    canvas.style.left = "0";
    canvas.style.width = "100vw";
    canvas.style.height = "100vh";
    canvas.style.pointerEvents = "none";
    canvas.style.zIndex = "-1";
    canvas.style.opacity = "0.4"; // Subtle blend
    document.body.appendChild(canvas);

    const ctx = canvas.getContext("2d");
    let particlesArray = [];
    const numberOfParticles = 35;

    // Handle Resize
    window.addEventListener("resize", () => {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    });
    
    // Set initial size
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    // Particle Blueprint Class
    class Particle {
        constructor() {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;
            this.size = Math.random() * 2 + 1; // small dots
            this.speedX = Math.random() * 0.4 - 0.2; // slow drifts
            this.speedY = Math.random() * 0.4 - 0.2;
            
            // Randomly choose colors from theme palette (cyan, violet, pink)
            const colors = ["#00f0ff", "#bd00ff", "#ff007f"];
            this.color = colors[Math.floor(Math.random() * colors.length)];
        }

        update() {
            this.x += this.speedX;
            this.y += this.speedY;

            // Bounce logic
            if (this.x > canvas.width || this.x < 0) this.speedX = -this.speedX;
            if (this.y > canvas.height || this.y < 0) this.speedY = -this.speedY;
        }

        draw() {
            ctx.fillStyle = this.color;
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.closePath();
            
            // Neon shadow glow effect on particles
            ctx.shadowColor = this.color;
            ctx.shadowBlur = 8;
            ctx.fill();
            
            // Reset shadow to speed up rendering
            ctx.shadowBlur = 0;
        }
    }

    // Initialize list
    function init() {
        for (let i = 0; i < numberOfParticles; i++) {
            particlesArray.push(new Particle());
        }
    }

    // Loop
    function animate() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        
        particlesArray.forEach(p => {
            p.update();
            p.draw();
        });

        // Draw web connecting nodes if close enough
        connectNodes();
        
        requestAnimationFrame(animate);
    }

    function connectNodes() {
        let maxDistance = 150;
        for (let a = 0; a < particlesArray.length; a++) {
            for (let b = a; b < particlesArray.length; b++) {
                let dx = particlesArray[a].x - particlesArray[b].x;
                let dy = particlesArray[a].y - particlesArray[b].y;
                let distance = Math.sqrt(dx * dx + dy * dy);

                if (distance < maxDistance) {
                    let opacity = (1 - (distance / maxDistance)) * 0.15;
                    ctx.strokeStyle = `rgba(189, 0, 255, ${opacity})`;
                    ctx.lineWidth = 0.8;
                    ctx.beginPath();
                    ctx.moveTo(particlesArray[a].x, particlesArray[a].y);
                    ctx.lineTo(particlesArray[b].x, particlesArray[b].y);
                    ctx.stroke();
                    ctx.closePath();
                }
            }
        }
    }

    init();
    animate();
}
