<?php

class Koneksi {
    private $host;
    private $db;
    private $user;
    private $pass;
    private $charset = 'utf8mb4';
    private $pdo;

    public function __construct() {
        $this->host = getenv('DB_HOST');
        $this->db   = getenv('DB_DATABASE');
        $this->user = getenv('DB_USERNAME');
        $this->pass = getenv('DB_PASSWORD');

        $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function getConnection(): PDO {
        return $this->pdo;
    }
}