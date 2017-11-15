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
  //  $('#lector').on('keyup', function()
  //  {

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
            $('#result').html('')

              document.getElementById('lector').value=""; 
              var objRes = JSON.parse(resultado);
              total = (parseInt(total)+parseInt(objRes.costo_unitario));
              document.getElementById("total_venta").value = total;
           arrayVentas.push(objRes);
          console.log(arrayVentas);
           /* var  i, x = "";
            for (i in objRes.descripcion_producto) 
               {
                  x += objRes.descripcion_producto[i];

                } 
                console.log(x);*/


             /*var addJson = {
                            id_producto: objRes.id_producto,
                            descripcion_producto: objRes.descripcion_producto,
                           };
*/
  
            var d = '';
                d+= 
                 '<tr>'+
                 '<td>'+objRes.id_producto+'</td>'+
                 '<td>'+objRes.descripcion_producto+'</td>'+
                 '<td>$ '+objRes.costo_unitario+' MXP</td>'+
                 '</tr>';
   
              $("#tabla").append(d);

            })

      .fail(function()
          {
          alert('Hubo un error')
          })
 //   })
}