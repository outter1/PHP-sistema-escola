<?php
class Estudante
{
    private $conn;
    private $table = "estudantes";

    public function __construct($db)
    {
        $this->conn = $db;
        if (!$this->conn) {
            throw new Exception("Conexão com banco inválida.");
        }
    }

    // Listar todos (READ)
    public function buscarTodos()
    {
        if (!$this->conn) {
            return false;
        }
        try {
            $query = "SELECT * FROM " . $this->table . " ORDER BY nome ASC";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro buscarTodos: " . $e->getMessage());
            return false;
        }
    }

    // Salvar novo (CREATE)
    public function salvar($dados)
    {
        if (!$this->conn || !isset($dados['nome'], $dados['email'], $dados['matricula'])) {
            return false;
        }
        try {
            $query = "INSERT INTO " . $this->table . " (nome, email, matricula) VALUES (:nome, :email, :matricula)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':nome', $dados['nome']);
            $stmt->bindParam(':email', $dados['email']);
            $stmt->bindParam(':matricula', $dados['matricula']);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Erro salvar: " . $e->getMessage());
            return false;
        } 
        /*Comentário teste*/
    }
}