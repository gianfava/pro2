<?php
$servername = "localhost";
$username = "userAdmin";
$password = "w140885W@";
$dbname = "doctorlink";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
  $patientId = $_GET['id'];

  $sql = "DELETE FROM pacientes WHERE id='$patientId'";

  if ($conn->query($sql) === TRUE) {
    header('Location: pacientes.php'); // Redireciona de volta para a lista de pacientes
    exit();
  } else {
    echo "Erro ao excluir o paciente: " . $conn->error;
  }
}

$conn->close();
?>
