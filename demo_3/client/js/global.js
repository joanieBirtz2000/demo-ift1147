document.addEventListener("DOMContentLoaded", () => {
  const inputId = document.getElementById("idFilm");
  const confirmText = document.getElementById("confirmId");
  const btnShowConfirm = document.getElementById("btnShowConfirm");
  const btnConfirmDelete = document.getElementById("btnConfirmDelete");
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
