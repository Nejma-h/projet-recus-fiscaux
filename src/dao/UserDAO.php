<?php

namespace App\Dao;

use App\Utils\Database;
use PDO;

class UserDAO
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function findOrCreateUser($nom, $prenom, $adresse)
    {
        $stmt = $this->db->prepare("SELECT id FROM users WHERE nom = :nom AND prenom = :prenom AND adresse = :adresse LIMIT 1");
        $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':adresse' => $adresse,
        ]);

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            return $row['id'];
        } else {
            $stmt = $this->db->prepare("INSERT INTO users (nom, prenom, adresse) VALUES (:nom, :prenom, :adresse)");
            $stmt->execute([
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':adresse' => $adresse,
            ]);

            return $this->db->lastInsertId();
        }
    }


    public function findUserByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
