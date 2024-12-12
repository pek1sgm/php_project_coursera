<?php
class DatabaseHandler {
    private $pdo;

    public function __construct($host, $dbname, $username, $password) {
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
        $this->pdo = new PDO($dsn, $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function createItem($table, $data) {
        $columns = implode(", ", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
    }

    public function readItem($table, $id) {
        $sql = "SELECT * FROM $table WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateItem($table, $id, $data) {
        $columns = "";
        foreach ($data as $key => $value) {
            $columns .= "$key = :$key, ";
        }
        $columns = rtrim($columns, ", ");
        $sql = "UPDATE $table SET $columns WHERE id = :id";
        $data['id'] = $id;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
    }

    public function deleteItem($table, $id) {
        $sql = "DELETE FROM $table WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    public function versionItem($table, $id) {
        // Implementiere die Versionierung
    }

    public function baselineItem($table, $id) {
        // Implementiere das Baselining
    }
}
?>