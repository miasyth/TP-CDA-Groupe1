<?php

class Client {
    private int $id_client;
    private string $name;
    private string $prenom;
    private string $age;
    private int $sexe; 
    private string $adress;
    private string $code;
    private string $tel;
    private string $mail;
    public function __construct(int $id_client,string $name,string $prenom,string $age,int $sexe,string $adresse,string $code,string $tel,string $mail){
        $this->id=$id_client;
        $this->id1=$name;
        $this->id2=$prenom;
        $this->id3=$age;
        $this->id4=$sexe;
        $this->id5=$adresse;
        $this->id6=$code;
        $this->id7=$tel;
        $this->id8=$mail;
    }
    public function __toString()
    {
     return ($this->id1);
     return ($this->id2);
     return ($this->id3);
     return ($this->id4);
     return ($this->id5);
     return ($this->id6);
     return ($this->id7);
     return ($this->id8);
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
    public function setName(string $name){
        $this->id1=$name;
    }
    public function setPrenom(string $prenom){
        $this->id2=$prenom;
    }
    public function setAge(string $age){
        $this->id3=$age;
    }
    public function setSexe(int $sexe){
        $this->id4=$sexe;
    }
    public function setAdresse(string $adress){
        $this->id5=$adress;
    }
    public function setCode(string $code){
        $this->id6=$code;
    }
    public function setTel(string $tel){
        $this->id7=$tel;
    }
    public function setMail(string $mail){
        $this->id8=$mail;
    }
}


?>