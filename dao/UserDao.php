<?php
namespace dao;

use domaine\User;

include 'DaoBase.php';

class UserDao extends DaoBase {

    public function __construct($config) {
        parent::__construct($config);
    }
    
    public function findAllUsers() {
        
        $result = [];
        
        $reponse = $this->bdd->query("SELECT ID, Login, Mdp, Email FROM user order by ID");
        
        while ($donnees = $reponse->fetch()) {
            
            $ID = $donnees["ID"];
            $Login = $donnees["Login"];
            $Mdp = $donnees["Mdp"];
            $Email = $donnees["Email"];
            
            $user = new User($ID,$Login, $Mdp, $Email);
            
            $result[] = $user;
        }
        
        return $result;
    }
    
    public function findUserById($ID) {
        
        $result;
        
        $query = $this->bdd->prepare("SELECT ID, Login, Mdp, Email FROM user where ID = :ID");
        
        $query->bindParam(":ID", $ID);
        
        if ($query->execute()) {
            
            if ($donnees = $query->fetch()) {
                
                $ID = $donnees["ID"];
                $Login = $donnees["Login"];
                $Mdp = $donnees["Mdp"];
                $Email = $donnees["Email"];
                
                $result = new User($ID,$Login, $Mdp, $Email);
            }
        }
        
        return $result;
    }
    
    public function insertUser($user) {
        
        $result;
        
        $query = $this->bdd->prepare("INSERT INTO user (Login, Mdp, Email) VALUES (:Login, :Mdp, :Email)");
        
        $query->bindParam(":Login", $user->Login);

        $query->bindParam(":Mdp", $user->Mdp);
        
        $query->bindParam(":Email", $user->Email);
        
        $query->execute();   
        
        $id = $this->bdd->lastInsertId();
        
        $user->ID = $ID;
        
        return $ID;
    }
    
    public function deleteUser($ID) {
        
        $query = $this->bdd->prepare("DELETE FROM user WHERE ID = :ID");
        
        $query->bindParam(":ID", $ID);
        
        $query->execute();
    }
    
    public function updateUser($user) {
        
        $result;
        
        $query = $this->bdd->prepare("UPDATE user SET Login = :Login, Mdp = :mdp, Email = :Email WHERE ID = :ID");
        
        $query->bindParam(":Login", $user->Login);
        
        $query->bindParam(":Mdp", $user->Mdp);
        
        $query->bindParam(":Email", $user->Email);
        
        $query->bindParam(":ID", $user->ID);
        
        $query->execute();
    }
}