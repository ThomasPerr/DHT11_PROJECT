<?php
namespace dao;

use domain\Measure;

include 'DaoBase.php';

class MeasureDao extends DaoBase {

    public function __construct($config) {
        parent::__construct($config);
    }

    public function findAllMeasures() {

        $result = [];

        $reponse = $this->bdd->query("SELECT ID, temperature, humidite FROM Relevee order by ID");

        while ($donnees = $reponse->fetch()) {

            $ID = $donnees["ID"];
            $temperature = $donnees["temperature"];
            $humidite = $donnees["humidite"];

            $measure = new Measure($ID,$temperature, $humidite);

            $result[] = $measure;
        }

        return $result;
    }

    public function findMeasureById($ID) {

        $result;

        $query = $this->bdd->prepare("SELECT ID, temperature, humidite FROM Relevee where ID = :ID");

        $query->bindParam(":ID", $ID);

        if ($query->execute()) {

            if ($donnees = $query->fetch()) {

              $ID = $donnees["ID"];
              $temperature = $donnees["temperature"];
              $humidite = $donnees["humidite"];

              $result = new Measure($ID, $temperature, $humidite);
            }
        }

        return $result;
    }

    public function insertMeasure($measure) {

        $result;

        $query = $this->bdd->prepare("INSERT INTO Relevee (temperature, humidite) VALUES (:temperature, :humidite)");

        $query->bindParam(":temperature", $measure->temperature);

        $query->bindParam(":humidite", $measure->humidite);

        $query->execute();

        $id = $this->bdd->lastInsertId();

        $measure->ID = $id;

        return $id;
    }

    public function deleteMeasure($ID) {

        $query = $this->bdd->prepare("DELETE FROM Relevee WHERE ID = :ID");

        $query->bindParam(":ID", $ID);

        $query->execute();
    }

    public function updateMeasure($measure) {

        $result;

        $query = $this->bdd->prepare("UPDATE Relevee SET temperature = :temperature, humidite = :humidite WHERE ID = :ID");

        $query->bindParam(":temperature", $Measure->temperature);

        $query->bindParam(":humidite", $Measure->humidite);

        $query->bindParam(":ID", $user->ID);

        $query->execute();
    }
}
?>
