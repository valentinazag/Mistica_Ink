document.addEventListener("DOMContentLoaded", function () {
    const images = document.querySelectorAll(".gallery-img");
    const modal = new bootstrap.Modal(document.getElementById('imgModal'));
    const modalImage = document.getElementById('modalImage');

    images.forEach(img => {
      img.addEventListener("click", () => {
        modalImage.src = img.src;
        modal.show();
      });
    });
  });