      <!-- ============================================================== -->
      <!-- All Jquery -->
      <!-- ============================================================== -->
      <script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
      <!-- Bootstrap tether Core JavaScript -->
      <script src="<?php echo base_url('assets/plugins/bootstrap/js/popper.min.js') ?>"></script>
      <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js') ?>"></script>
      <!-- slimscrollbar scrollbar JavaScript -->
      <script src="<?php echo base_url('assets/js/jquery.slimscroll.js') ?>"></script>
      <!--Wave Effects -->
      <script src="<?php echo base_url('assets/js/waves.js') ?>"></script>
      <!--Menu sidebar -->
      <script src="<?php echo base_url('assets/js/sidebarmenu.js') ?>"></script>
      <!--stickey kit -->
      <script src="<?php echo base_url('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js') ?>"></script>
      <!--Custom JavaScript -->
      <script src="<?php echo base_url('assets/js/custom.min.js') ?>"></script>

      <?php if (isset($dropify)) { ?>
          <script src="<?php echo base_url('assets/plugins/dropify/dist/js/dropify.min.js') ?>"></script>
          <!-- ============================================================== -->
          <!-- jQuery file upload -->
          <!-- ============================================================== -->
          <!-- Plugins for this page -->
          <!-- ============================================================== -->
          <script type="text/javascript">
              $(document).ready(function() {
                  // Basic
                  $('.dropify').dropify();

                  // Translated
                  $('.dropify-fr').dropify({
                      messages: {
                          default: 'Glissez-déposez un fichier ici ou cliquez',
                          replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                          remove: 'Supprimer',
                          error: 'Désolé, le fichier trop volumineux'
                      }
                  });

                  // Used events
                  var drEvent = $('#input-file-events').dropify();

                  drEvent.on('dropify.beforeClear', function(event, element) {
                      return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                  });

                  drEvent.on('dropify.afterClear', function(event, element) {
                      alert('File deleted');
                  });

                  drEvent.on('dropify.errors', function(event, element) {
                      console.log('Has Errors');
                  });

                  var drDestroy = $('#input-file-to-destroy').dropify();
                  drDestroy = drDestroy.data('dropify')
                  $('#toggleDropify').on('click', function(e) {
                      e.preventDefault();
                      if (drDestroy.isDropified()) {
                          drDestroy.destroy();
                      } else {
                          drDestroy.init();
                      }
                  })
              });
          </script>
      <?php }; ?>



      <!-- ============================================================== -->
      <!-- Style switcher -->
      <!-- ============================================================== -->
      <script src="<?php echo base_url('assets/plugins/styleswitcher/jQuery.style.switcher.js') ?>"></script>
      <!-- footer -->
      <!-- ============================================================== -->
      <footer class="footer">
          Copyright © 2016-2024 <a href="#">Openzn IT Solutions Ltd. Co.</a>
      </footer>
      <!-- ============================================================== -->
      <!-- End footer -->
      <!-- ============================================================== -->
      </body>

      </html>