<?php
namespace service;

use domain\Measure;
include 'inc/autoload.inc.php';

class UserService {
    public function __construct() {

    }

    public function isValid($measure) {

        $result = [];

        if ($measure->temperature == '') {

            $result['measure.temperature'] = "temperature is required";
        }

        if ($measure->humidite == '') {

            $result['measure.humidite'] = "humidite is required";
        }

        return $result;
    }
}
?>
