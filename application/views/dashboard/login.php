<!DOCTYPE html>
<html lang="en">
<head><meta charset="gb18030">
  
  <title>Inicio de Sesión</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php echo base_url(); ?>assets/template/img/jch_6.png" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/materialize.min.css" media="screen,projection">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/estilo.css">
  <!-- <link href="https://fonts.googleapis.com/css?family=Merriweather:700i" rel="stylesheet"> -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans:700|Londrina+Outline|Sniglet|Barlow" rel="stylesheet"> -->
 
</head>

<body style="background-color: black; font-family: 'Open Sans'">
  <div id="login-page" class="row lg">
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form" id="login" method="post" action="<?php echo base_url(); ?>auth/login">
        <div class="row">
          <div class="input-field col s12 center">
            <img src="<?php echo base_url(); ?>assets/template/img/jch_2.png" alt="" class="circle responsive-img valign profile-image-login" width="60" height="60"> 
           <!--  <p class="center login-form-text " style="font-family: 'Alegreya Sans', sans-serif;font-size: 18px;">Ventanilla de Emprendimientos Verdes</p> -->

            <p class="center login-form-text " sans-serif; style="font-size: 18px;">(Administrativos)</p>
            <?php if($this->session->flashdata("error")):?>
              <div class="alert"><?php echo $this->session->flashdata("error"); ?> </div>
            <?php endif; ?>
          </div>
        </div> 
        <div class="row margin" style="border-top: 1px solid #e0e0e0">
          <div class="input-field col s12 m2 l2">
            <i class="material-icons">person</i>
          </div>
          <div class="input-field col s12 m10 l10">
            <input name="username" id="username" type="text" autofocus>
            <label for="username" class="center-align">Usuario</label>
          </div>
        </div>
        <div class="row margin">
           <div class="input-field col s12 m2 l2">
            <i class="material-icons">lock</i>
          </div>
          <div class="input-field col s12 m10 l10">
            <input name="password" id="password" type="password">
            <label for="password">Contraseña</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button type="submit" id="btn_login" class="btn waves-effect waves-light col s12 " style="background-color: rgb(223, 40, 36);">Iniciar sesión</button>
          </div>
        </div>
      </form>
    </div>
  </div>

</body>

<script src="<?php echo base_url(); ?>assets/template/js/jquery.min.js"  type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/template/js/materialize.min.js"  type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/template/js/sweetalert.js"></script>

<!--<script type="text/javascript" src="../js/access.js"></script>-->

<script type="text/javascript">
   $(document).ready(function(){
    $('.carousel.carousel-slider').carousel({fullWidth: true});
    $('.carousel.carousel-slider').carousel({duration:50});
      $('.carousel.carousel-slider').carousel('next');
      $(".button-collapse").sideNav();
      $('select').material_select();
      $('.parallax').parallax();
      $('.slider').slider({height:700});
   
      }); 
</script>