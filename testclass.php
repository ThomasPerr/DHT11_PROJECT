<?php
include 'inc/autoload.inc.php';

use domain\Measure;
use dao\MeasureDao;
use dao\DaoBase;

$ID = 4;
$temperature = '20';
$humidite = '25';

$measure = new Measure($ID, $temperature, $humidite);

echo "la temperature est de ".$measure->temperature." degrées.";
echo "l'humidite est de ".$measure->humidite." %.";

$config = include 'inc/config.inc.php';

$measureDao = new MeasureDao($config);

//var_dump($userDao->findAllUsers());
//var_dump($userDao->findUserById(2));
$measureDao->insertMeasure($measure);
//$userDao->deleteUser(1);
//$userDao->updateUser($user, 6);

//$contactDao->insertContact($contact);
//var_dump($contactDao->findAllContact());
//var_dump($contactDao->findContactById(3));
//$contactDao->deleteContact(1);
//$contactDao->updateContact($contact, 2);

?>
