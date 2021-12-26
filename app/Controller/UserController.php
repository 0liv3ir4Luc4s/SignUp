<?php
    namespace App\Controller;

    class UserController
    {
        public function insert($user)
        {
            try {
                $result = false;
                $con = new Connection("app/Controller/config.ini");
                $stmt = $con->getPDO()->prepare("INSERT INTO user VALUES (:n, :e, :p);");
                $name = $user->getName();
                $email = $user->getEmail();
                $password = $user->getPassword();
                $stmt->bindParam("n", $name);
                $stmt->bindParam("e", $email);
                $stmt->bindParam("p", $password);
                $result = $stmt->execute();
            } catch (\PDOException $e) {
                \App\Utils\ExceptionHandler::handler($e);
            } finally {
                $con->closeConnection();
                return $result;
            }
        }
    }