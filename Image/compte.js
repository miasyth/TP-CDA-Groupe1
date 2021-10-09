const COMPTES= "/image/BDD.json"; // permettra d'acceder a la base de donnee

let showAgence=(value)=>{ // donnera les agences qui existent pour la liste deroulante de Fagence
  
  /*
  for(val in Client){
    console.log(val);
  }
  */
 
}

// a lire pour la lecture et l'ecriture des cles https://developer.mozilla.org/en-US/docs/Learn/JavaScript/First_steps/Useful_string_methods

// format agence (3 chiffres) auto-incrementes. Exemples: (001, 002, 003, ...)
// format client (2 lettres et 6 chiffres) auto-incrementes (initiale nom+prenom, cle agence, numero client). Exemples: (CF001001, MH001002, LM002001, ...)
// format compte (cle client (sans lettres), numero compte, type de compte). Exemples: (00100100101, 00100100202, 00100200103...)


let addCompte = (Fagence,Fclient,Fcompte) => { // ajoutera un compte au fichier JSON (mais pour l'instant ne fait que recuperer les donnees)

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

  let IdCompte= IdAgence+IdClient+"001"+IdType; // cree l'Id du compte

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