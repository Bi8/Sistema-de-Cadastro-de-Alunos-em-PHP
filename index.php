<!DOCTYPE html>
<?php
include './Aluno.php';
include './AlunoDAO.php';
include './Historico.php';
include './HistoricoDAO.php';

if (array_key_exists("comando", $_POST)) {
    if ($_POST['comando'] == "cadastrar") {
        $aluno = new Aluno();
        $aluno->setNome($_POST['nome']);
        $aluno->setEndereco($_POST['endereco']);
        $aluno->setTurma($_POST['turma']);
        AlunoDAO::cadastrar($aluno);
    } else
    if ($_POST['comando'] == "alterar") {
        $aluno = new Aluno();
        $aluno->setId($_POST['id']);
        $aluno->setNome($_POST['nome']);
        $aluno->setEndereco($_POST['endereco']);
        $aluno->setTurma($_POST['turma']);
        AlunoDAO::alterar($aluno);
    } else
    if ($_POST['comando'] == "excluir") {
        $aluno = new Aluno();
        $aluno->setId($_POST['id']);
        AlunoDAO::excluir($aluno);
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.css" rel="stylesheet">
        <title>Cadastro de alunos</title>
        <style type="text/css">
            body {
                margin-top: 100px;
                margin-right: 20px;
                margin-left: 20px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Gerenciamento de alunos</a>
                </div>
                <div id="navbar">
                    <ul class="nav navbar-nav navbar-left">
                        <li><a class="active" href="index.php">Início</a></li>
                        <li><a href="cadastrar.php">Cadastrar</a></li>
                        <li><a href="alterar.php">Alterar</a></li>
                        <li><a href="excluir.php">Excluir</a></li>
                        <li><a href="pesquisar.php">Pesquisar</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <h2>Bem vindo ao cadastro de alunos</h2>
        <br>
        <div id="painelHistorico">
            <div id='historico' class='panel panel-default'>
                <div class='panel-heading'>Histórico de eventos</div>
                <table class="table table-responsive">
                    <tr>
                        <th width="200px">Data</th>
                        <th>Descrição</th>
                    </tr>
                    <?PHP
                        $historicos = HistoricoDAO::buscar();
                        for ($i = count($historicos) - 1; $i >= 0; $i--) {
                            $historico = explode("&&", $historicos[$i]);
                            if (count($historico) == 3) {
                                echo "<tr><td>" . $historico[1] . "<td>" . $historico[2] . "</tr>";
                            } else {
                                echo "<tr><td><td>Sem registros para mostrar";
                            }
                        }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>