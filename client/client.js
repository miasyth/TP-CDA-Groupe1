const BDDJSON= "../BDD/BDD.json"; // permet d'acceder a la base de donnee
const TESTJSON= "../compte/TEST.json"; // permet d'acceder a la base de donnee


// lecture de Json v2
let getData=(url, cb)=>{ // lecture de BDD
  fetch(url)
    .then(response => response.json())
    .then(result => cb(result))
}
//

/*

let putData=(url, BDD)=>{ // ecriture de BDD

  try{
    
  const myInit = { // parametre de fetch
    method: 'post',
    body: JSON.stringify({BDD})
  };

  fetch(url, myInit) // ecriture de BDD
    .then(res => res.json())
    .then(res => console.log(res))
  } catch (error){
    console.error(error);
  }
}
*/

// --------------------------------------------------------

let Agences={
  id:"001"
}

//putData(TESTJSON, Agences);

// --------------------------------------------------------

getData(BDDJSON, BDD => { // actions
  console.log(BDD.Client);
  document.querySelector("#a").innerText=BDD._commentaires[0]+"\n";
  document.querySelector("#a").innerText+=BDD._commentaires[3];
})

let showAgences=(value)=>{ // donnera les agences qui existent pour la liste deroulante de Fagence
  
  /*
  for(val in Client){
    console.log(val);
  }
  */
 
}

function pregmatch(
  
)


let addClient=(Fclient,Fagence)=>{ // ajoutera un compte au fichier JSON (mais pour l'instant ne fait que recuperer les donnees)
  

  let IdAgence= document.Fagence.IdAgence.value; // recupere IdAgence

  // doit verifier si l'agence sélectionner existe et n'a pas trop de client

  let Client= { // cree l'objet Client avec les valeurs du formulaire
    Type: document.Fclient.type.value,
    }

  let Type=""; // String pour le message final


  if(IdAgence==""){ // verifie l'entree de l'agence
    alert("Vous n'avez pas selectionne d'agence");
    return;
  }

  switch (Client.Type){ // vérifie les entrées du clients 
    
    case "Nom":

      Type="Votre nom d'usage"
    break;
    
    case "Prenom":

      Type="Votre prénom"
    break;
    
    case "Age":

      Type="Saisir votre date de naissance"
      
    break;  
    
    case "Sexe":

      Type="Veuillez renseigner votre sexe"
    break;
    
    case "Adress":

      Type="Veuillez renseigner votre adresse complète sans le code postal"
    break;
    
    case "Code":

      Type="Saisir votre code postal"
    break;
    
    case "Tel":

      Type="Veuillez saisir votre moyen de communication téléphonique"
    break;
    
    case "Mail":

      Type="Veuillez saisir votre adresse e-Mail"
    break;
    
    default:

      alert("Vous n'avez pas selectionné ou renseigné l'élement correspondant");
      return;
  }


if(Client.agence==""){ // met "0" dans le cas où le agence n'est pas renseigné
  Client.agence=0;
}
else if(Client.nom==""){
  Client.nom=0;
}
else if(Client.prenom==""){
  Client.prenom=0;
}
else if(Client.age==""){
  Client.age=0;
}
else if(Client.sexe==""){
  Client.sexe=0;
}
else if(Client.adress==""){
  Client.adress=0;
}
else if(Client.cdp==""){
  Client.cdp=0;
}
else if(Client.tel==""){
  Client.tel=0;
}
else if(Client.mail==""){
  Client.mail=0;
}

  // resets all forms
  document.getElementById("Fagence").reset();
  document.getElementById("Fclient").reset();
  
  alert("Vous venez de creer votre compte client : "+IdClient+Type+"ayant pour nom et prénom : "+nom.prenom);
}


/* 
// archives


// lecture de Json v1

fetch(BDDJSON) // lecture de BDD
.then(response => response.json())
.then(data => {
  // actions
  console.log(data);
})

*/