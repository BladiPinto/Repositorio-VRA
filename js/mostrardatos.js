$(document).ready(function() {
    // Realizar una solicitud AJAX al servidor para obtener los datos de la tabla
    $.ajax({
      url: 'obtener_datos.php', // Ruta al archivo PHP que obtiene los datos de la base de datos
      method: 'GET',
      dataType: 'json',
      success: function(response) {
        // Procesar los datos y construir las filas de la tabla
        var tbody = $('#tabla_certificados tbody');
        response.forEach(function(row) {
          var tr = $('<tr>');
          tr.append('<td>' + row.titulo + '</td>');
          tr.append('<td>' + row.descripcion + '</td>');
          tr.append('<td>' + row.tipo + '</td>');
          tr.append('<td>' + row.fecha + '</td>');
          tr.append('<td><a href="archivos/' + row.archivo + '" target="_blank">' + row.archivo + '</a></td>');
          tbody.append(tr);
        });
      },
      error: function(xhr, status, error) {
        console.log('Error al obtener los datos de la tabla:', error);
      }
    });
  });
  