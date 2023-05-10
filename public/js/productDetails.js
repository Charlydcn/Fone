// Sélectionner tous les éléments de compteur sur la page
var counters = document.querySelectorAll("div");

// Parcourir tous les compteurs et attacher les gestionnaires d'événements
counters.forEach(function(counter) {
  var removeBtn = counter.querySelector(".remove");
  var addBtn = counter.querySelector(".add");
  var qtt = counter.querySelector(".qtt");
  var quantite = 0;

  removeBtn.addEventListener("click", function() {
    if (quantite > 0) {
      quantite--;
      qtt.textContent = quantite;
    }
  });

  addBtn.addEventListener("click", function() {
    quantite++;
    qtt.textContent = quantite;
  });
});
