<?php
namespace domain;

class Measure
{
    public $temperature;
    public $humidite;

    public function __construct($ID, $temperature, $humidite){
        $this->ID = $ID;
        $this->temperature = $temperature;
        $this->humidite = $humidite;

    }
}
?>
