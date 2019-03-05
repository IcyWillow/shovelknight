<?php

namespace App\Controller;

use App\Component\Toastr;
use App\Repository\LoginRepository;
use App\View\View;

/**
 * Siehe Dokumentation im DefaultController.
 */
class LoginController
{
    public function index()
    {
        //Login form
        if (isset($_SESSION['userid'])) {
            header('Location: /');
        }

        $view = new View('login/signIn');
        $view->title = 'Login';
        $view->heading = 'Login';
        $view->display();
    }

    public function signUp()
    {
        //Registration method
        $loginRepository = new LoginRepository();
        $view = new View('login/signUp');
     

        $users = $loginRepository->readAll();

        if (isset($_POST['name']) && isset($_POST['password'])) {

            $name = $_POST['name'];
            $password = $_POST['password'];
            $isUserInvalid = false;

            foreach ($users as $user) {
                if ($name === $user->username) {
                    Toastr::flashcard('error', 'Username already exists', 'Please select another username');
                    $isUserInvalid = true;
                    break;
                }
            }

            if (!$isUserInvalid) {
                //Check if password is confirmed
                if ($_POST['confirm-password'] !== $password) {

                    Toastr::flashcard('error', 'Password does not match', 'Please Specify a Password');

                    //Check if password has at least 6 characters, one lower/upper case letter and at least one number
                } else if (!preg_match(("^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$^"), $_POST['password'])) {

                    $msgtype = 'error';
                    $msgTitle = "Password isnt strong enough";

                    if (!preg_match(("^\S*(?=\S{6,})\S*$^"), $_POST['password'])) {
                        Toastr::flashcard($msgtype, $msgTitle, "• at least 6 characters are needed.");
                    }

                    if (!preg_match(("^\S*(?=\S*[a-z])\S*$^"), $_POST['password'])) {
                        Toastr::flashcard($msgtype, $msgTitle, "• at least one lower case letter is needed.");
                    }

                    if (!preg_match(("^\S*(?=\S*[A-Z])\S*$^"), $_POST['password'])) {
                        Toastr::flashcard($msgtype, $msgTitle, "• at least one upper case letter is needed.");
                    }

                    if (!preg_match(("^\S*(?=\S*[\d])\S*$^"), $_POST['password'])) {
                        Toastr::flashcard($msgtype, $msgTitle, "• at least one number is needed.");
                    }

                } else {

                    $loginRepository->create($name, $password);
                    $_SESSION['userid'] = $name;
                    $view = new View('/default/index');

                    $msgTitle = 'Registration Successful';
                    $msg = "Welcome " . ucfirst($_SESSION['userid']);
                    
                   
                }
            }
          
        }
        $view->display();
        if(isset($msg)){
            Toastr::flashcard("success", $msgTitle, $msg);
        }
    }

    public function signIn()
    {
        //Login method

        $loginRepository = new LoginRepository();
        $view = new View('/login/signIn');
        $view->title = 'Login';
        $view->heading = 'Login';

        //Prepare variables for toastr notification
        $msgType;
        $msg;
        $msgTitle;

        $name = $_POST['name'];
        $password = $_POST['password'];

        //Get all users
        $users = $loginRepository->readAll();

        //Username redundancy check and check if password is correct.
        foreach ($users as $user) {
            if ($name === $user->username) {
                if (password_verify($password, $user->password)) {
                    $_SESSION['userid'] = $user->username;
                    $msgTitle = 'Login Successful';
                    $msgType = 'success';
                    $msg = "Welcome " . ucfirst($_SESSION['userid']);
                    $view = new View('/default/index');
                    break;
        
                    

                } else {

                    //We know that this info is helpful for hackers, but we were testing all use cases.
                    $view->res = 'Password is incorrect';
                    $msgType = 'error';
                    $msgTitle = 'Please verify your credentials.';
                    $msg = 'Password is incorrect';
                    break;

                }
            } else {
                $view->res = 'No User with this name found';
                $msgType = 'error';
                $msgTitle = 'Please verify your credentials.';
                $msg = 'No User with this name found';

            }
        }

        $view->display();
        Toastr::flashcard($msgType, $msgTitle, $msg);

    }

    public function logout()
    {
        //Logout and destroy section
        unset($_SESSION['userid']);
        unset($_SESSION['login-message']);
        session_destroy();
        header('Location: /login');
    }

}
