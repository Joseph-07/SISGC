const toggleSearchButton = document.getElementById('toggleSearch');
const searchForm = document.getElementById('searchForm');

toggleSearchButton.addEventListener('click', () => {
  searchForm.classList.toggle('hidden');
});