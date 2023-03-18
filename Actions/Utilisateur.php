<?php

class Utilisateur {
    private $id ;
    private $nom ;
    private $prenom ;
    private $email ;
    private $photo ;
    private $username ;
    private $password ;

    // Getters 
    public function getId(){
        return $this->id ;
    }
    public function getNom(){
        return $this->nom ;
    }
    public function getPrenom(){
        return $this->prenom ;
    }
    public function getEmail(){
        return $this->email ;
    }
    public function getPhoto(){
        return $this->photo ;
    }
    public function getUsername(){
        return $this->username ;
    }
    public function getPassword(){
        return $this->password ;
    }

    // Setters
    public function setId($id){
        $this->id=$id ;
    }
    public function setNom($nom){
        $this->nom=$nom ;
    }
    public function setPrenom($prenom){
        $this->prenom=$prenom ;
    }
    public function setEmail($email){
        $this->email=$email ;
    }
    public function setPhoto($photo){
        $this->photo=$photo ;
    }
    public function setUsername($username){
        $this->username=$username ;
    }
    public function setPassword($password){
        $this->password=$password ;
    }
}

?>