    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
      // JS function to set a timer for the success messages, 2000 = 2 second timer
      setTimeout(function() {
        var successMessage = document.getElementById("success-message");
        if (successMessage) {
          successMessage.style.display = "none";
        }
      }, 3000);

      // JS function to set a timer for the error messages, 2000 = 2 second timer
      setTimeout(function() {
        var errorMessage = document.getElementById("error-message");
        if (errorMessage) {
          errorMessage.style.display = "none";
        }
      }, 3000);
    </script>
  </body>
</html>

