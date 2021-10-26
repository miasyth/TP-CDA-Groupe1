const BDDJSON= "../BDD/BDD.json"; // permet d'acceder a la base de donnee

// --------------------------------------------------------

// lecture de Json v2
let getData=(url, cb)=>{ // lecture de BDD
  fetch(url)
    .then(response => response.json())
    .then(result => cb(result))
}

getData(BDDJSON, BDD => { // actions sur lecture de BDD
  console.log(BDD.Agences);
  document.querySelector("#a").innerText=BDD._commentaires[0]+"\n";
  document.querySelector("#a").innerText+=BDD._commentaires[3];
})

// --------------------------------------------------------


// --------------------------------------------------------

// ecriture de BDD

// --------------------------------------------------------


// --------------------------------------------------------

// generation liste agences
getData(BDDJSON, BDD => {

  BDD.Agences.forEach(currentValue => {
    opt = document.createElement('option');
    opt.value = currentValue.IdAgence;
    opt.innerHTML = currentValue.nom;
    document.querySelector("#IdAgence").appendChild(opt);
  });

  document.querySelector("#IdAgence");
})

// --------------------------------------------------------

let addCompte=()=>{ // ajoutera un compte au fichier JSON (mais pour l'instant ne fait que recuperer les donnees)

  let IdAgence= document.Fagence.IdAgence.value; // recupere IdAgence

  let IdClient= document.Fclient.IdClient.value; // recupere IdClient

  let IdCompte=0; // ...

  let IdType=""; // cle du type pour l'IdCompte

  // doit verifier que le client existe pour l'agence selectionnee

  let Compte= { // cree l'objet Compte avec les valeurs du formulaire
    Type: document.Fcompte.type.value,
    Decouvert: document.Fcompte.decouvert.value,
    Solde: document.Fcompte.Solde.value
    }

  let Type=""; // String pour le message final

  let Decouvert=""; // String pour le message final

  if(IdAgence==""){ // verifie l'entree de l'agence
    alert("Vous n'avez pas selectionne d'agence");
    return;
  }

  if(IdClient==""){ // verifie l'entree du client
    alert("Vous n'avez pas entre de client");
    return;
  }

  switch (Compte.Type) { // verifie l'entree du type

    case "C":

      Type=" (compte courant) ";
      IdType="01";
      break;

    case "A":

      Type=" (livret A) ";
      IdType="02";
      break;

    case "PEL":

      Type=" (Plan Epargne Logement) ";
      IdType="03";
      break;
    
    default:

      alert("Vous n'avez pas selectionne le type");
      return;
  }

  IdCompte= IdAgence+IdClient+"001"+IdType; // cree l'Id du compte

  switch (Compte.Decouvert) { // verifie l'entree du decouvert

    case "true":

      Decouvert="avec decouvert autorise ";
      break;

    case "false":

      Decouvert="sans decouvert autorise ";
      break;
    
    default:

      alert("Vous n'avez pas selectionne le decouvert");
      return;
  }

  if(Compte.Solde==""){ // met "0" dans le cas ou la solde n'a pas ete entree
    Compte.Solde=0;
  }

  // resets all forms
  document.getElementById("Fagence").reset();
  document.getElementById("Fclient").reset();
  document.getElementById("Fcompte").reset();
  
  alert("Vous venez de creer le compte : "+IdCompte+Type+Decouvert+"ayant pour solde: "+Compte.Solde+" euros.");

  
}

// puts BDD in "b"

getData(BDDJSON, BDD => { // actions
  document.querySelector("#b").innerText=JSON.stringify(BDD.Agences);
  console.log(document.querySelector("#b").innerText);
})

/* 
// archives




*/