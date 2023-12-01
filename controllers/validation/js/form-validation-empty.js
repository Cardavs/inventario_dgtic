(() => {
  "use strict";

  // Select the first element with the class "needs-validation"
  const form = document.querySelector(".needs-validation");

  // Check if the element is found
  if (form) {
    form.addEventListener(
      "submit",
      (event) => {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        } else {
          if (form.id === "descargaForm") {
            alert("Descarga inciada, en breve se redireccionara.");
            setTimeout(() => {
              window.location.href = "manage-material.php";
            }, 2500);
          }
        }

        form.classList.add("was-validated");
      },
      false
    );
  } else {
    console.error("No element with class 'needs-validation' found.");
  }
})();

function cancelarFormularioA() {
  window.location.href = "manage-account.php";
}

function cancelarFormularioM() {
  window.location.href = "manage-material.php";
}
