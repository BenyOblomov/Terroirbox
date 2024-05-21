let product_for_recipe = document.getElementById("product_for_recepe").textContent;
// Construire l'URL de l'API
let url = `https://api.spoonacular.com/recipes/findByIngredients?apiKey=762e26ea1360479791bcfed5116055de&ingredients=`+ product_for_recipe;
console.log(url);
// Sélectionner l'élément HTML où afficher les résultats
let result = document.querySelector('.result');
// Fonction pour récupérer les données de l'API
function fetchData(url) {
    fetch(url)
        .then(response => response.json()) // Convertir la réponse en JSON
        .then(data => {
            // Vérifier si des résultats ont été retournés
            if (data && data.length > 0) {
                // Récupérer seulement les 3 premiers résultats
                let recipes = data.slice(0, 3);

                // Boucler à travers les recettes et créer des cartes pour chacune
                recipes.forEach(recipe => {
                    // Créer une carte pour chaque recette
                    let card = document.createElement('div');
                    card.classList.add('col');
                    let cardInner = `
                        <div class="card mx-auto my-3" style="width: 18rem;">
                            <img src="${recipe.image}" class="card-img-top" alt="${recipe.title}">
                            <div class="card-body">
                                <h5 class="card-title">${recipe.title}</h5>
                                <p class="card-text">${recipe.description}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Tailles disponibles : 1 pers, 2 pers, 3/4 pers</li>
                            </ul>
                            <div class="card-body">
                                <a href="produit.php?id=${recipe.id}" class="card-link btn btn-sm btn-success">Voir la recette</a>
                            </div>
                        </div>
                    `;
                    card.innerHTML = cardInner;
                    // Ajouter la carte à la zone de résultat
                    result.appendChild(card);
                });
            } else {
                // Si aucune recette n'est trouvée, afficher un message approprié
                result.textContent = "Aucune recette trouvée avec le mot clé " + product_for_recipe;
            }
        })
        .catch(error => {
            // Gérer les erreurs survenues lors de la récupération des données
            console.error('Une erreur s\'est produite lors de la récupération des données:', error);
            result.textContent = "Une erreur s'est produite lors de la récupération des recettes.";
        });
}
// Appeler la fonction fetchData avec l'URL construite
fetchData(url);
