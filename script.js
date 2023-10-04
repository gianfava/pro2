$(document).ready(function() {
    $('#patientForm').submit(function(event) {
      event.preventDefault();
  
      const name = $('#name').val();
      const age = $('#age').val();
      const address = $('#address').val();
  
      $.ajax({
        type: 'POST',
        url: 'insert_patient.php',
        data: {
          name: name,
          age: age,
          address: address
        },
        success: function(response) {
          $('#message').html('<div class="alert alert-success alert-dismissible fade show" role="alert">Paciente cadastrado... com sucesso.   <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>');
          $('#patientForm')[0].reset();  // Limpa o formulário
  
          // Esconder a mensagem após 2 segundos
          setTimeout(function() {
            $('#message').empty(); // Remove o conteúdo da mensagem
          }, 2000);
        },
        error: function(error) {
          console.error('Erro:', error);
        }
      });
    });
  });
  