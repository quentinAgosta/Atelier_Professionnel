<?php

class Database {
    public static function getConnection() {
        $serverName = "127.0.0.1,1433";
        $database = "AutomateIA";
        $username = "conweb";
        $password = "password";

        $dsn = "sqlsrv:Server=$serverName;Database=$database;TrustServerCertificate=yes;Encrypt=yes";

        return new PDO($dsn, $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }
}