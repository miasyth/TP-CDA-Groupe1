/*import ('classclient.php') Require en JavaScript*/ 

class Client {

  constructor(id_client,name,prenom,age,sexe,adresse,code,tel,mail){
      $this.id=id_client;
      $this.id1=name;
      $this.id2=prenom;
      $this.id3=age;
      $this.id4=sexe;
      $this.id5=adresse;
      $this.id6=code;
      $this.id7=tel;
      $this.id8=mail;
  }
  
  /*
  public function getNom(){
      return $this->id;
  }
  public function getTitle(){
      return $this->id1;
  }
  public function getAuteur(){
      return $this->id2;
  }
  public function getPrix(){
      return $this->id3;
  }*/
  public function setName(string name){
      $this->id1=name;
  }
  public function setPrenom(string prenom){
      $this->id2=prenom;
  }
  public function setAge(string age){
      $this->id3=age;
  }
  public function setSexe(int sexe){
      $this->id4=sexe;
  }
  public function setAdresse(string adress){
      $this->id5=adress;
  }
  public function setCode(string code){
      $this->id6=code;
  }
  public function setTel(string tel){
      $this->id7=tel;
  }
  public function setMail(string mail){
      $this->id8=mail;
  }
}


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
  console.log(BDD.Agences);
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
/*
function pregmatch(
  
)
*/

let addClient=(Fagence,Fclient)=>{ // ajoutera un compte au fichier JSON (mais pour l'instant ne fait que recuperer les donnees)
  

  let IdAgence= document.Fagence.IdAgence.value; // recupere IdAgence

  // doit verifier si l'agence sélectionner existe et n'a pas trop de client

  let Client1=new Client ( // cree l'objet Client avec les valeurs du formulaire
    Idagence: document.Fagence.IdAgence.value,
    IdClient: 0,
    nom: document.Fclient.nom.value,
    prenom: document.Fclient.prenom.value,
    date: document.Fclient.date.value,
    sexe: document.Fclient.sexe.value,
    adress: document.Fclient.adress.value,
    cdp: document.Fclient.cdp.value,
    tel: document.Fclient.tel.value,
    mail: document.Fclient.mail.value
  )


  console.log(Client.Idagence);

  if(Client.Idagence==0){
    alert("Vous n'avez pas selectionne d'agence");
    return;
  }
  
  if(Client.nom==0){
    alert("Vous n'avez pas renseigner votre nom");
    return;
  }
  
  if(Client.prenom==0){
    alert("Vous n'avez pas renseignez votre prénom");
    return;
  }
  
  if(Client.date==0){
    alert("Vous n'avez pas renseigner votre date de naissance");
    return;
  }
  
  if(Client.sexe==0){
    alert("Sélectionnez votre sexe");
    return;
  }
  
  if(Client.adress==0){
    alert("Vous n'avez pas renseigner votre adresse");
    return;
  }
  
  if(Client.cdp==0){
    alert("Vous n'avez pas renseignez votre code postale");
    return;
  }
  
  if(Client.tel==0){
    alert("Veuillez ajouté un moyen de contact téléphonique");
    return;
  }
  
  if(Client.mail==0){
    alert("Veuillez ajouté une adresse mail");
    return;
  }

  // resets all forms
  document.getElementById("Fagence").reset();
  document.getElementById("Fclient").reset();
  
  alert("Vous venez de creer votre compte client qui a pour nom et prénom : "+Client.nom+" "+Client.prenom);
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