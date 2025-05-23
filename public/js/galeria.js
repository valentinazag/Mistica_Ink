document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.gallery-img').forEach(img => {
    img.addEventListener('click', () => {
      const modalImage = document.getElementById('modalImage');
      const modalTitle = document.getElementById('modalTitle');
      const modalDescription = document.getElementById('modalDescription');

      modalImage.src = img.src;
      modalTitle.textContent = img.dataset.title || '';
      modalDescription.textContent = img.dataset.description || '';

      const modal = new bootstrap.Modal(document.getElementById('imgModal'));
      modal.show();
    });
  });
});
