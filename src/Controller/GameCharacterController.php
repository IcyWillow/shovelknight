<?php

namespace App\Controller;

use App\Component\Toastr;
use App\Repository\GameCharacterRepository;
use App\Repository\LoginRepository;
use App\View\View;

/**
 * Siehe Dokumentation im DefaultController.
 */
class GameCharacterController
{
    public function index()
    {
        //List of all characters
        $gameCharacterRepository = new GameCharacterRepository();
        $view = new View('gameCharacter/index');

        $gameCharacters = $gameCharacterRepository->readAllASC();
        $usersAndCharacters = $gameCharacterRepository->getUsersAndCharacters();
        $namesAndCharacters = array();
        foreach ($usersAndCharacters as &$item) {
            $createdBy = $gameCharacterRepository->getUserByCharId($item->gamecharacter_id);
            $item->username = $createdBy->username;
            $namesAndCharacters[] = $item;
        }
        $view->title = 'Character';
        $view->heading = 'Character';
        $view->gameCharacters = $gameCharacters;
        $view->namesAndCharacters = $namesAndCharacters;

        $view->display();
    }

    public function show()
    {
        //Detailed view about character
        $gameCharacterRepository = new GameCharacterRepository();
        $loginRepository = new LoginRepository();

        $isOwner = $gameCharacterRepository->checkIfUserIsOwner($_GET['id'], $loginRepository->getUserIdByName($_SESSION['userid']));
        $view = new View('gameCharacter/show');
        $view->title = 'Character';
        $view->heading = 'Character';
        $view->createdby = $loginRepository->getUserName($gameCharacterRepository->getUserByCharId($_GET['id']));

        $view->isOwner = $isOwner;
        $view->gameCharacter = $gameCharacterRepository->readById($_GET['id']);
        $view->display();

    }

    public function create()
    {
        //Show form to create new character
        $view = new View('gameCharacter/create');
        $view->title = 'Create character';
        $view->heading = 'Create character';
        $view->display();
    }

    public function doCreate()
    {
        //If user is not authenticated -> die
        if (!isset($_SESSION['userid'])) {
            die();
        }

        $isValid = true;

        if (isset($_POST)) {

            if (!isset($_POST['name'])) {
                $isValid = false;
            } else {
                foreach ($_POST as $key => $value) {
                    if (!isset($value) || trim($value) === '') {
                        $isValid = false;
                    }
                }
            }

        }

        //Else send new data to DB.
        if (isset($_POST) && $isValid) {
            $name = $_POST['name'];
            $picture_url = $_POST['picture_url'];
            $weapon = $_POST['weapon'];
            $description = $_POST['description'];
            $statement = $_POST['cstatement'];

            $gameCharacterRepository = new GameCharacterRepository();
            $loginRepository = new LoginRepository();

            $user_id = $loginRepository->readByName($_SESSION['userid']);

            $gamecharacter_id = $gameCharacterRepository->create($name, $picture_url, $weapon, $description, $statement);
            $gameCharacterRepository->addUserCharacterReference($user_id, $gamecharacter_id);

            $this->index();
            Toastr::flashcard('success', 'New character added', 'The new information has been sent');
        } else {
            
            $view = new View('gameCharacter/create');
            $view->display();
            Toastr::flashcard('error', 'Missing fields', 'Please check the fields');
        }

    }

    public function update()
    {
        //Change character info
        $gameCharacterRepository = new GameCharacterRepository();
        $character = $gameCharacterRepository->readById($_GET['id']);
        $createdBy = $gameCharacterRepository->getUserByCharId($character->id);

        $view = new View('gameCharacter/update');
        $view->title = 'Update character';
        $view->heading = 'Update character';
        $view->gameCharacter = $character;
        $view->createdBy = $createdBy;

        $view->display();
    }

    public function doUpdate()
    {

        //If user is not authenticated -> die
        if (!isset($_SESSION['userid'])) {
            die();
        }

        $gameCharacterRepository = new GameCharacterRepository();
        $loginRepository = new LoginRepository();

        if (isset($_POST)) {

            $isValid = true;

            if (!isset($_POST['name'])) {
                $isValid = false;
            } else {
                foreach ($_POST as $key => $value) {
                    if (!isset($value) || trim($value) === '') {
                        $isValid = false;
                    }
                }
            }

            //Else send new data to DB.
            if ($isValid) {
                $name = $_POST['name'];
                $picture_url = $_POST['picture_url'];
                $weapon = $_POST['weapon'];
                $description = $_POST['description'];
                $statement = $_POST['cstatement'];
                $loginRepository = new LoginRepository();

                $gameCharacterRepository->update($name, $picture_url, $weapon, $description, $statement, $_GET['id']);
                $view = new View('/gameCharacter/show');
                $view->gameCharacter = $gameCharacterRepository->readById($_GET['id']);
                $isOwner = $gameCharacterRepository->checkIfUserIsOwner($_GET['id'], $loginRepository->getUserIdByName($_SESSION['userid']));
                $view->isOwner = $isOwner;

                $view->createdby = $loginRepository->getUserName($gameCharacterRepository->getUserByCharId($_GET['id']));

                $view->display();
                Toastr::flashcard('success', 'Update done', 'The new information has been sent');
            } else {

                $view = new View('/gameCharacter/update');
                $view->gameCharacter = $gameCharacterRepository->readById($_GET['id']);
                $view->display();
                Toastr::flashcard('error', 'Missing fields', 'Please check the fields');
            }

        }

    }

    public function delete()
    {
        //Delete character
        $loginRepository = new LoginRepository();
        $gameCharacterRepository = new GameCharacterRepository();
        $isOwner = $gameCharacterRepository->checkIfUserIsOwner($_GET['id'], $loginRepository->getUserIdByName($_SESSION['userid']));

        //The character can be deleted just by
        if ($isOwner) {
            $gameCharacterRepository->deleteById($_GET['id']);

            $this->index();
            Toastr::flashcard('success', 'Character deleted', 'The data was removed.');
        } else {

            header('Location: /gameCharacter');
        }

    }
}
