  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="image" >
          <img style="margin: 0 auto;"src="<?php echo base_url(); ?>assets/template/img/logo1.png" class="img-circle" alt="User Image">
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU PRINCIPAL</li>
        <?php if(!empty($modulos)):?>
          <?php foreach($modulos as $modulo):?>
            <?php if($modulo->id==2): ?>
              <?php $adminContenido = true; ?>
            <?php else: ?>  
              <li>
                <a href="<?php echo base_url().$modulo->controlador;?>"><i class="<?php echo $modulo->icon; ?>"></i><span><?php echo $modulo->nombre; ?></span></a>
              </li>
            <?php endif; ?>
          <?php endforeach;?>
        <?php endif;?>
        <?php if(isset($adminContenido)): ?>
          <li class="header">Gestor de Contenido CMS</li>
          <li><a href="<?php echo base_url(); ?>cms/contenido"><i class="fa fa-book"></i> <span>Contenidos</span></a></li>
          <li><a href="<?php echo base_url(); ?>cms_publicaciones"><i class="fa fa-bullhorn"></i> <span>Publicaciones</span></a></li>
          <!--<li><a href="<?php echo base_url(); ?>cms/convocatorias"><i class="fa fa-bullhorn"></i> <span>Convocatorias</span></a></li>
          <li><a href="<?php echo base_url(); ?>cms/eventos"><i class="fa fa-calendar"></i> <span>Eventos</span></a></li>-->
          <li><a href="<?php echo base_url(); ?>cms_sliders"><i class="fa fa-camera"></i> <span>Sliders</span></a></li>
          <li><a href="<?php echo base_url(); ?>cms/menu"><i class="fa fa-bars"></i> <span>Menus</span></a></li>
          <li><a href="<?php echo base_url(); ?>cms_galerias"><i class="fa fa-camera-retro"></i> <span>Galeria</span></a></li>
          <li><a href="<?php echo base_url(); ?>cms/documentos"><i class="fa fa-file-text"></i> <span>Documentos</span></a></li>
          <li><a href="<?php echo base_url(); ?>cms_patrocinadores"><i class="fa fa-handshake-o"></i> <span>Patrocinadores</span></a></li>    
          <li><a href="<?php echo base_url(); ?>cms/equipo"><i class="fa fa-users"></i> <span>Equipo</span></a></li>
          <li><a href="<?php echo base_url(); ?>cms_fondos"><i class="fa fa-money"></i> <span>Fondos de Inversión</span></a></li>
          <li><a href="<?php echo base_url(); ?>cms/configuracion"><i class="fa fa-cogs"></i> <span>Configuración Inicial</span></a></li>
          <li><a href="<?php echo base_url(); ?>cms/informacion"><i class="fa fa-info-circle"></i> <span>Info. de Atención</span></a></li>
        <?php endif;?>
        <!-- <li>
          <a href="<?php echo base_url(); ?>dashboard">
            <i class="fa fa-dashboard"></i> <span>Control estadístico</span>
          </a>
        </li>
        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Gestor de contenido</span></a></li>
        <li><a href="<?php echo base_url(); ?>verificador"><i class="fa fa-book"></i> <span>Administrar Verificador</span></a></li>
        <li><a href="<?php echo base_url(); ?>negocioVerde"><i class="fa fa-book"></i> <span>Negocios Verdes</span></a></li>
        <li><a href="<?php echo base_url(); ?>reportes/"><i class="fa fa-book"></i> <span>Reportes</span></a></li> -->
        <?php 

        ?>
        <?php if($admin):?>
          <li class="header">Básicos</li>
          <li><a href="<?php echo base_url(); ?>entidad"><i class="fa fa-building"></i> <span>Entidades</span></a></li>
          <li><a href="<?php echo base_url(); ?>area"><i class="fa fa-cubes"></i> <span>Áreas</span></a></li>
          <li><a href="<?php echo base_url(); ?>cargo"><i class="fa fa-gavel"></i> <span>Cargos</span></a></li>
          <li class="header">Administración</li>
          <li><a href="<?php echo base_url(); ?>usuario"><i class="fa fa-user-plus"></i> <span>Usuarios</span></a></li>
          <?php if($_SESSION['rol']==9):?>
          <li><a href="<?php echo base_url(); ?>rol"><i class="fa fa-sort-amount-asc"></i> <span>Roles</span></a></li>
          <li><a href="<?php echo base_url(); ?>modulo"><i class="fa fa-tasks"></i> <span>Modulos</span></a></li> <?php endif; ?>
          <li><a href="<?php echo base_url(); ?>permiso"><i class="fa fa-unlock-alt"></i> <span>Permisos</span></a></li>
       
        <?php endif;?>
        <li class="header">Usuario</li>
        <li><a href="<?php echo base_url();?>dashboard/perfil"><i class="fa fa-user"></i> <span>Perfil</span></a></li>
        <li><a href="<?php echo base_url(); ?>auth/logout"><i class="fa fa-home"></i> <span>Salir</span></a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->