<?php
namespace domaine;

class Measure
{
    public $Temperature;
    public $Humidite;
    
    public function __construct($Temperature, $Humidite){
        $this->Temperature = $Temperature;
        $this->Humidite = $Humidite;  
    }
}

