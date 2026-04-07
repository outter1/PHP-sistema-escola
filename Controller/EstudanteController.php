<?php
require_once './Model/Estudante.php';
require_once './config/Database.php';

class EstudanteController
{
    private $db;
    private $estudante;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();

        // Verifica conexão antes de instanciar model
        if ($this->db) {
            $this->estudante = new Estudante($this->db);
        } else {
            die("Erro: Falha na conexão com o banco de dados.");
        }
    }

    public function index()
    {
        $alunos = $this->estudante->buscarTodos() ?: [];  // Array vazio se falhar

        require_once './View/lista.php';
    }

    public function salvar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dados = [
                'nome' => htmlspecialchars(trim($_POST['nome'] ?? ''), ENT_QUOTES, 'UTF-8'),
                'email' => htmlspecialchars(trim($_POST['email'] ?? ''), ENT_QUOTES, 'UTF-8'),
                'matricula' => htmlspecialchars(trim($_POST['matricula'] ?? ''), ENT_QUOTES, 'UTF-8')
            ];

            if (empty($dados['nome']) || empty($dados['email']) || empty($dados['matricula'])) {
                header("Location: index.php?status=erro&msg=Preencha todos os campos!");
                exit;
            }

            if ($this->estudante->salvar($dados)) {
                header("Location: index.php?status=sucesso");
            } else {
                header("Location: index.php?status=erro&msg=Erro ao salvar!");
            }
            exit;
        }
        header("Location: index.php");
        exit;
    }

    public function criar()
    {
        require_once './View/cadastro.php';
    }
}