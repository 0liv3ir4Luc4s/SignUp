<?php
    namespace App\Utils;

    class ExceptionHandler
    {
        public const FATAL = 0;
        public const ALREADY_REGISTERED = 1;

        public static function handler($exception)
        {
            session_start();
            if (get_class($exception) == "PDOException") {
                if ($exception->errorInfo()[1] == 1022) {
                    $_SESSION['errors'][] = [self::ALREADY_REGISTERED, $exception->getMessage()];
                }
            } elseif ($exception->getCode() == self::FATAL) {
                $_SESSION['errors'][] = [self::FATAL, $exception->getMessage()];
            }
        }
    }