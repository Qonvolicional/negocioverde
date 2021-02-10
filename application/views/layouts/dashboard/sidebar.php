
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-danger elevation-2">
    <!-- Brand Logo -->
    <a href="<?php echo base_url();?>dashboard" class="brand-link navbar-danger" style="">
      <img src="<?php echo base_url();?>assets/template/img/jch_6.png" alt="Logo JCH" style="width: 100px; height: 100px; margin-right: 10px; border-radius: 10px !important;" class="img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">JCH</span>
    </a> 
    <!-- Sidebar -->
    <div class="sidebar">
      
      
      <!-- Sidebar Menu -->
      <nav class="mt-2 text-sm">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <?php if(!empty($modulos)):?>
            <?php foreach($modulos as $modulo):?>
              <?php if(!empty($modulo['hijos'])):?>
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon <?php echo $modulo['icon']; ?>"></i>
                    <p><?php echo $modulo['nombre'];?></p>
                    <i class="right fas fa-angle-left"></i>
                  </a>
                  <ul class="nav nav-treeview">
                    <?php foreach($modulo['hijos'] as $hijo):?>
                      <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?><?php echo $hijo['controlador'];?>"><i class="nav-icon <?php echo $hijo['icon'];?>"></i> <span><?php echo $hijo['nombre'];?></span></a></li>
                    <?php endforeach; ?>
                  </ul>
                </li>
              <?php else: ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url().$modulo['controlador'];?>"><i class="<?php echo $modulo['icon']; ?> nav-icon"></i><p><?php echo $modulo['nombre']; ?></p></a>
                </li>
              <?php endif;?>
            <?php endforeach;?>
          <?php endif;?>

          
          <?php if($admin):?>
          <?php if($_SESSION['super']):?>
          <li class="nav-header">Administración</li>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>rol"><i class="nav-icon fa fa-book"></i> <p>Roles</p></a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>modulo"><i class="nav-icon fa fa-book"></i> <p>Modulos</p></a></li> 
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>permiso"><i class="nav-icon fa fa-book"></i> <p>Permisos</p></a></li>
            <?php endif; ?>
          <?php endif;?>
          <li class="nav-header">Usuario</li>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>perfil"><i class="fas fa-users-cog nav-icon"></i> <p>Perfil</p></a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>auth/logout"><i class="fas fa-sign-out-alt nav-icon"></i> <p>Salir</p></a></li>
          <li class="nav-header"></li>
          <li class="nav-header"></li>
          <li class="nav-header"></li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
