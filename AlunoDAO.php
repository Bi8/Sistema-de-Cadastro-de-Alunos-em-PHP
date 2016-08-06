<?php

class AlunoDAO {
    
    private static $URL = "localhost";
    private static $USUARIO = "root";
    private static $SENHA = "root";
    private static $DATABASE = "nfx";
    
    public static function testeConexao() {
        $conexao = mysql_connect(AlunoDAO::$URL,AlunoDAO::$USUARIO,AlunoDAO::$SENHA);
        mysql_close($conexao);
    }
    
    public static function buscar($args) {
		error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
        $conexao = mysql_connect(AlunoDAO::$URL,AlunoDAO::$USUARIO,AlunoDAO::$SENHA);
        mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $query = "SELECT * FROM aluno WHERE nome LIKE('%" . $args . "%') OR endereco LIKE('%" . $args . "%');";
        $resultado = mysql_query($query,$conexao);
        $tudo = "";
        $separador = "";
        while ($linha = mysql_fetch_array($resultado)) {
            $tudo = $tudo . $separador;
            $tudo = $tudo . $linha['id'];
            $tudo = $tudo . "&&";
            $tudo = $tudo . $linha['nome'];
            $tudo = $tudo . "&&";
            $tudo = $tudo . $linha['endereco'];
            $tudo = $tudo . "&&";
            $tudo = $tudo . $linha['turma'];
            $separador = "##";
        }
        mysql_close($conexao);
        return $alunos = split("##",$tudo);
    }
    
    public static function find($id) {
		error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
        $conexao = mysql_connect(AlunoDAO::$URL,AlunoDAO::$USUARIO,AlunoDAO::$SENHA);
        mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $query = "SELECT * FROM aluno WHERE id = $id;";
        $resultado = mysql_query($query,$conexao);
        mysql_close($conexao);
        $aluno = new Aluno();
        while ($linha = mysql_fetch_array($resultado)) {
            $aluno = new Aluno();
            $aluno->setId($id);
            $aluno->setNome($linha['nome']);
            $aluno->setEndereco($linha['endereco']);
            $aluno->setTurma($linha['turma']);
        }
        return $aluno;
    }
    
    public static function cadastrar(Aluno $aluno) {
		error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
        $conexao = mysql_connect(AlunoDAO::$URL,AlunoDAO::$USUARIO,AlunoDAO::$SENHA);
        mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "INSERT INTO aluno (nome, endereco, turma) "
                . "VALUES ('" . $aluno->getNome() . "', '" . $aluno->getEndereco() . "', '" . $aluno->getTurma() . "');";
        mysql_query( $sql, $conexao );
        mysql_close($conexao);
        HistoricoDAO::cadastrar("Novo aluno foi cadastrado");
    }
    
    public static function alterar(Aluno $aluno) {
        $sql = "UPDATE aluno SET ";
        $sql = $sql . "nome='" . $aluno->getNome() . "',";
        $sql = $sql . "endereco='" . $aluno->getEndereco() . "',";
        $sql = $sql . "turma='" . $aluno->getTurma() . "'";
        $sql = $sql . " WHERE id = " . $aluno->getId();
        $conexao = mysql_connect(AlunoDAO::$URL,AlunoDAO::$USUARIO,AlunoDAO::$SENHA);
        mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        mysql_query( $sql, $conexao );
        HistoricoDAO::cadastrar("Alterar aluno com id " . $aluno->getId());
    }
    
    public static function excluir(Aluno $aluno) {
        $conexao = mysqli_connect(AlunoDAO::$URL,AlunoDAO::$USUARIO,AlunoDAO::$SENHA,AlunoDAO::$DATABASE);        
        $sql = "DELETE FROM aluno WHERE id=" . $aluno->getId();
        mysqli_query($conexao, $sql);
        mysqli_close($conexao);
        HistoricoDAO::cadastrar("Excluir aluno com id " . $aluno->getId());
    }
    
}