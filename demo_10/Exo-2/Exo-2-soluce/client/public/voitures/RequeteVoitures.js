// client/public/voitures/RequeteVoitures.js
const URL_ROUTE = "../../../serveur/routes.php";

// READ
export async function apiListerVoitures() {
  const url = `${URL_ROUTE}?entite=voiture&action=liste`;

  const resp = await fetch(url);
  if (!resp.ok) {
    throw new Error("Erreur HTTP lors du chargement des voitures.");
  }
  return await resp.json();
}

// CREATE / UPDATE
export async function apiSauverVoiture(formData, isEdition) {
  // On ajoute les paramètres nécessaires pour le routeur
  formData.append("entite", "voiture");
  formData.append("action", "sauver");

  const resp = await fetch(URL_ROUTE, {
    method: "POST",
    body: formData,
  });

  if (!resp.ok) {
    throw new Error("Erreur HTTP lors de la sauvegarde de la voiture.");
  }

  return await resp.json();
}

// DELETE
export async function apiSupprimerVoiture(id) {
  const formData = new FormData();
  formData.append("entite", "voiture");
  formData.append("action", "supprimer");
  formData.append("id", id);

  const resp = await fetch(URL_ROUTE, {
    method: "POST",
    body: formData,
  });

  if (!resp.ok) {
    throw new Error("Erreur HTTP lors de la suppression de la voiture.");
  }

  return await resp.json();
}
