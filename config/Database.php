<?php
class Database
{
    private $host = "localhost";  // Corrige erro de resolução localhost
    private $port = "3306";
    private $db_name = "sistema_escola";
    private $user = "root";
    private $password = "alunolab";  // Senha padrão XAMPP é vazia
    public $conn;

    public function getConnection()
    {
        $this->conn = null;
        try {
            $dsn = "mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name . ";charset=utf8mb4";
            $this->conn = new PDO($dsn, $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro na conexão: " . $e->getMessage());  // Log em vez de echo em produção
            // echo "Erro na conexão: " . $e->getMessage();  // Descomente para debug
        }
        return $this->conn;
    }
}