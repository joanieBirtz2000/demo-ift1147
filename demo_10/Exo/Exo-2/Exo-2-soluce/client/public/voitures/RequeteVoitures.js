// client/public/voitures/RequetesVoitures.js
const API_BASE = "../../../serveur"; // dossier qui contient .htaccess + routes.php

// READ
export async function apiListerVoitures() {
  const resp = await fetch(`${API_BASE}/voiture/liste`);
  if (!resp.ok) {
    throw new Error("Erreur HTTP lors du chargement des voitures.");
  }
  return await resp.json();
}

// CREATE / UPDATE
export async function apiSauverVoiture(formData, isEdition) {
  const resp = await fetch(`${API_BASE}/voiture/sauver`, {
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
  formData.append("id", id);

  const resp = await fetch(`${API_BASE}/voiture/supprimer`, {
    method: "POST",
    body: formData,
  });

  if (!resp.ok) {
    throw new Error("Erreur HTTP lors de la suppression de la voiture.");
  }

  return await resp.json();
}
