<?php
namespace domaine;

class User
{
    public $ID;
    public $Login;
    public $Mdp;
    public $Email;
    
    public function __construct($ID,$Login, $Mdp, $Email){
        $this->ID = $ID;
        $this->Login = $Login;
        $this->Mdp = $Mdp;
        $this->Email = $Email;
    }
}

