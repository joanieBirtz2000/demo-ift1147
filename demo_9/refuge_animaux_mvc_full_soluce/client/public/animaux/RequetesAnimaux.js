// client/public/js/RequetesAnimaux.js
const URL_ROUTE = "../../../serveur/route.php";

// READ
export async function apiListerAnimaux() {
  const resp = await fetch(`${URL_ROUTE}?entite=animal&action=liste`);
  return await resp.json(); // { succes, animaux, message? }
}

// CREATE / UPDATE
export async function apiSauverAnimal(formData, isEdition) {
  formData.append("entite", "animal");
  formData.append("action", isEdition ? "modifier" : "ajouter");

  const resp = await fetch(URL_ROUTE, {
    method: "POST",
    body: formData,
  });
  return await resp.json(); // { succes, message? }
}

// DELETE
export async function apiSupprimerAnimal(id) {
  const fd = new FormData();
  fd.append("entite", "animal");
  fd.append("action", "supprimer");
  fd.append("id", id);

  const resp = await fetch(URL_ROUTE, {
    method: "POST",
    body: fd,
  });
  return await resp.json(); // { succes, message? }
}
