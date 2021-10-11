/*

function sendData(data) {
    let XHR = new XMLHttpRequest();
    let urlEncodedData = "";
    let urlEncodedDataPairs = [];
    let name;
  
    // Transformez l'objet data en un tableau de paires clé/valeur codées URL.
    for(name in data) {
      urlEncodedDataPairs.push(encodeURIComponent(name) + '=' + encodeURIComponent(data[name]));
    }
  
    // Combinez les paires en une seule chaîne de caractères et remplacez tous
    // les espaces codés en % par le caractère'+' ; cela correspond au comportement
    // des soumissions de formulaires de navigateur.
    urlEncodedData = urlEncodedDataPairs.join('&').replace(/%20/g, '+');
  
    // Définissez ce qui se passe en cas de succès de soumission de données
    XHR.addEventListener('load', function(event) {
      alert('Ouais ! Données envoyées et réponse chargée.');
    });
  
    // Définissez ce qui arrive en cas d'erreur
    XHR.addEventListener('error', function(event) {
      alert('Oups! Quelque chose s\'est mal passé.');
    });
  
    // Configurez la requête
    XHR.open('POST', 'https://example.com/cors.php');
  
    // Ajoutez l'en-tête HTTP requise pour requêtes POST de données de formulaire
    XHR.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  
    // Finalement, envoyez les données.
    XHR.send(urlEncodedData);
  }
*/

const BDDJSON= "/image/BDD.json"; // permettra d'acceder a la base de donnee


fetch(BDDJSON) // lecture de la BDD
.then(response => response.json())
.then(data => {
  console.log(data);
  document.querySelector("#a").innerText=data._commentaires[3]+"\n";
  document.querySelector("#a").innerText+=data._commentaires[2];
})

let BDD

function getData(url, cb) {
  fetch(url)
    .then(response => response.json())
    .then(result => cb(result));
}

getData(BDDJSON, (BDD) => console.log(BDD.client))



let client = [{
    nom : "Exemple : Dupont" ,
    prenom : "Exemple : Jacques" ,
    dateDeNaiss : "Votre date de naissance en format JJ/MM/AAAA : ",
    sexe : "Homme || Femme",
    adresse : "Exemple : 20 rue du Temple",
    ville : "Exemple : Paris",
    codePost : "Exemple : 75000",
    telPort : "Exemple : 06.01.01.01.01",
    telFixe : "Exemple : 01.45.02.02.02",
    mail : "Exemple : exemple@exe.com",
}];

let creaClient = [{
    nom : prompt("Votre nom : ") ,
    prenom : prompt("Votre prénom : ") ,
    dateDeNaiss : prompt("Votre date de naissance type JJ/MM/AAAA : ") ,
    sexe : prompt(" Femme ou Homme : ") ,
    adresse : prompt("Votre adresse (numéro + rue) : ") ,
    ville : prompt("Votre ville : ") ,
    codePost : prompt("Votre code Postale : ") ,
    telPort : prompt("Votre numéro de portable (06.01.01.01.01) : ") ,
    telFixe : prompt("Votre numéro fixe (02.01.01.01.01) : ") ,
    mail : prompt("Votre mail (exemple@exe.com) : ") ,
}];


let newClient = JSON.stringify(creaClient);
let creatClient = JSON.parse(newClient);
console.log(creaClient)