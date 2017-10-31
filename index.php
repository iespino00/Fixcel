<?php 
   session_start(); 
  //revismamos si el empleado se encuentra logeado
  error_reporting(E_ERROR | E_WARNING | E_PARSE);
  $_SESSION['id_user'] = "";
  $_SESSION['nickname'] = "";

  require 'controllers/ControllerAuthentication.php';
  $controller_Auth = new ControllerAuthentication();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title> Acceso | FixCel</title>
     
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1, user-scalable=0">
    <link rel="shortcut icon" href="Images/login.png">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login_style.css" rel="stylesheet">
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Nunito');
        @import url('https://fonts.googleapis.com/css?family=Poiret+One');
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
     <!--ALERT -->
  <script src="dist_alert/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="dist_alert/sweetalert.css">
  <!--.......................-->

<script>
 
  function alerta(nick_alert){
      swal({
    title: "Bienvenido!",
    text: nick_alert,
    timer: 1000,
    showConfirmButton: false
  });
      }
</script>
</head>


<body>

  <?php


  if( isset($_POST['submit']) ) 
    {

      $auth = $controller_Auth->login($_POST['nickname'], $_POST['password'] );

        if($auth != null) 
        {
             $_SESSION['nickname'] = $_POST['nickname'];
             $_SESSION['password'] = $_POST['password'];
             $_SESSION['tipo'] = $auth->tipo;
             $_SESSION['tipo'] = $auth->tipo;
             $_SESSION['status'] = $auth->status;
             $nickk = $_POST['nickname'];


         echo '<script>alerta (" .$nickk.");</script>';


            // echo "<script type='text/javascript'>location.href='panel.php';</script>";
        }
        else{
               echo "<script>alert('Usuario o Contraseña no valida.');</script>";
            }

    } 
 ?>
<div class="container">
	<div id="login-box">
		<div class="logo">
			<img src="Images/login.png" class="img img-responsive img-circle center-block"/>
			<h1 class="logo-caption"><span class="tweak">L</span>ogin</h1>
		</div><!-- /.logo -->
		<div class="controls">
        <form class="form" method="POST">
    			<input type="text" id="nickname" name="nickname" placeholder="Nickname" class="form-control"  />
    			<input type="password" name="password" id="password" placeholder="Password" class="form-control" />
    			<button type="submit"  id="sesion" name="submit"  class="btn btn-default btn-block btn-custom">Accesar</button>
        </form>


		</div><!-- /.controls -->
	</div><!-- /#login-box -->
</div><!-- /.container -->
<div id="particles-js"></div>


<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>-->
<script type="text/javascript">
$.getScript("https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js", function(){
    particlesJS('particles-js',
      {
        "particles": {
          "number": {
            "value": 80,
            "density": {
              "enable": true,
              "value_area": 800
            }
          },
          "color": {
            "value": "#ffffff"
          },
          "shape": {
            "type": "circle",
            "stroke": {
              "width": 0,
              "color": "#000000"
            },
            "polygon": {
              "nb_sides": 5
            },
            "image": {
              "width": 100,
              "height": 100
            }
          },
          "opacity": {
            "value": 0.5,
            "random": false,
            "anim": {
              "enable": false,
              "speed": 1,
              "opacity_min": 0.1,
              "sync": false
            }
          },
          "size": {
            "value": 5,
            "random": true,
            "anim": {
              "enable": false,
              "speed": 40,
              "size_min": 0.1,
              "sync": false
            }
          },
          "line_linked": {
            "enable": true,
            "distance": 150,
            "color": "#ffffff",
            "opacity": 0.4,
            "width": 1
          },
          "move": {
            "enable": true,
            "speed": 6,
            "direction": "none",
            "random": false,
            "straight": false,
            "out_mode": "out",
            "attract": {
              "enable": false,
              "rotateX": 600,
              "rotateY": 1200
            }
          }
        },
        "interactivity": {
          "detect_on": "canvas",
          "events": {
            "onhover": {
              "enable": true,
              "mode": "repulse"
            },
            "onclick": {
              "enable": true,
              "mode": "push"
            },
            "resize": true
          },
          "modes": {
            "grab": {
              "distance": 400,
              "line_linked": {
                "opacity": 1
              }
            },
            "bubble": {
              "distance": 400,
              "size": 40,
              "duration": 2,
              "opacity": 8,
              "speed": 3
            },
            "repulse": {
              "distance": 200
            },
            "push": {
              "particles_nb": 4
            },
            "remove": {
              "particles_nb": 2
            }
          }
        },
        "retina_detect": true,
        "config_demo": {
          "hide_card": false,
          "background_color": "#b61924",
          "background_image": "",
          "background_position": "50% 50%",
          "background_repeat": "no-repeat",
          "background_size": "cover"
        }
      }
    );

});


</script>


</body>
</html>
