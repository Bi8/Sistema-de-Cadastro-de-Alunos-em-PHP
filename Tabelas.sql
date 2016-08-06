CREATE TABLE aluno (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    endereco VARCHAR(100),
    turma VARCHAR(100)
);

CREATE TABLE historico (
    id INT AUTO_INCREMENT PRIMARY KEY,
    dataHistorico DATETIME DEFAULT NOW(),
    descricao VARCHAR(100)
);
