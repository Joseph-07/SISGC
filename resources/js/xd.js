const toggleSearchButton = document.getElementById('toggleSearch');
const searchForm = document.getElementById('searchForm');
const searchBar = document.getElementById('searchBar');

toggleSearchButton.addEventListener('click', () => {
  searchForm.classList.toggle('hidden');
  searchBar.classList.toggle('bg-slate-600');
  searchBar.classList.toggle('bg-emerald-700');
});

const createModal = document.getElementById('crud-modal');
const editModal = document.getElementById('crud-modal-e');
const btn = document.getElementById('btn-modal');
const btnclose = document.getElementById('close-modal');
const btncloseE = document.getElementById('close-modal-e');
btn.addEventListener('click', () => {
  createModal.classList.toggle('hidden');
});

btnclose.addEventListener('click', () => {
  createModal.classList.toggle('hidden');
});
btncloseE.addEventListener('click', () => {
  editModal.classList.toggle('hidden');
})
// alert(xdd);

