<?php
    namespace App\Controller;

    class Connection
    {
        private $user;
        private $password;
        private $host;
        private $dbname;
        private $driver;
        private $pdo;

        public function __construct($config_file)
        {
            try {
                $configs = parse_ini_file($config_file);
                if (!$configs) {
                    $err = error_get_last();
                    $error = (isset($err) && isset($err['message']) && $err['message'] != '') ? $err['message'] : "Check the file, no errors were found";
                    throw new \Exception("Configuration file was not loaded. {$error}\n");
                }
                $this->user = $configs['user'];
                $this->password = $configs['password'];
                $this->host = $configs['host'];
                $this->dbname = $configs['dbname'];
                $this->driver = $configs['driver'];

                if ($this->driver == "mysql") {
                    $this->pdo = new \PDO("{$this->driver}:host={$this->host};dbname={$this->dbname}", $this->user, $this->password);
                    $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                }
            } catch (\Exception $ex) {
                session_start();
                $_SESSION['errors'][] = [$ex->getMessage(), 0];
            }
        }
        public function getPDO()
        {
            return $this->pdo;
        }
        public function cloneConnection()
        {
            $this->pdo = null;
        }
    }