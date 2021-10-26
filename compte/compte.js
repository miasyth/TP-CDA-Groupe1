
class Compte {
    #IdAgence= String;
    #IdClient= String;
    #IdCompte= String;
    #Type= String;
    #Decouvert= Boolean;
    #Solde= Int32Array;

    constructor(IdAgence, IdClient, IdCompte, Type, Decouvert, Solde){
        this.IdAgence = IdAgence;
        this.IdClient = IdClient;
        this.IdCompte = IdCompte;
        this.Type = Type;
        this.Decouvert = Decouvert;
        this.Solde = Solde;
    }

    // Getters
    get IdAgence() {
        return this.#IdAgence;
    }
    get IdClient() {
        return this.#IdClient;
    }
    get IdCompte() {
        return this.#IdCompte;
    }
    get Type() {
        return this.#Type;
    }
    get Decouvert() {
        return this.#Decouvert;
    }
    get Solde() {
        return this.#Solde;
    }

    // Setters
    set IdAgence(IdAgence) {
        this.IdAgence=IdAgence;
    }
    set IdClient(IdClient) {
        this.IdClient=IdClient;
    }
    set IdCompte(IdCompte) {
        this.IdCompte=IdCompte;
    }
    set Type(Type) {
        this.Type=Type;
    }
    set Decouvert(Decouvert) {
        this.Decouvert=Decouvert;
    }
    set Solde(Solde) {
        this.Solde=Solde;
    }

    // Method
    lastClientAccount() {
        return this.height * this.width; // dernier compte du client
    }
}