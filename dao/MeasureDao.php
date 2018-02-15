<?php
namespace dao;

use domain\Measure;

include 'DaoBase.php';

class MeasureDao extends DaoBase {

    public function __construct($config) {
        parent::__construct($config);
    }

    public function findAllMeasure() {

        $result = [];

        $reponse = $this->bdd->query("SELECT ID, temperature, humidite FROM user order by ID");

        while ($donnees = $reponse->fetch()) {

            $ID = $donnees["ID"];
            $temperature = $donnees["temperature"];
            $humidite = $donnees["humidite"];

            $user = new Measure($ID,$temperature, $humidite);

            $result[] = $user;
        }

        return $result;
    }

    public function findMeasureById($ID) {

        $result;

        $query = $this->bdd->prepare("SELECT ID, temperature, humidite FROM measure where ID = :ID");

        $query->bindParam(":ID", $ID);

        if ($query->execute()) {

            if ($donnees = $query->fetch()) {

              $ID = $donnees["ID"];
              $temperature = $donnees["temperature"];
              $humidite = $donnees["humidite"]

              $result = new Measure($ID,$temperature, $humidite);
            }
        }

        return $result;
    }

    public function insertMeasure($user) {

        $result;

        $query = $this->bdd->prepare("INSERT INTO Measure (Login, Mdp, Email) VALUES (:temperature, :humidite)");

        $query->bindParam(":temperature", $Measure->temperature);

        $query->bindParam(":humidite", $Measure->humidite);

        $query->execute();

        $id = $this->bdd->lastInsertId();

        $Measure->ID = $ID;

        return $ID;
    }

    public function deleteMeasure($ID) {

        $query = $this->bdd->prepare("DELETE FROM Measure WHERE ID = :ID");

        $query->bindParam(":ID", $ID);

        $query->execute();
    }

    public function updateMeasure($user) {

        $result;

        $query = $this->bdd->prepare("UPDATE Measure SET temperature = :temperature, humidite = :humidite WHERE ID = :ID");

        $query->bindParam(":temperature", $Measure->temperature);

        $query->bindParam(":humidite", $Measure->humidite);

        $query->bindParam(":ID", $user->ID);

        $query->execute();
    }
}
?>
