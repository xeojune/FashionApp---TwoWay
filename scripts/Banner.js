let currentSlideIndex = 0;
const slides = document.querySelectorAll('.image-container');
const dots = document.querySelectorAll('.dot');

// Function to show the current slide
function showSlide(index) {
    // Hide all slides
    slides.forEach(slide => {
        slide.classList.remove('active');
    });

    // Remove active class from all dots
    dots.forEach(dot => {
        dot.classList.remove('active');
    });

    // Show the current slide and highlight the current dot
    slides[index].classList.add('active');
    dots[index].classList.add('active');
}

// Function to go to the next slide
function nextSlide() {
    currentSlideIndex = (currentSlideIndex + 1) % slides.length;
    showSlide(currentSlideIndex);
}

// Function to go to the previous slide
function prevSlide() {
    currentSlideIndex = (currentSlideIndex - 1 + slides.length) % slides.length;
    showSlide(currentSlideIndex);
}

// Function to go to a specific slide
function currentSlide(index) {
    currentSlideIndex = index - 1;
    showSlide(currentSlideIndex);
}

// Auto-slide every 5 seconds
setInterval(nextSlide, 5000);

// Add event listeners for navigation arrows
document.querySelector('.slick-prev').addEventListener('click', prevSlide);
document.querySelector('.slick-next').addEventListener('click', nextSlide);

// Show the first slide by default
showSlide(currentSlideIndex);
