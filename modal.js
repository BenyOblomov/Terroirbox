const myModal = document.getElementById('myModal'); // Récupère l'élément de la modale par son ID
const myInput = document.getElementById('myInput'); // Récupère l'élément d'entrée par son ID

myModal.addEventListener('shown.bs.modal', () => { // Ajoute un écouteur d'événements pour l'événement "shown.bs.modal" de la modale
  myInput.focus(); // Met le focus sur l'élément d'entrée lorsque la modale est affichée
});
