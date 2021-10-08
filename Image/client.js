

// Exemple Assurance 

// Votre Age
let S1=0;
// Année de permis
let S2=0;
// Accident Responsable
let S3=0;
// Fidélité
let S4=0;


S1= window.prompt('Votre âge : ');
S2= window.prompt('Nombres années de permis : ');
S3= window.prompt('Nombres accident responsable : ');
S4= window.prompt('Anciennité du client : ');


if(S1<25 && S2<2 && S3==0 || S1<25 & S2>=2 && S3==1 || S1>=25 && S2<2 && S3==1 || S1>=25 && S2>=2 && S3==2){
    if(S4>=5) {
        console.log('Tarif Orange');
    } else {
        console.log('Tarif Rouge');
    }
} else if (S1<25 && S2>=2 && S3==0 || S1>=25 && S2<2 && S3==0 || S1>=25 && S2>=2 && S3==1){
    if(S4>=5) {
        console.log('Tarif Vert');
    } else {
        console.log('Tarif Orange');
    }
} else if (S1>=25 && S2>=2 && S3==0){
    if(S4>=5) {
        console.log ('Tarif Bleu');
    } else {
        console.log ('Tarif Vert');
    }
}else {
    console.log('Refusé');
}



// Exemple Tableau + Objet


/*
let tab =[];
tab["cle1"]=1,
tab["cle2"]=2,
console.log(tab["cle2"]);

const newtab= tab.map((val,index) =>  {
    console.log(val + " " + index);
})

console.log(newtab["cle1"])
*/

let tableauOrig = [{cle:1, valeur:10}, {cle:2, valeur:20}, {cle:3, valeur: 30}];
let tableauFormaté = tableauOrig.map(obj => {
    console.log(obj.cle);
});



