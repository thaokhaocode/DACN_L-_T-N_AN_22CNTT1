document.addEventListener("DOMContentLoaded", () => {
    console.log("Welcome to Anna Buffet!");
    // Add interactive functionality if needed
});
const sliderWrapper = document.querySelector('.slider-wrapper');

sliderWrapper.addEventListener('mouseenter', () => {
    sliderWrapper.style.animationPlayState = 'paused';
});

sliderWrapper.addEventListener('mouseleave', () => {
    sliderWrapper.style.animationPlayState = 'running';
});
const images = document.querySelectorAll(".menu-image");
const descriptionElement = document.getElementById("menu-description");
const leftArrow = document.querySelector(".left-arrow");
const rightArrow = document.querySelector(".right-arrow");

let currentIndex = 0;

function updateSlide(index) {
    images.forEach((image, i) => {
        image.classList.remove("active");
        if (i === index) {
            image.classList.add("active");
        }
    });

    titleElement.textContent = titles[index];
    descriptionElement.textContent = descriptions[index];
}

leftArrow.addEventListener("click", () => {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    updateSlide(currentIndex);
});

rightArrow.addEventListener("click", () => {
    currentIndex = (currentIndex + 1) % images.length;
    updateSlide(currentIndex);
});

// Auto-slide every 5 seconds
setInterval(() => {
    currentIndex = (currentIndex + 1) % images.length;
    updateSlide(currentIndex);
}, 5000);

// Initialize first slide
updateSlide(currentIndex);
