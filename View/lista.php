<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos - Sistema Escolar </title>
</head>

<body>
    <h1>Alunos Matrículados</h1>
    <p><a href="index.php?action=novo"> + Cadastrar Novo Aluno</a></p>
    <table border="1">
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Matrícula</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alunos as $aluno): ?>
                <tr>
                    <td><?= htmlspecialchars($aluno['nome']) ?></td>
                    <td><?= htmlspecialchars($aluno['email']) ?></td>
                    <td><?= htmlspecialchars($aluno['matricula']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

</body>

</html>