<?php

class Agence {

    private string $Agence;
    private string $Adresse; 
    private string $CodePostal;
    private string $Téléphone;
    private string $Mail;

    public function __construct(string $Agence, string $Adresse, string $CodePostal, string $Téléphone, string $Mail) {
        $this->Agence = $Agence;
        $this->Adresse = $Adresse;
        $this->CodePostal = $CodePostal;
        $this->Téléphone = $Téléphone;
        $this->Mail = $Mail;
        }

    //Séparation get

    public function getAgence() :string {
        return $this -> Agence ;
    }

    public function getAdresse() :string {
        return $this -> Adresse ;
    }

    public function getCodePostal() :string {
        return $this -> CodePostal ;
    }

    public function getTéléphone() :string {
        return $this -> Téléphone ;
    }

    public function getMail() :string {
        return $this -> Mail ;
    }

    //Séparation sett

    public function setAgence(string $Agence) {
        $this-> Agence = $Agence; 
    }

    public function setAdresse(string $Adresse) {
        $this-> Adresse = $Adresse; 
    }

    public function setCodePostal(string $CodePostal) {
        $this-> CodePostal = $CodePostal; 
    }

    public function setTéléphone(string $Téléphone) {
        $this-> Téléphone = $Téléphone; 
    }

    public function setMail(string $Mail) {
        $this-> Mail = $Mail; 
    }
}

?>