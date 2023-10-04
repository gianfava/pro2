<?php
$servername = "localhost";
$username = "userAdmin";
$password = "w140885W@";
$dbname = "doctorlink";

// Criar a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}

// Obter os dados do formulário
$name = $_POST['name'];
$age = $_POST['age'];
$address = $_POST['address'];

// Inserir os dados no banco de dados
$sql = "INSERT INTO pacientes (nome, idade, endereco) VALUES ('$name', '$age', '$address')";

if ($conn->query($sql) === TRUE) {
  echo "Paciente cadastrado com sucesso.";
} else {
  echo "Erro ao cadastrar o paciente: " . $conn->error;
}

$conn->close();
?>
