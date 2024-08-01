<?php

class Signup extends Database
{

    protected function setUser($username, $password, $email)
    {
        $prepareStmt = $this->connect()->prepare('INSERT INTO users(user_Username, user_Password, user_Email, user_Type) VALUES(?,?,?,?);');

        // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if (!$prepareStmt->execute(array($username, $password, $email, "User"))) {
            $prepareStmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $prepareStmt = null;
    }

    protected function checkUser($username, $email)
    {
        $prepareStmt = $this->connect()->prepare('SELECT user_Username FROM users WHERE user_Username = ? OR user_Email = ?;');

        if (!$prepareStmt->execute(array($username, $email))) {
            $prepareStmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if ($prepareStmt->rowCount() > 0) {
            $results = false;
        } else {
            $results = true;
        }

        return $results;
    }
}
