<?php
require_once __DIR__ . '/Koneksi.php';

class Model {
    protected PDO $db;
    protected string $table;
    protected string $primaryKey;

    public function __construct(string $table, string $primaryKey) {
        $koneksi = new Koneksi();
        $this->db = $koneksi->getConnection();
        $this->table = $table;
        $this->primaryKey = $primaryKey;
    }

    public function all(): array {
        return $this->db->query("SELECT * FROM {$this->table}")->fetchAll();
    }

    public function find(int $id): array|false {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE {$this->primaryKey} = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create(array $data): bool {
        $columns = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), "?"));
        $stmt = $this->db->prepare("INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})");
        return $stmt->execute(array_values($data));
    }

    public function update(int $id, array $data): bool {
        $setClause = implode(" = ?, ", array_keys($data)) . " = ?";
        $stmt = $this->db->prepare("UPDATE {$this->table} SET {$setClause} WHERE {$this->primaryKey} = ?");
        $values = array_values($data);
        $values[] = $id;
        return $stmt->execute($values);
    }

    public function delete(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE {$this->primaryKey} = ?");
        return $stmt->execute([$id]);
    }

    public function query(string $sql, array $params = []): array {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }
}