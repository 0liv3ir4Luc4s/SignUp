<?php
    class User
    {
        private $name;
        private $email;
        private $password;

        public function getName()
        {
            return $this->name;
        }
        public function setNome($nome)
        {
            $this->nome = $nome;
        }
        public function getEmail()
        {
            return $this->email;
        }
        public function setEmail($email)
        {
            $this->email = $email;
        }
        public function getPassword()
        {
            return $this->password;
        }
        public function setPassword($password)
        {
            $this->password = $password;
        }
    }