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
              var id_tabla = 1;

            var d = '';
                d+= 
                 '<tr>'+
                 '<td><center>'+objRes.id_producto+'</center></td>'+
                 '<td><center>'+objRes.descripcion_producto+'</center></td>'+
                 '<td><center>$ '+objRes.costo_unitario+' MXP</center></td>'+
                 '<td><center><a title="Eliminar de la compra" onclick="deleteRow('+id_tabla+')"><img src="./icons/delete_cart.svg" style="width:26px; height:45px;"/></a></center></td>'+
                 '</tr>';
              $("#tabla").append(d);
                id_tabla = id_tabla +1;
            })

      .fail(function()
          {
          alert('Hubo un error')
          })
 //   })
}

function deleteRow(id_tabla)
{
     //var i = id_tabla.parentNode.parentNode.rowIndex;
     document.getElementById("tabla").deleteRow(id_tabla);
     var id_ventas_delete = id_tabla - 1 ;
     arrayVentas = arrayVentas.slice(id_ventas_delete + 1);
     id_tabla = id_tabla -1 ;
     //delete arrayVentas[deletee];


/*     for(var n=1;n<arrayVentas.length;n++)
     {
      console.log(arrayVentas);
     }
*/
}