const productsLink = document.querySelector('nav ul:nth-of-type(2) li:nth-child(2) a');
const productsList = document.getElementById('select_list');

productsLink.addEventListener('click', function(event) {
  // Empêche le comportement par défaut de l'élément <a>
  event.preventDefault();
  
  // passe la liste en display flex
  productsList.style.display = (productsList.style.display === 'flex') ? 'none' : 'flex';
});  
