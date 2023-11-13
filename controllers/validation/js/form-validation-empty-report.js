const formatoSalidaSelect = document.getElementById("formato");
const sedeDescargaSelect = document.getElementById("sede");
const fechaInicio = document.getElementById("finicio");
const fechaFin = document.getElementById("ffin");

// Función para eliminar la opción all del select sede al elegir la opción Grafico
formatoSalidaSelect.addEventListener("change", function() {
    if (formatoSalidaSelect.value === "Grafico") {
        const sedeDescargaOptions = sedeDescargaSelect.options;
        sedeDescargaOptions[1].style.display = "none";
    } else {
        const sedeDescargaOptions = sedeDescargaSelect.options;
        sedeDescargaOptions[1].style.display = "block";
    }
  });

// Función para no permitir que el formulario se envíe vacío
document.addEventListener("DOMContentLoaded", function() {
    const searchButton = document.getElementById("searchInput");
    const form = document.querySelector(".needs-validation");

  searchButton.addEventListener("click", function(event) {
        if (formatoSalidaSelect.value === "" || (formatoSalidaSelect.value === "Excel" && sedeDescargaSelect.value === "") || (formatoSalidaSelect.value === "Grafico" && sedeDescargaSelect.value === "") || (formatoSalidaSelect.value === "Grafico" && fechaInicio.value === "" && fechaFin.value === "") || (formatoSalidaSelect.value === "Grafico" && fechaInicio.value === "") || (formatoSalidaSelect.value === "Grafico" && fechaFin.value === "")) {
            event.preventDefault();
            event.stopPropagation();
            form.classList.add("was-validated");
        }
  });
});
