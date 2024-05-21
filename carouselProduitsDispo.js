// Sélection des éléments DOM nécessaires
const slider = document.getElementById("slider");
const prev = document.getElementById("prev");
const next = document.getElementById("next");

// Initialisation de la valeur de translation
let translateValue = 0;

// Largeur d'un élément dans le carrousel
const itemWidth = 320;

// Gestionnaire d'événement pour le bouton "Suivant"
next.addEventListener("click", () => {
  // Vérifie si la valeur de translation est dans les limites
  if (translateValue > -(slider.children.length - 4) * itemWidth) {
    translateValue -= itemWidth;
  } else {
    // Réinitialise la translation à zéro si la fin du carrousel est atteinte
    translateValue = 0;
  }
  // Met à jour le carrousel avec la nouvelle translation
  updateSlider();
});

// Gestionnaire d'événement pour le bouton "Précédent"
prev.addEventListener("click", () => {
  // Vérifie si la valeur de translation est dans les limites
  if (translateValue < 0) {
    translateValue += itemWidth;
  } else {
    // Déplace à la fin du carrousel si le début est atteint
    translateValue = -(slider.children.length - 4) * itemWidth;
  }
  // Met à jour le carrousel avec la nouvelle translation
  updateSlider();
});

// Fonction pour mettre à jour le carrousel avec la nouvelle translation
function updateSlider() {
  // Animation de transition pour une expérience utilisateur fluide
  slider.style.transition = "transform 0.5s ease-in-out";
  // Applique la nouvelle translation au carrousel
  slider.style.transform = `translateX(${translateValue}px)`;
}
