<!DOCTYPE html>
<?php
    include_once './Aluno.php';
    include_once './AlunoDAO.php';
    
    $pesquisa = "";
    if(array_key_exists("pesquisa",$_POST)) {
        $pesquisa = $_POST['pesquisa'];
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
        <h2>Pesquisa</h2>
        <br>
        <form name="form" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" value="<?php echo $pesquisa; ?>" name="pesquisa" id="pesquisa" placeholder="Nome, endereço, cidade, estado ou país (ENTER para pesquisar)">
            </div>
        </form>
        <table class="table table-striped">
            <tr>
                <th width="50px">ID</th>
                <th width="300px">Nome</th>
                <th>Endereço</th>
                <th>Turma</th>
            </tr>
            <?php
                $alunos = AlunoDAO::buscar($pesquisa);
                for($i = 0;$i < count($alunos);$i++) {
                    $aluno = split('&&',$alunos[$i]);
                    if(count($aluno) > 2) {
                        echo "<tr>";
                        echo "<td>$aluno[0]";
                        echo "<td>$aluno[1]";
                        echo "<td>$aluno[2]";
                        echo "<td>$aluno[3]";
                    }
                }
            ?>
        </table>
    </body>
</html>
