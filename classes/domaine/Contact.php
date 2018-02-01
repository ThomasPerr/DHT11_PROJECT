<?php
namespace domaine;

class Contact
{
    public $ID;
    public $UserID;
    public $Nom;
    public $Prenom;
    public $Adresse;
    public $Tel;
    
    public function __construct($ID, $UserID, $Nom, $Prenom, $Adresse, $Tel){
        $this->ID = $ID;
        $this->UserID = $UserID;
        $this->Nom = $Nom;
        $this->Prenom = $Prenom;
        $this->Adresse = $Adresse;
        $this->Tel = $Tel;   
    }
}

