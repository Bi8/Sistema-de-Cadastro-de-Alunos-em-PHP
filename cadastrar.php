<!DOCTYPE html>
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
            #formulario {
                margin-left: 20px;
                width: 400px;
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
                <li><a href="index.php">Início</a></li>
                <li><a href="cadastrar.php">Cadastrar</a></li>
                <li><a href="alterar.php">Alterar</a></li>
                <li><a href="excluir.php">Excluir</a></li>
                <li><a href="pesquisar.php">Pesquisar</a></li>
              </ul>
            </div>
          </div>
        </nav>
        <h2>Cadastro</h2>
        <br>
        <div id="formulario">
            <form name="formulario" action="index.php" method="POST">
                <div class="form-group">
                    <label>Nome completo</label>
                    <input type="text" class="form-control" name="nome" placeholder="Nome completo do aluno">
                </div>
                <div class="form-group">
                    <label>Endereço</label>
                    <input type="text" class="form-control" name="endereco" placeholder="Endereço onde mora o aluno">
                </div>
                <div class="form-group">
                    <label>Turma</label>
                    <input type="text" class="form-control" name="turma" placeholder="Turma onde o aluno ira estudar">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <button type="button" class="btn btn-default" onclick="javascript:location.href='index.php'">Cancelar</button>
                <input type="hidden" name="comando" value="cadastrar" />
            </form>
        </div>
    </body>
</html>
