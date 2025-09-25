document.addEventListener("DOMContentLoaded", () => {
  // id premier modal
  const inputId = document.getElementById("idFilm");
  // id second modal
  const confirmText = document.getElementById("confirmId");
  // bouton confirmer dans le premier modal
  const btnShowConfirm = document.getElementById("btnShowConfirm");
  // bouton supprimer dans le second modal
  const btnConfirmDelete = document.getElementById("btnConfirmDelete");
  // formulaire du prmier modal
  const formSupprimer = document.getElementById("formSupprimer");

  // Quand on clique sur "Supprimer" dans le 1er modal
  btnShowConfirm.addEventListener("click", () => {
    confirmText.textContent = inputId.value;
  });

  // Quand on clique sur "Oui, supprimer"
  btnConfirmDelete.addEventListener("click", () => {
    formSupprimer.submit();
  });
});


// $(function() {
//   $("#btnShowConfirm").on("click", function() {
//     $("#confirmId").text($("#idFilm").val());
//   });
//   $("#btnConfirmDelete").on("click", function() {
//     $("#formSupprimer").submit();
//   });
// });
