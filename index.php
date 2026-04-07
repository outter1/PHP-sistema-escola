<?php

require_once './Controller/EstudanteController.php';

$app = new EstudanteController();

$action = $_GET['action'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $app->salvar(); // salvar no banco de daods
} else {

    if ($action === 'novo') {
        require_once './View/cadastro.php'; //mostrar formulario
    } else {
        $app->index(); // listar dados da model
    }
}