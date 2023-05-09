// Récupération des éléments HTML
var removeBtn = document.getElementById("add");
var qtt = document.getElementById("qtt");
var addBtn = document.getElementById("remove");

// Variable pour stocker la quantité
var quantite = 0;

// Gestionnaire d'événement pour le bouton de décrémentation
removeBtn.addEventListener("click", function() {
  if (quantite > 0) {
    quantite--;
    qtt.textContent = quantite;
  }
});

// Gestionnaire d'événement pour le bouton d'incrémentation
addBtn.addEventListener("click", function() {
  quantite++;
  qtt.textContent = quantite;
});
