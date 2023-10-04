<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Pacientes</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h1 class="mb-4">Lista de Pacientes</h1>

    <table class="table table-bordered">
      <thead class="thead-dark">
        <tr>
          <th>Nome</th>
          <th>Idade</th>
          <th>Endereço</th>
          <th>Ação</th> <!-- Nova coluna para o botão "Excluir" -->
        </tr>
      </thead>
      <tbody>
        <?php
        $servername = "localhost";
        $username = "userAdmin";
        $password = "w140885W@";
        $dbname = "doctorlink";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
          die("Conexão falhou: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM pacientes";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["nome"] . "</td>
                    <td>" . $row["idade"] . "</td>
                    <td>" . $row["endereco"] . "</td>
                    <td><a href='delete_patient.php?id=" . $row['id'] . "' class='btn btn-danger'>Excluir</a></td>
                  </tr>";
          }
        } else {
          echo "<tr><td colspan='4'>Nenhum paciente cadastrado</td></tr>";
        }

        $conn->close();
        ?>
      </tbody>
    </table>
  </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
