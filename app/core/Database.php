<?php
// app/core/Database.php

class Database {
    private $host;
    private $dbname;
    private $user;
    private $pass;

    public function __construct() {
        $this->host = 'db';
        $this->dbname = getenv('MYSQL_DATABASE') ?: 'samantha_db';
        $this->user = getenv('MYSQL_USER') ?: 'samantha_user';
        $this->pass = getenv('MYSQL_PASSWORD') ?: 'TuClaveUser456';
    }

    public function connect() {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
        $pdo = null;

        try {
            $pdo = new PDO($dsn, $this->user, $this->pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Error de conexión a la Base de Datos: " . $e->getMessage());
        }
    }
}
