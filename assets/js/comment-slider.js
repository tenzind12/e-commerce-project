const slider = () => {
  const slides = document.querySelectorAll(".c__slide");
  const dotContainer = document.querySelector(".dots");

  let curSlide = 0;
  const maxSlide = slides.length;

  function createDots() {
    slides.forEach((_, i) => {
      dotContainer.insertAdjacentHTML(
        "beforeend",
        `<button class='dots__dot[data-slide=${i}"]'></button>`
      );
    });
  }

  // auto slider
  setInterval(() => {
    if (curSlide === maxSlide - 1) {
      curSlide = 0;
    } else {
      curSlide++;
    }
    slides.forEach((s, i) => {
      s.style.transform = `translateX(${100 * (i - curSlide)}%)`;
    });
  }, 5000);

  slides.forEach((s, i) => (s.style.transform = `translateX(${100 * i}%)`));
};
slider();
