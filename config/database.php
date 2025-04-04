<?php
// Credenciais de acesso ao banco de dados
define("DB_HOST","localhost");
define("DB_USER", "root")
define("DB_PASSWORD", "usbw");
define("DB_NAME", "sistema_os");

// Tenta realizar conexão no MYSQL
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

// Retorna um erro caso a conexão falhe
if(!$conn){
    die("Erro de conexão do MYSQL : ".mysqli_connect.error())
}

// Script de criação das tabelas
$sql = "
CREATE TABLE IF NOT EXISTS usuarios(
id INT NOT NULL PRIMARY_KEY AUTO_INCREMENT,
username VARCHAR(50) NOT NULL UNIQUE,
password VARCHAR(32) NOT NULL,
nome VARCHAR(50) NOT NULL,
token VARCHAR(32) NOT NULL
);
CREATE TABLE IF NOT EXISTS ordens(
id INT NOT NULL PRIMARY_KEY AUTO_INCREMENT,
cliente VARCHAR(50) NOT NULL,
equipamento VARCHAR(255) NOT NULL,
defeito TEXT NOT NULL,
status ENUM('Pendente','Em andamento', 'Concluido')DEFAULT 'Pendente',
data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP,
usuario_id INT,
FOREIGN KEY(usuario_id) references(usuarios)
);
";

if(!mysqli_multi_query($conn, $sql)){
    echo "Erro ao criar as tabelas:".mysqli_error($conn);
}

while(mysqli_next_result($conn)){;}
?>