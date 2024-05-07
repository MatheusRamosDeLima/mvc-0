<?php

class Connection {
    private static PDO $instance;

    private function __construct() {}

    public static function getConnection():PDO {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO(
                    'sqlite:'.__DIR__.'/../Database/database.sqlite',
                    null,
                    null,
                    [ PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ ]
                );
            } catch (\Throwable $e) {
                echo "Erro: $e";
            }
        }
        return self::$instance;
    }
}