(function slider() {
  const slides = document.querySelectorAll(".c__slide");
  const dotContainer = document.querySelector(".dots");

  (function createDots() {
    slides.forEach((_, i) => {
      dotContainer.insertAdjacentHTML(
        "beforeend",
        `<button class='dot dots__dot' data-slide='${i}'></button>` //dot class for css
      );
    });
  })();

  let curSlide = 0;
  const maxSlide = slides.length;

  const goToSlide = (slide) => {
    slides.forEach((s, i) => {
      s.style.transform = `translateX(${100 * (i - slide)}%)`;
    });
  };

  // slide => first to start from 0
  goToSlide(0);

  const nextSlide = () => {
    if (curSlide === maxSlide - 1) {
      curSlide = 0;
    } else {
      curSlide++;
    }

    goToSlide(curSlide);
  };

  // auto slider
  setInterval(() => nextSlide(), 5000);

  // button slider
  dotContainer.addEventListener("click", function (e) {
    if (e.target.classList.contains("dots__dot")) {
      const slideNumber = e.target.dataset.slide;
      goToSlide(slideNumber);
    }
  });
})();
