<?php

header('Access-Control-Allow-Origin: *');

header("Access-Control-Allow-Methods: GET, OPTIONS");

 date_default_timezone_set ("America/Bogota");

 setlocale(LC_TIME, 'spanish');

?>

<html lang="es">

  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Jovenes Creadores del Chocó</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php if(!empty($noticia)): ?>

        <meta property="og:type" content="article" />

        <meta property="og:url" content="<?php echo base_url().'noticias/leer/'.$noticia->slug; ?>" />

        <meta property="og:image" content="<?php echo base_url(); ?>assets/template/img/jch_6.png" />

    <?php elseif(!empty($evento)): ?>

        <meta property="og:type" content="article" />

        <meta property="og:url" content="<?php echo base_url().'evento/leer/'.$evento->slug; ?>" />

        <meta property="og:image" content="<?php echo base_url(); ?>assets/template/img/jch_6.png" />

    <?php else: ?>

        <meta property="og:type" content="website" />

        <meta property="og:url" content="<?php echo base_url() ?>" />

        <meta property="og:image" content="<?php echo base_url(); ?>assets/template/img/jch_6.png" />

    <?php endif; ?>



     <?php if(!empty($noticia)): ?>

         <meta property="og:title" content="<?php echo $noticia->nombre; ?>" />

    <?php elseif(!empty($evento)): ?>

        <meta property="og:title" content="<?php echo  $evento->nombre; ?>" />

    <?php else: ?>

       <meta property="og:title" content="Jovenes Creadores del Chocó" />

    <?php endif; ?>





 <?php if(!empty($noticia)): ?>

       <meta property="og:description" content="<?php echo $noticia->descripcion; ?>" />

    <?php elseif(!empty($evento)): ?>    

          <meta property="og:description" content="<?php echo "(Evento) - ". $evento->descripcion; ?>" />

    <?php else: ?>

          <meta property="og:description" content="La Corporación Jóvenes Creadores del Chocó, es una organización sin ánimo de lucro, social  y cultural, que desde hace aproximadamente 10 años, se ha propuesto visibilizar, promover, rememorar, fortalecer, incentivar y producir bienes y/o servicios artísticos y culturales que resalten la grandeza de la cultura chocoana a nivel nacional e internacional. Es de su interés hacer de la cultura un verdadero entorno protector, en donde se generen espacios de convivencia pacífica, se potencie el pensamiento crítico, creativo e innovador, la construcción de proyectos de vida y el ejercicio del liderazgo al interior de las comunidades; a través de sus tres áreas de formación artística: teatro, danza tradicional y urbana con más de 300 niños, niñas, adolescentes y jóvenes que en su diario vivir están en la búsqueda de otras alternativas de vida. “Más que piel somos talento" />

    <?php endif; ?>



    <meta name="description" content="La Corporación Jóvenes Creadores del Chocó, es una organización sin ánimo de lucro, social  y cultural, que desde hace aproximadamente 10 años, se ha propuesto visibilizar, promover, rememorar, fortalecer, incentivar y producir bienes y/o servicios artísticos y culturales que resalten la grandeza de la cultura chocoana a nivel nacional e internacional. Es de su interés hacer de la cultura un verdadero entorno protector, en donde se generen espacios de convivencia pacífica, se potencie el pensamiento crítico, creativo e innovador, la construcción de proyectos de vida y el ejercicio del liderazgo al interior de las comunidades; a través de sus tres áreas de formación artística: teatro, danza tradicional y urbana con más de 300 niños, niñas, adolescentes y jóvenes que en su diario vivir están en la búsqueda de otras alternativas de vida. “Más que piel somos talento">

    <meta name="keywords" content="Jovenes Creadores, Quibdó, Chocó, HTML5, Corporación, JCH">

    <meta name="author" content="Qonvolucional SAS">

    <meta name="copyright" content="Jovenes creadores del Chocó" />



    <!--link href="https://fonts.googleapis.com/css?family=Frank+Ruhl+Libre:300,400,500,700,900&display=swap" rel="stylesheet"-->

    

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    



    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/animate.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/lightcase.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/flaticon/flaticon.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/select2.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/swiper.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/slick.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/slick-theme.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/style.css">
    <?php if(isset($data_style)): ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/<?php echo $data_style; ?>"-->
    <?php endif; ?>
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/jvectormap/jquery-jvectormap.css">

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/zkreations/SheetSlider@2.2.0/dist/sheetslider.min.css">

     <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

      <link rel="icon" href="<?php echo base_url(); ?>assets/template/img/jch_2_32.png" sizes="32×32" />



    <style>



     .sh__btns{

        display: flex;

        bottom: 10px;

        left: 0;

        right: 0;

        position: absolute;

        z-index: 10;

        padding-left: 4em;

        padding-right: 4em;

        align-content: flex-start !important;

        justify-content: center !important;

     }


    .sh__content {
        height: 90% !important;
    }
     .sheetSlider input:nth-child(3):checked ~ .sh__btns label:nth-child(3), .sheetSlider input:nth-child(2):checked ~ .sh__btns label:nth-child(2), .sheetSlider input:nth-child(1):checked ~ .sh__btns label:nth-child(1),.sheetSlider input:nth-child(4):checked ~ .sh__btns label:nth-child(4), .sheetSlider input:nth-child(5):checked ~ .sh__btns label:nth-child(5), .sheetSlider input:nth-child(6):checked ~ .sh__btns label:nth-child(6) {

        background: rgba(243,40,36, 1) !important;

        }

    #foto-perfil {
        position: relative;
    }
    #foto-perfil:before {
        display: block;
        height: 210px;
        width: 210px;
        content: "";
        background: transparent;
        left: -12px;
        top: -9px;
        border-top: 4px solid white;
      border-right: 7px solid white;
       border-bottom: 4px solid white;
        border-left: 7px solid white; 
        border-radius: 100%;
        position: absolute;
        box-sizing: border-box;
    }

     /*.sh__btns label:before{

            display: block;

            border:2px solid white;

            position: absolute;

            left: 10px;

            top:10px;

            width: 10px;

            height: 10px;

            content: "";

            border-radius: 100%;

     }*/

     .sh__btns label {

            background: transparent;

            border:2px solid white;

            display: inline-block !important;

            position: relative;

            border-radius: 100%;

            height: 20px !important;

            width: 20px !important;

            margin: 10px;

            cursor: pointer ;

            margin: 0 .2em;

            flex: 0 0 auto !important;

            transition: background .5s

     }

    .slider-section {

        position: relative;

        height: 45%;

    }

    .sh__item {

        height: 95% !important;

    }

    .header-section{

       background: rgba(255,255,255,0.7);

        background: -o-linear-gradient(211deg, rgba(255,255,255,0.7) 80%, rgba(6,6,6,0) 70%);

        background: linear-gradient(211deg, rgba(255,255,255,0.7) 80%, rgba(6,6,6,0) 70%);

        color: white;

        position: absolute;

        top:0;

        left: 0;

        width: 100%;

    }

    .post-tumb a:hover {

        color:rgba(233,40,36,1);

    }

    .contraste {

      background: rgb(233,0,0);

background: -webkit-gradient(linear, left right, right top, color-stop(25%, rgba(233,40,36,0.8)), color-stop(50%, rgba(6,6,6,0.2)));

background: -o-linear-gradient(left bottom, rgba(233,40,36,0.8) 25%, rgba(6,6,6,0.2) 55%);

background: linear-gradient(45deg, rgba(233,40,36,0.8) 25%, rgba(6,6,6,0.2) 50%);

       height: 100%;

       position: absolute;

       left: 0;

       top: 0;

       width: 100%;



    }

    .header-bottom {

        max-height: 100px;

    }







    .text-f p {

    color: white !important;

}

    

    #back-blur{

        position: absolute;

        width: 100%;

        height: 100%;

        left: 0;

        top: 0;

        -webkit-filter: blur(5px);

      -moz-filter: blur(5px);

      -o-filter: blur(5px);

      -ms-filter: blur(5px);

      filter: blur(5px);

    }

     .style-curve-top{

        height: 100%;

        position: absolute;

        bottom: 0;

        left: 0;

        width: 100%;



    }

    .style-curve-top-short{

        height: 50%;

        position: absolute;

        top: 0;

        left: 0;

        width: 100%;



    }

    .style-curve{

        height: 80px;

        position: absolute;

        bottom: 0px;

        left: 0;

        width: 100%;



    }

    .style-curve svg, .style-curve-top svg, .style-curve-top-short svg{

        width: 100%;

        height: 100%;

    }

    .back-portada{

        background: white;

         position: absolute;

        width: 100%;

        height: 95%;

        left: 0;

        top: 0;

        -webkit-filter: blur(5px);

      -moz-filter: blur(5px);

      -o-filter: blur(5px);

      -ms-filter: blur(5px);

      filter: blur(5px);

      opacity: 0.7;

    }

    body {

        font-family: 'Open Sans','Comfortaa', "Roboto", sans-serif, cursive !important;

    }







        .progress{

    width: 150px;

    height: 150px;

    line-height: 150px;

    background: none;

    margin: 0 auto;

    box-shadow: none;

    position: relative;

}

.progress:after{

    content: "";

    width: 100%;

    height: 100%;

    border-radius: 50%;

    border: 12px solid #fff;

    position: absolute;

    top: 0;

    left: 0;

}

.progress > span{

    width: 50%;

    height: 100%;

    overflow: hidden;

    position: absolute;

    top: 0;

    z-index: 1;

}

.progress .progress-left{

    left: 0;

}


.progress .progress-bar{

    width: 100%;

    height: 100%;

    background: none;

    border-width: 12px;

    border-style: solid;

    position: absolute;

    top: 0;

}

.progress .progress-left .progress-bar{

    left: 100%;

    border-top-right-radius: 80px;

    border-bottom-right-radius: 80px;

    border-left: 0;

    -webkit-transform-origin: center left;

    transform-origin: center left;

}

.progress .progress-right{

    right: 0;

}

.progress .progress-right .progress-bar{

    left: -100%;

    border-top-left-radius: 80px;

    border-bottom-left-radius: 80px;

    border-right: 0;

    -webkit-transform-origin: center right;

    transform-origin: center right;

    animation: loading-1 1.8s linear forwards;

}

.progress .progress-value{

    width: 90%;

    height: 90%;

    border-radius: 50%;

    background: #44484b;

    font-size: 24px;

    color: #fff;

    line-height: 135px;

    text-align: center;

    position: absolute;

    top: 5%;

    left: 5%;

}

.progress.blue .progress-bar{

    border-color: #049dff;

}

.progress.blue .progress-left .progress-bar{

    animation: loading-2 1.5s linear forwards 1.8s;

}

.progress.yellow .progress-bar{

    border-color: #fdba04;

}

.progress.yellow .progress-left .progress-bar{

    animation: loading-3 1s linear forwards 1.8s;

}

.progress.pink .progress-bar{

    border-color: #ed687c;

}

.progress.pink .progress-left .progress-bar{

    animation: loading-4 0.4s linear forwards 1.8s;

}

.progress.green .progress-bar{

    border-color: #1abc9c;

}

.progress.green .progress-left .progress-bar{

    animation: loading-5 1.2s linear forwards 1.8s;

}

@keyframes loading-1{

    0%{

        -webkit-transform: rotate(0deg);

        transform: rotate(0deg);

    }

    100%{

        -webkit-transform: rotate(180deg);

        transform: rotate(180deg);

    }

}

@keyframes loading-2{

    0%{

        -webkit-transform: rotate(0deg);

        transform: rotate(0deg);

    }

    100%{

        -webkit-transform: rotate(144deg);

        transform: rotate(144deg);

    }

}

@keyframes loading-3{

    0%{

        -webkit-transform: rotate(0deg);

        transform: rotate(0deg);

    }

    100%{

        -webkit-transform: rotate(90deg);

        transform: rotate(90deg);

    }

}

@keyframes loading-4{

    0%{

        -webkit-transform: rotate(0deg);

        transform: rotate(0deg);

    }

    100%{

        -webkit-transform: rotate(36deg);

        transform: rotate(36deg);

    }

}

@keyframes loading-5{

    0%{

        -webkit-transform: rotate(0deg);

        transform: rotate(0deg);

    }

    100%{

        -webkit-transform: rotate(126deg);

        transform: rotate(126deg);

    }

}

@media only screen and (max-width: 990px){

    .progress{ margin-bottom: 20px; }

}





.btn-whatsapp {

       display:block;

       width:70px;

       height:70px;

       color:#fff;

       position: fixed;

       right:20px;

       bottom:20px;

       border-radius:50%;

       line-height:80px;

       text-align:center;

       z-index:999;

}











/* FontAwesome for working BootSnippet :> */





#team {

    background: #eee !important;

}



.btn-primary:hover,

.btn-primary:focus {

    background-color: #108d6f;

    border-color: #108d6f;

    box-shadow: none;

    outline: none;

}



.btn-primary {

    color: #fff;

    background-color: #007b5e;

    border-color: #007b5e;

}







section .section-title {

    text-align: center;

    color: #007b5e;

    margin-bottom: 50px;

    text-transform: uppercase;

}



#team .card {

    border: none;

    background: #ffffff;

}

/*

.image-flip:hover .backside,

.image-flip.hover .backside {

    -webkit-transform: rotateY(0deg);

    -moz-transform: rotateY(0deg);

    -o-transform: rotateY(0deg);

    -ms-transform: rotateY(0deg);

    transform: rotateY(0deg);

    border-radius: .25rem;

}



.image-flip:hover .frontside,

.image-flip.hover .frontside {

    -webkit-transform: rotateY(180deg);

    -moz-transform: rotateY(180deg);

    -o-transform: rotateY(180deg);

    transform: rotateY(180deg);

} */



.mainflip {

    -webkit-transition: 1s;

    -webkit-transform-style: preserve-3d;

    -ms-transition: 1s;

    -moz-transition: 1s;

    -moz-transform: perspective(1000px);

    -moz-transform-style: preserve-3d;

    -ms-transform-style: preserve-3d;

    transition: 1s;

    transform-style: preserve-3d;

    position: relative;

}



.frontside {

    position: relative;

    -webkit-transform: rotateY(0deg);

    -ms-transform: rotateY(0deg);

    z-index: 2;

    margin-bottom: 30px;

}



.backside {

    position: absolute;

    top: 0;

    left: 0;

    background: white;

    -webkit-transform: rotateY(-180deg);

    -moz-transform: rotateY(-180deg);

    -o-transform: rotateY(-180deg);

    -ms-transform: rotateY(-180deg);

    transform: rotateY(-180deg);

    -webkit-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);

    -moz-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);

    box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);

}



.frontside,

.backside {

    -webkit-backface-visibility: hidden;

    -moz-backface-visibility: hidden;

    -ms-backface-visibility: hidden;

    backface-visibility: hidden;

    -webkit-transition: 1s;

    -webkit-transform-style: preserve-3d;

    -moz-transition: 1s;

    -moz-transform-style: preserve-3d;

    -o-transition: 1s;

    -o-transform-style: preserve-3d;

    -ms-transition: 1s;

    -ms-transform-style: preserve-3d;

    transition: 1s;

    transform-style: preserve-3d;

}



.frontside .card,

.backside .card {

    min-height: 312px;

}



.backside .card a {

    font-size: 18px;

    color: #007b5e !important;

}



.frontside .card .card-title,

.backside .card .card-title {

    color: #007b5e !important;

}



.frontside .card .card-body img {

    width: 120px;

    height: 120px;

    border-radius: 50%;

}





.btn-streaming {

        display:block;

        width:70px;

        height:70px;

        color#fff;

        position: fixed;

        right:20px;

        bottom:20px;

        border-radius:50%;

        line-height:80px;

        text-align:center;

        z-index:999;

        margin-right:90%;

}





.sheetSlider {

    position: relative;

    height: 100%;

    background-color: #121214 !important;

    font-size: 8px !important;

    line-height: 1.5 !important;

    position: relative !important;

    width: 100% !important;

    padding-bottom: 35.857143% !important;

    overflow: hidden !important;

    -webkit-font-smoothing: antialiased !important;

}



#counter > span {

    background: #7a7a7a;

    border: 1px solid black;

    webkit-box-shadow: inset -1px -5px 56px 11px rgba(0,0,0,0.75);

-moz-box-shadow: inset -1px -5px 56px 11px rgba(0,0,0,0.75);

box-shadow: inset -1px -5px 56px 11px rgba(0,0,0,0.75);

    color: white !important;

    display: inline-block;

    font-size: 1rem;

    margin: 0.5px;

    width: 25px;

}



#shareholder {

    display: -webkit-box;

    display: flex;

    -webkit-box-orient: horizontal;

    -webkit-box-direction: normal;

            flex-direction: row;

    flex-wrap: wrap;

    -webkit-box-pack: center;

            justify-content: center;

    -webkit-box-align: center;

            align-items: center;

            padding: 16px;

            box-sizing: border-box;

            min-height::  200px;

            box-sizing: border-box;

}

        #shareholder > div:last-child  > a > img {

        height: auto;

        width:  170px;



    }

     #shareholder > div:last-child{

        position: relative;

     }



    #shareholder > div {

        margin: 15px;

    }

	#shareholder > div:nth-child(2){

        display: -webkit-box;

        display: flex;

        -webkit-box-orient: vertical;

        -webkit-box-direction: normal;

                flex-direction: column;

          flex-wrap: wrap;

    -webkit-box-pack: center;

            justify-content: center;

    -webkit-box-align: center;

            align-items: center;



    }



    #shareholder > div:nth-child(2) img {

        height: 100%;

        width:  150px;



        flex-grow: 1;

    }

    .footer-gellary {

         display: -webkit-box;

    display: flex;

    -webkit-box-orient: horizontal;

    -webkit-box-direction: normal;

            flex-direction: row;

    flex-wrap: wrap;

    -webkit-box-pack: center;

            justify-content: center;

    -webkit-box-align: center;

            padding: 16px;

            box-sizing: border-box;

            box-sizing: border-box;

    }



    .footer-gellary > li  img {

        margin: 5px;

        height: 70px;

        width: 70px;

        border-radius: 4px;

    }

    .con-1 p{

        color: white !important;

    }

    </style>

  </head>