const pointHeadings = document.querySelectorAll("#point .point-heading");
const pointContents = document.querySelectorAll("#point .point-content-item");

pointHeadings.forEach((pointHeading, index) => {
  pointHeading.addEventListener("click", () => {
    document.querySelector(".point-heading.active").classList.remove("active");
    pointHeading.classList.add("active");
    document
      .querySelector(".point-content-item.active")
      .classList.remove("active");
    pointContents[index].classList.add("active");
  });
});

const pointHeadings2 = document.querySelectorAll("#point-seo .point-heading");
const pointContents2 = document.querySelectorAll("#point-seo .point-content-item");

pointHeadings2.forEach((pointHeading, index) => {
  pointHeading.addEventListener("click", () => {
    document.querySelector(".point-heading.active").classList.remove("active");
    pointHeading.classList.add("active");
    document
      .querySelector(".point-content-item.active")
      .classList.remove("active");
    pointContents2[index].classList.add("active");
  });
});

const pointHeadings3 = document.querySelectorAll("#point-content .point-heading");
const pointContents3 = document.querySelectorAll("#point-content .point-content-item");

pointHeadings3.forEach((pointHeading, index) => {
  pointHeading.addEventListener("click", () => {
    document.querySelector(".point-heading.active").classList.remove("active");
    pointHeading.classList.add("active");
    document
      .querySelector(".point-content-item.active")
      .classList.remove("active");
    pointContents3[index].classList.add("active");
  });
});

