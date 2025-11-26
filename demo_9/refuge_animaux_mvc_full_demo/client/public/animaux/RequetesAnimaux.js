// client/public/js/RequetesAnimaux.js
const URL_ROUTE = "../../../serveur/route.php";

// READ
export async function apiListerAnimaux() {
  // TODO Étapes :
  // 1. Construire l'URL de requête avec les bons paramètres GET :
  //    - entite=animal
  //    - action=liste
  // 2. Appeler fetch(...) avec cette URL (méthode GET).
  // 3. Récupérer la réponse (await resp.json()).
  // 4. Retourner le JSON au code appelant (VuesAnimaux.js).
}

// CREATE / UPDATE
export async function apiSauverAnimal(formData, isEdition) {
  // TODO Étapes :
  // 1. Ajouter au FormData :
  //    - entite = "animal"
  //    - action = "ajouter" si isEdition est false
  //      ou "modifier" si isEdition est true.
  // 2. Appeler fetch(URL_ROUTE, ...) avec :
  //    - method: "POST"
  //    - body: formData
  // 3. Récupérer la réponse JSON (await resp.json()).
  // 4. Retourner le JSON au code appelant.
}

// DELETE
export async function apiSupprimerAnimal(id) {
  // TODO Étapes :
  // 1. Créer un nouvel objet FormData.
  // 2. Ajouter dans le FormData :
  //    - entite = "animal"
  //    - action = "supprimer"
  //    - id (l'identifiant de l'animal à supprimer)
  // 3. Appeler fetch(URL_ROUTE, ...) en POST avec ce FormData.
  // 4. Récupérer la réponse JSON (await resp.json()).
  // 5. Retourner le JSON au code appelant.
}
