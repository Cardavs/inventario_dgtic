document.addEventListener("DOMContentLoaded", function() {
  const downloadButton = document.getElementById("downloadInputFilter");
  const searchButton = document.getElementById("searchInput");
  const form = document.querySelector(".needs-validation");

  searchButton.addEventListener("click", function(event) {
      if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
          form.classList.add("was-validated");
      }
  });

  downloadButton.addEventListener("click", function(event) {
      form.classList.add("was-validated");
  });
});
  