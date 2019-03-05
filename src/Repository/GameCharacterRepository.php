<?php

namespace App\Repository;

use App\Database\ConnectionHandler;
use Exception;

/**
 * Das CharacterRepository ist zuständig für alle Zugriffe auf die Tabelle "gamecharacter".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class GameCharacterRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'gamecharacter';
    protected $tableBetween = 'user_gamecharacter';
    protected $tableUser = 'user';

    /**
     * Erstellt einen neuen Character mit den gegebenen Werten.
     *
     *
     * @param $name Wert für die Spalte name
     * @param $picture_url Wert für die Spalte picture_url(Bild von der Wiki)
     * @param $weapon Wert für die Spalte weapon
     * @param $description Wert für die Spalte description
     * @param $statement Wert für die Spalte statement
     *
     * @throws Exception falls das Ausführen des Statements fehlschlägt
     */
    public function create($name, $picture_url, $weapon, $description, $cstatement)
    {

        $query = "INSERT INTO $this->tableName (name, picture_url, weapon, description, statement) VALUES (?, ?, ?, ?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('sssss', $name, $picture_url, $weapon, $description, $cstatement);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }

    //Insert the reference user <-> character
    public function addUserCharacterReference($user_id, $gamecharacter_id)
    {
        $query = "INSERT INTO $this->tableBetween (user_id, gamecharacter_id) VALUES (?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ii', $user_id, $gamecharacter_id);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }

    public function getUserByCharId($gamecharacter_id)
    {

        $query = "SELECT * FROM $this->tableUser WHERE id = (SELECT user_id FROM $this->tableBetween WHERE gamecharacter_id = ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $gamecharacter_id);

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
            return $row;
        } else {
            return null;
        }

    }

    public function readAllASC()
    {
        //Sort all characters alphabetically
        $query = "SELECT * FROM {$this->tableName} ORDER BY name ASC";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->execute();

        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Datensätze aus dem Resultat holen und in das Array $rows speichern
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function getUsersAndCharacters($max = 100)
    {
        $query = "SELECT * FROM {$this->tableBetween} LIMIT 0, $max";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->execute();

        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Datensätze aus dem Resultat holen und in das Array $rows speichern
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }

        return $rows;

    }

    //Returns true if user is owner from character
    public function checkIfUserIsOwner($charid, $userid)
    {
        $query = "SELECT user_id FROM {$this->tableBetween} WHERE gamecharacter_id = ?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $charid);
        $statement->execute();

        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Ersten Datensatz aus dem Reultat holen
        $row = $result->fetch_object();

        // Datenbankressourcen wieder freigeben
        $result->close();

        if ($row->user_id == $userid) {
            return true;
        } else {
            return false;
        }
    }

    /*
     * Verändert einen Character mit den gegebenen Werten.
     */

    public function update($name, $picture_url, $weapon, $description, $cstatement, $id)
    {

        $query = "UPDATE $this->tableName SET name = ?, picture_url = ?, weapon = ?, description = ?, statement = ? WHERE id = ?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('sssssi', $name, $picture_url, $weapon, $description, $cstatement, $id);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }
}
