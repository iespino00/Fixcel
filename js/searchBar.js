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
              data: {'lector': search,tarea:'1'},
      
                  beforeSend: function()
                  {
                  $('#result').html('<img src="Images/cargando.gif">')
                  }
            })

      .done(function(resultado)
            {
            $('#result').html('')
            var stockND =resultado;

              if(stockND!=0)
              {
                  document.getElementById('lector').value=""; 
                  var objRes = JSON.parse(resultado);
               
                  
                  var stk_carrito = {};
                    arrayVentas.forEach(function(id) { 
                      var id = id["id_producto"];
                      stk_carrito[id] = stk_carrito[id] ? (stk_carrito[id] + 1) : 1;
                    });
                  var id_consultado = objRes.id_producto;
                  var stk_consultado = stk_carrito[id_consultado];

               

                  if(objRes.stock_disponible<=stk_consultado)
                  { 
 
                    alerta('Ya no hay stock');
                      
                  }else{
                          arrayVentas.push(objRes);
                          contProductos();
                             total_venta = (parseInt(total_venta)+parseInt(objRes.costo_unitario));
                          document.getElementById("total_venta").value = total_venta;
                          
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

                        }
                       
                   
                  }else 
                      {
                        document.getElementById('lector').value=""; 
                        alerta("No hay stock Disponible");
                      }  
                     
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
     contProductos();
}

function pagar()
{ 
  var title ="!! Venta Realizada ¡¡";
  getTime();
  
   /* for(var posicion=0; posicion<arrayVentas.length; posicion++)
     {
      var descripcion = arrayVentas[posicion].descripcion_producto;
      console.log(descripcion);
     }
*/

 /*
  console.log(arrayVentas);
  console.log(total_venta);
  console.log(id_user);
  console.log(fecha_ticket);
  console.log(fecha_venta);
  console.log(hora_venta);
  console.log(status_ticket);
  console.log(cantidad);
*/   
      $.ajax({
              type: 'POST',
              url: 'ws/webService.php',
              data: {tarea:'2',
                     arrayVentas:arrayVentas},
     
                  beforeSend: function()
                  {
                  $('#result').html('<img src="Images/cargando.gif">')
                  }
            })

      .done(function(resultado)
            {
            $('#result').html('')
                var tarea2 =  resultado;
                console.log(tarea2);
            
            })

      .fail(function()
          {
          alert('Hubo un error')
          })
 
  alerta(title);
}


function getTime()
{
  var tiempo = new Date();
  var hora = tiempo.getHours();
  var minutos = tiempo.getMinutes();
  var segundos = tiempo.getSeconds();
  hora_venta = hora+':'+minutos+':'+segundos;
  return hora_venta;
}


function alerta(title)
  {
             swal({
                  title: title,
                  timer: 1000,
                  showConfirmButton: false
               });

      //     setTimeout(next, 1100);
  }

  function next()
  {
    location.href="panel.php";
  }

  function contProductos()
  {
     var n = arrayVentas.length;
     $('#cont').html(n+' Productos enlistados');

     if( n > 0 )
     {
      document.getElementById("registrar").disabled = false;
     }else{
      document.getElementById("registrar").disabled = true;
     }
  }