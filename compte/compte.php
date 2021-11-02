<?php

require "connexion.php";

class Compte {

    private string $IdCompte;
    private string $Type; 
    private string $Decouvert;
    private string $Solde;
    private string $IdAgence;
    private string $IdClient;

    public function __construct(string $IdCompte, string $Type, string $Decouvert, string $Solde, string $Mail, string $IdAgence, string $IdClient) {
        $this->IdCompte = $IdCompte;
        $this->Type = $Type;
        $this->Decouvert = $Decouvert;
        $this->Solde = $Solde;
        $this->Mail = $Mail;
        $this->IdAgence = $IdAgence;
        $this->IdClient = $IdClient;
    }


    // Getters

    public function getIdCompte(): string {
        return $this->IdCompte;
    }

    public function getType(): string {
        return $this->Type;
    }

    public function getDecouvert(): string {
        return $this->Decouvert;
    }

    public function getSolde(): string {
        return $this->Solde;
    }

    public function getIdAgence(): string {
        return $this->IdAgence;
    }

    public function getIdClient(): string {
        return $this->IdClient;
    }


    // Setters

    public function setIdCompte(string $IdCompte): self {
        $this->IdCompte = $IdCompte;

        return $this;
    }

    public function setType(string $Type): self {
        $this->Type = $Type;

        return $this;
    }

    public function setDecouvert(string $Decouvert): self {
        $this->Decouvert = $Decouvert;

        return $this;
    }

    public function setSolde(string $Solde): self {
        $this->Solde = $Solde;

        return $this;
    }

    public function setIdAgence(string $IdAgence): self {
        $this->IdAgence = $IdAgence;

        return $this;
    }

    public function setIdClient(string $IdClient): self {
        $this->IdClient = $IdClient;

        return $this;
    }
}

?>