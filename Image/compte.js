window.addEventListener("load", function () {
    function sendData() {
      var XHR = new XMLHttpRequest();
  
      // Liez l'objet FormData et l'élément form
      var FD = new FormData(form);
  
      // Définissez ce qui se passe si la soumission s'est opérée avec succès
      XHR.addEventListener("load", function(event) {
        alert(event.target.responseText);
      });
  
      // Definissez ce qui se passe en cas d'erreur
      XHR.addEventListener("error", function(event) {
        alert('Oups! Quelque chose s\'est mal passé.');
      });
  
      // Configurez la requête
      XHR.open("POST", "https://example.com/cors.php");
  
      // Les données envoyées sont ce que l'utilisateur a mis dans le formulaire
      XHR.send(FD);
    }
  
    // Accédez à l'élément form …
    var form = document.getElementById("myForm");
  
    // … et prenez en charge l'événement submit.
    form.addEventListener("submit", function (event) {
      event.preventDefault();
  
      sendData();
    });
});

function controle(compteForm) {
    var test = document.compteForm.id.value;
    alert("Vous avez tapé : " + test);
}