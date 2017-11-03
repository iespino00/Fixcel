function validaNum(e)
 {
     var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
         
        return /\d/.test(String.fromCharCode(keynum));
}


  function ok_empleado(title)
  {
             swal({
                  title: title,
                  timer: 1900,
                  showConfirmButton: false
               });

           setTimeout(next, 1000);
  }

  function wrong_empleado(title)
  {
             swal({
                  title: title,
                  timer: 1900,
                  showConfirmButton: false
               });

           setTimeout(next, 1500);
  }

  function next()
  {
    location.href="altas_empleados.php";
  }


     function TratarModeDialog($id,$nickname,$nombre,$apellido_paterno,$apellido_materno,$direccion,$telefono,$correo,$password,$status,$tipo)
    {

         var id=$id;
         var nickname=$nickname;
         var nombre=$nombre;   
         var apellido_paterno=$apellido_paterno;   
         var apellido_materno=$apellido_materno;   
         var direccion=$direccion;   
         var telefono=$telefono;   
         var correo=$correo;
         var password=$password;      
         var status=$status; 
         var tipo=$tipo;  
             
       document.getElementById('id_userMD').value = id;   
       document.getElementById('nicknameMD').value = nickname;
       document.getElementById('nombreMD').value = nombre;
       document.getElementById('apellido_paternoMD').value = apellido_paterno;
       document.getElementById('apellido_maternoMD').value = apellido_materno;
       document.getElementById('direccionMD').value = direccion;
       document.getElementById('telefonoMD').value = telefono;
       document.getElementById('correoMD').value = correo;  
       document.getElementById('passwordMD').value = password;  
       document.getElementById('statusMD').value = status; 
       document.getElementById('tipoMD').value = tipo; 
       
    }
