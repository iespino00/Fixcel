/*$(document).ready(function()
{
  $('#lector').focus()

    $('#lector').on('keyup', function()
    {

      var search = $('#lector').val()
      $.ajax({
              type: 'POST',
              url: 'ws/webService.php',
              data: {'lector': search},
              beforeSend: function()
                  {
                  $('#result').html('<img src="Images/pacman.gif">')
                  }
            })
      .done(function(resultado)
            {
            $('#result').html(resultado)
            })

      .fail(function()
          {
          alert('Hubo un error :(')
          })
    })
})
*/

function getProducto()
{
 
 // $('#lector').focus()
    $('#lector').on('keyup', function()
    {

      var search = $('#lector').val()
      $.ajax({
              type: 'POST',
              url: 'ws/webService.php',
              data: {'lector': search},
      
                  beforeSend: function()
                  {
                  $('#result').html('<img src="Images/cargando.gif">')
                  }
            })

      .done(function(resultado)
            {
            $('#result').html(resultado)
          var Datos = resultado;  
          console.log(Datos);
        //    console.log(resultado);
            })

      .fail(function()
          {
          alert('Hubo un error')
          })
    })
}