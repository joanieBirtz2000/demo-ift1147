// client/public/voitures/VuesVoitures.js
import {
  apiListerVoitures,
  apiSauverVoiture,
  apiSupprimerVoiture,
} from "./RequeteVoitures.js";

const form = document.getElementById("form-voiture");
const tblBody = document.querySelector("#tbl-voitures tbody");
const zoneMessage = document.getElementById("zone-message");
const btnReset = document.getElementById("btn-reset");
const inputId = document.getElementById("voiture-id");

document.addEventListener("DOMContentLoaded", () => {
  chargerVoituresVue().catch((err) => {
    afficherMessage(
      "Erreur lors du chargement des voitures : " + err.message,
      false
    );
  });
});

async function chargerVoituresVue() {
  const json = await apiListerVoitures();

  if (!json.succes) {
    afficherMessage(
      json.message || "Erreur lors du chargement des voitures.",
      false
    );
    return;
  }

  const voitures = json.data || [];
  tblBody.innerHTML = "";

  voitures.forEach((v) => {
    ajouterLigneVoiture(v);
  });
}

if (form) {
  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    try {
      const formData = new FormData(form);
      const isEdition = inputId.value.trim() !== "";

      const json = await apiSauverVoiture(formData, isEdition);

      if (!json.succes) {
        afficherMessage(
          json.message || "Erreur lors de l'enregistrement.",
          false
        );
      } else {
        afficherMessage(json.message || "Enregistrement réussi.", true);
        form.reset();
        inputId.value = "";
        await chargerVoituresVue();
      }
    } catch (err) {
      afficherMessage("Erreur JS : " + err.message, false);
    }
  });
}

if (btnReset) {
  btnReset.addEventListener("click", () => {
    form.reset();
    inputId.value = "";
    zoneMessage.innerHTML = "";
  });
}

function ajouterLigneVoiture(voiture) {
  const tr = document.createElement("tr");

  const tdId = document.createElement("td");
  tdId.textContent = voiture.id;

  const tdMarque = document.createElement("td");
  tdMarque.textContent = voiture.marque;

  const tdModele = document.createElement("td");
  tdModele.textContent = voiture.modele;

  const tdType = document.createElement("td");
  tdType.textContent = voiture.type_carburant;

  const tdPrix = document.createElement("td");
  tdPrix.textContent = Number(voiture.prix).toFixed(2) + " $";

  const tdDate = document.createElement("td");
  tdDate.textContent = voiture.date_arrivee;

  const tdActions = document.createElement("td");

  const btnEdit = document.createElement("button");
  btnEdit.type = "button";
  btnEdit.className = "btn btn-sm btn-outline-primary me-2";
  btnEdit.textContent = "Modifier";

  btnEdit.addEventListener("click", () => {
    inputId.value = voiture.id;
    document.getElementById("marque").value = voiture.marque;
    document.getElementById("modele").value = voiture.modele;
    document.getElementById("type_carburant").value = voiture.type_carburant;
    document.getElementById("prix").value = voiture.prix;
    document.getElementById("date_arrivee").value = voiture.date_arrivee;
    document.getElementById("description").value = voiture.description || "";
    window.scrollTo({ top: 0, behavior: "smooth" });
  });

  const btnDel = document.createElement("button");
  btnDel.type = "button";
  btnDel.className = "btn btn-sm btn-outline-danger";
  btnDel.textContent = "Supprimer";

  btnDel.addEventListener("click", async () => {
    if (!confirm("Supprimer cette voiture ?")) return;

    try {
      const json = await apiSupprimerVoiture(voiture.id);
      if (!json.succes) {
        afficherMessage(
          json.message || "Erreur lors de la suppression.",
          false
        );
      } else {
        afficherMessage(json.message || "Voiture supprimée.", true);
        await chargerVoituresVue();
      }
    } catch (err) {
      afficherMessage("Erreur JS : " + err.message, false);
    }
  });

  tdActions.appendChild(btnEdit);
  tdActions.appendChild(btnDel);

  tr.appendChild(tdId);
  tr.appendChild(tdMarque);
  tr.appendChild(tdModele);
  tr.appendChild(tdType);
  tr.appendChild(tdPrix);
  tr.appendChild(tdDate);
  tr.appendChild(tdActions);

  tblBody.appendChild(tr);
}

function afficherMessage(texte, succes = true) {
  zoneMessage.innerHTML = "";
  const div = document.createElement("div");
  div.className = "alert " + (succes ? "alert-success" : "alert-danger");
  div.textContent = texte;
  zoneMessage.appendChild(div);

  setTimeout(() => {
    if (zoneMessage.contains(div)) {
      zoneMessage.removeChild(div);
    }
  }, 4000);
}
