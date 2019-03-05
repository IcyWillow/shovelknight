<?php

namespace App\Repository;

use App\Database\ConnectionHandler;
use Exception;

class LoginRepository extends Repository
{
    protected $tableName = 'user';

    /**
     * Erstellt einen neuen benutzer mit den gegebenen Werten.
     *
     * Das Passwort wird vor dem ausführen des Queries noch mit dem SHA1
     *  Algorythmus gehashed.
     *
     * @param $firstName Wert für die Spalte firstName
     * @param $lastName Wert für die Spalte lastName
     * @param $email Wert für die Spalte email
     * @param $password Wert für die Spalte password
     *
     * @throws Exception falls das Ausführen des Statements fehlschlägt
     */
    public function create($username, $password)
    {
        $password = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO $this->tableName (username, password) VALUES (?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ss', $username, $password);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }

    // return username by id
    public function getUserName($user_id)
    {

        $query = "SELECT username FROM $this->tableName WHERE id = ?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $user_id->id);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        // Resultat der Abfrage holen
        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Ersten Datensatz aus dem Reultat holen
        $row = $result->fetch_object();

        // Datenbankressourcen wieder freigeben
        $result->close();

        if ($row != null) {
            return $row->username;
        }

    }

    //Return user_id by name
    public function getUserIdByName($username)
    {

        $query = "SELECT id FROM $this->tableName WHERE username = ?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s', $username);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        // Resultat der Abfrage holen
        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Ersten Datensatz aus dem Reultat holen
        $row = $result->fetch_object();

        // Datenbankressourcen wieder freigeben
        $result->close();

        if ($row != null) {
            return $row->id;
        }

    }

}
