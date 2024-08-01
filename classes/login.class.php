<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
require_once 'database.class.php';

class Login extends Database
{

    protected function getUser($username, $password)
    {
        $prepareStmt = $this->connect()->prepare('SELECT user_Password FROM users WHERE user_Username = ? OR user_Email = ?;');

        if (!$prepareStmt->execute(array($username, $password))) {
            $prepareStmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if ($prepareStmt->rowCount() == 0) {
            $prepareStmt = null;
            header("location: ../login.php?error=usernotfound");
            exit();
        }

        $passwordFromDB = $prepareStmt->fetchAll(PDO::FETCH_ASSOC);
        // $checkPassword = password_verify($password, $passwordFromDB[0]["user_Password"]);

        if ($passwordFromDB[0]["user_Password"] != $password) {
            $prepareStmt = null;
            header("location: ../login.php?error=wrongpassword&username=" . $username);
            exit();
        } elseif ($passwordFromDB[0]["user_Password"] == $password) {
           
            $prepareStmt = $this->connect()->prepare('SELECT * FROM users WHERE user_Username = ? OR user_Email = ? AND user_Password = ?;');

            if (!$prepareStmt->execute(array($username, $username, $password))) {
                $prepareStmt = null;
                header("location: ../login.php?error=stmtfailed");
                exit();
            }

            if ($prepareStmt->rowCount() == 0) {
                $prepareStmt = null;
                header("location: ../login.php?error=usernotfound");
                exit();
            }

            $user = $prepareStmt->fetchAll(PDO::FETCH_ASSOC);

            $_SESSION['id'] = $user[0]["id"];
            $_SESSION['username'] = $user[0]["user_Username"];
            $_SESSION['userType'] = $user[0]['user_Type'];
            $_SESSION['userEmail'] = $user[0]['user_Email'];

            $prepareStmt = null;
        }

        $prepareStmt = null;
    }

}




