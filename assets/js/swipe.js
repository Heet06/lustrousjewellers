const btns = document.querySelectorAll(".btn");
const slideRow = document.getElementById("slide-row");
const main = document.querySelector("main");
let slides = document.querySelectorAll(".slide-col");
let currentIndex = 0;

function updateSlide() {
    const mainWidth = main.offsetWidth;
    const translateValue = currentIndex * -mainWidth;
    slideRow.style.transform = `translateX(${translateValue}px)`;

    btns.forEach((btn, index) => {
        btn.classList.toggle("active", index === currentIndex);
    });
}

btns.forEach((btn, index) => {
    btn.addEventListener("click", () => {
        currentIndex = index;
        updateSlide();
    });
});

window.addEventListener("resize", () => {
    updateSlide();
});

// Update slider width based on the number of slides
function updateSliderWidth() {
    const mainWidth = main.offsetWidth;
    const totalSlides = slides.length;
    slideRow.style.width = `${totalSlides * mainWidth}px`;
    slides.forEach(slide => {
        slide.style.width = `${mainWidth}px`;
    });
}

window.addEventListener("load", updateSliderWidth);
window.addEventListener("resize", updateSliderWidth);

function startAutoplay() {
    intervalId = setInterval(() => {
        currentIndex = (currentIndex + 1) % slides.length;
        updateSlide();
    }, 4000); // Adjust the interval (in milliseconds) as needed
}

startAutoplay();