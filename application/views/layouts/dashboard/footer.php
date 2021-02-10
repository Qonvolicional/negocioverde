  <footer class="main-footer accent-danger">
    <strong>Copyright &copy; 2020. <a href="#">Jóvenes Creadores del Chocó (JCH)</a>.</strong> Todos los derechos reservados.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/template/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assets/template/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/template/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>assets/template/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>assets/template/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url(); ?>assets/template/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>assets/template/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>assets/template/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/template/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url(); ?>assets/template/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/template/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/template/js/adminlte.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/template/select2/js/select2.full.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/template/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/template/fastclick/fastclick.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/template/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- jvectormap  -->
<script src="<?php echo base_url(); ?>assets/template/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- TinyMce -->
<script src="<?php echo base_url(); ?>resources/tinymce/tinymce.min.js"></script>

<?php if(!empty($jquery)): ?>
  <?php 
    if(is_array($jquery)){
      foreach ($jquery as $valor) {
        echo "<script src='".base_url().$valor."'></script>";
      }
    }else{
      echo "<script src='".base_url()."assets/template/js/".$jquery."'></script>";
    }
  ?>
<?php endif; ?>  
<script>
  $(document).ready(function () {

    //$('.sidebar-mini').tree();
    //$.widget.bridge('uibutton', $.ui.button);
    
    if ( $("select#cms_modulo_id").length > 0 ) {
      // hacer algo aquí si el elemento existe
      $('select#cms_modulo_id').select2();
    }
    if ( $("select#cantidad_columna").length > 0 ) {
      // hacer algo aquí si el elemento existe
      $('select#cantidad_columna').select2();
    }
    if ( $("select#cms_tipo_menu_id").length > 0 ) {
      // hacer algo aquí si el elemento existe
      $('select#cms_tipo_menu_id').select2();
    }
    if ( $("select#empresa_mejora").length > 0 ) {
      // hacer algo aquí si el elemento existe
      $('select#empresa_mejora').select2();
    }
    if ( $("select#empresa_id").length > 0 ) {
      // hacer algo aquí si el elemento existe 
      $('select#empresa_id').select2();
    }
    if ( $("select#persona_id").length > 0 ) {
      // hacer algo aquí si el elemento existe
      $('select#persona_id').select2();
    }

    //$('.sidebar-menu').tree();
    
    if ( $("#example1").length > 0 ) {
      // hacer algo aquí si el elemento existe
      $('#example1').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true,
        'language'    : {
          'lengthMenu': "Mostrar _MENU_ registros por página",
          'zeroRecords': "No se encuentran resultados en su busqueda",
          'searchPlaceholder': "Buscar registros",
          'info': "Mostrando registros _START_ al _END_ de un total _TOTAL_ registros",
          'infoEmpty': "No existen registros",
          'infoFiltered': "(filtrado de un total de _MAX_ registros)",
          'search': "Buscar:",
          'paginate': {
            'first': "Primero",
            'last': "Último",
            'next': "Siguiente",
            'previous': "Anterior"
          },
        }
      });
    }
    if ( $("#example2").length > 0 ) {
      // hacer algo aquí si el elemento existe
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true,
        'language'    : {
          'lengthMenu': "Mostrar _MENU_ registros por página",
          'zeroRecords': "No se encuentran resultados en su busqueda",
          'searchPlaceholder': "Buscar registros",
          'info': "Mostrando registros _START_ al _END_ de un total _TOTAL_ registros",
          'infoEmpty': "No existen registros",
          'infoFiltered': "(filtrado de un total de _MAX_ registros)",
          'search': "Buscar:",
          'paginate': {
            'first': "Primero",
            'last': "Último",
            'next': "Siguiente",
            'previous': "Anterior"
          },
        }
      });
    }
    
    /*if($("#example1_wrapper div.row:nth-child(2)").length >0){
       $("#example1_wrapper div.row:nth-child(2)").addClass("table-responsive");
    }*/
    
    
    if ( $("#descripcionContent").length > 0 ) {
      // hacer algo aquí si el elemento existe
      CKEDITOR.replace('descripcionContent', {
        disableAutoInline: true,
        filebrowserUploadUrl: '<?php echo site_url('cms/upload_ckeditor');?>',
        filebrowserBrowseUrl : '<?php echo site_url('cms/browser_ckeditor');?>',
        toolbar: [
          { name: 'clipboard', items: [ 'Undo', 'Redo' ] },
          { name: 'styles', items: [ 'Styles', 'Format' ] },
          { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Strike', '-', 'RemoveFormat' ] },
          { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
          { name: 'links', items: [ 'Link', 'Unlink' ] },
          { name: 'insert', items: [ 'Image', 'EmbedSemantic', 'Table' ] },
          { name: 'tools', items: [ 'Maximize' ] },
          { name: 'editing', items: [ 'Scayt' ] }
        ],
        customConfig: '',
        height: 600,
        contentsCss: [ 'https://cdn.ckeditor.com/4.8.0/standard-all/contents.css', '../assets/template/css/mystyles.css' ],
        bodyClass: 'article-editor',
        format_tags: 'p;h1;h2;h3;pre',
        removeDialogTabs: 'image:advanced;link:advanced',
        stylesSet: [
      
      { name: 'Marker',     element: 'span', attributes: { 'class': 'marker' } },
      { name: 'Cited Work',   element: 'cite' },
      { name: 'Inline Quotation', element: 'q' },
     
      {
        name: 'Special Container',
        element: 'div',
        styles: {
          padding: '5px 10px',
          background: '#eee',
          border: '1px solid #ccc'
        }
      },
      {
        name: 'Compact table',
        element: 'table',
        attributes: {
          cellpadding: '5',
          cellspacing: '0',
          border: '1',
          bordercolor: '#ccc'
        },
        styles: {
          'border-collapse': 'collapse'
        }
      },
      { name: 'Borderless Table',   element: 'table', styles: { 'border-style': 'hidden', 'background-color': '#E6E6FA' } },
      { name: 'Square Bulleted List', element: 'ul',    styles: { 'list-style-type': 'square' } },
     
      // We use this one to style the brownie picture.
      { name: 'Illustration', type: 'widget', widget: 'image', attributes: { 'class': 'image-illustration' } },
      // Media embed
      { name: '240p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-240p' } },
      { name: '360p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-360p' } },
      { name: '480p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-480p' } },
      { name: '720p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-720p' } },
      { name: '1080p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-1080p' } }
    ]
       
      });
    }

    
  });
</script>
</body>
</html>