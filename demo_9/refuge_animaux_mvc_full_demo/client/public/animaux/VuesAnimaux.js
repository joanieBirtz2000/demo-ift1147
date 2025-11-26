// client/public/js/VuesAnimaux.js
import {
  apiListerAnimaux,
  apiSauverAnimal,
  apiSupprimerAnimal,
} from "./RequetesAnimaux.js";

const form = document.getElementById("form-animal");
const tblBody = document.querySelector("#tbl-animaux tbody");
const zoneMessage = document.getElementById("zone-message");
const btnReset = document.getElementById("btn-reset");
const inputId = document.getElementById("animal-id");

document.addEventListener("DOMContentLoaded", () => {
  chargerAnimauxVue();
});

form.addEventListener("submit", async (e) => {
  e.preventDefault();

  const formData = new FormData(form);
  const id = inputId.value.trim();
  const isEdition = !!id;

  try {
    const json = await apiSauverAnimal(formData, isEdition);
    afficherMessage(json.succes, json.message || "Sauvegarde effectuée");

    if (json.succes) {
      form.reset();
      inputId.value = "";
      chargerAnimauxVue();
    }
  } catch (err) {
    console.error(err);
    afficherMessage(false, "Erreur côté client");
  }
});

btnReset.addEventListener("click", () => {
  form.reset();
  inputId.value = "";
});

async function chargerAnimauxVue() {
  try {
    const json = await apiListerAnimaux();

    if (!json.succes) {
      afficherMessage(false, json.message || "Erreur de chargement");
      return;
    }

    afficherAnimaux(json.animaux);
  } catch (err) {
    console.error(err);
    afficherMessage(false, "Erreur côté client");
  }
}

function afficherAnimaux(animaux = []) {
  tblBody.innerHTML = "";

  if (!Array.isArray(animaux) || animaux.length === 0) {
    tblBody.innerHTML =
      '<tr><td colspan="6" class="text-center text-muted">Aucun animal</td></tr>';
    return;
  }

  for (const a of animaux) {
    const tr = document.createElement("tr");

    const tdPhoto = document.createElement("td");
    if (a.photo) {
      const img = document.createElement("img");
      img.src = `../../../serveur/Animal/photos/${a.photo}`;
      img.alt = a.nom;
      img.width = 60;
      img.height = 60;
      img.classList.add("object-fit-cover", "rounded");
      tdPhoto.appendChild(img);
    } else {
      tdPhoto.textContent = "-";
    }

    const tdNom = document.createElement("td");
    tdNom.textContent = a.nom;

    const tdEspece = document.createElement("td");
    tdEspece.textContent = a.espece;

    const tdStatut = document.createElement("td");
    tdStatut.textContent = a.statut;

    const tdDate = document.createElement("td");
    tdDate.textContent = a.date_arrivee;

    const tdActions = document.createElement("td");
    tdActions.classList.add("text-nowrap");

    const btnEdit = document.createElement("button");
    btnEdit.className = "btn btn-sm btn-outline-primary me-1";
    btnEdit.textContent = "Modifier";
    btnEdit.addEventListener("click", () => remplirFormPourEdition(a));

    const btnDel = document.createElement("button");
    btnDel.className = "btn btn-sm btn-outline-danger";
    btnDel.textContent = "Supprimer";
    btnDel.addEventListener("click", () => supprimerAnimalVue(a.id_animal));

    tdActions.append(btnEdit, btnDel);
    tr.append(tdPhoto, tdNom, tdEspece, tdStatut, tdDate, tdActions);
    tblBody.appendChild(tr);
  }
}

function remplirFormPourEdition(a) {
  inputId.value = a.id_animal;
  form.nom.value = a.nom;
  form.espece.value = a.espece;
  form.description.value = a.description || "";
  form.statut.value = a.statut || "ADOPTABLE";
  form.date_arrivee.value = a.date_arrivee || "";
  form.photo.value = null; // impossible à pré-remplir pour sécurité
}

async function supprimerAnimalVue(id) {
  if (!confirm("Supprimer cet animal ?")) return;

  try {
    const json = await apiSupprimerAnimal(id);
    afficherMessage(json.succes, json.message || "Suppression effectuée");

    if (json.succes) {
      chargerAnimauxVue();
    }
  } catch (err) {
    console.error(err);
    afficherMessage(false, "Erreur côté client");
  }
}

function afficherMessage(succes, texte) {
  if (!zoneMessage) return;
  zoneMessage.innerHTML = "";

  const div = document.createElement("div");
  div.className = `alert alert-${succes ? "success" : "danger"} mt-2`;
  div.textContent = texte;
  zoneMessage.appendChild(div);

  setTimeout(() => {
    if (zoneMessage.contains(div)) {
      zoneMessage.removeChild(div);
    }
  }, 4000);
}
