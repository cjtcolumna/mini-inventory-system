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
      <!-- ============================================================== -->
      <!-- jQuery file upload -->
      <!-- ============================================================== -->

      <?php if (isset($dropify)) { ?>
          <script src="<?php echo base_url('assets/plugins/dropify/dist/js/dropify.min.js') ?>"></script>
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

      <?php if (isset($switchery)) { ?>
          <!-- ============================================================== -->
          <!-- Plugins for this page -->
          <!-- ============================================================== -->
          <script src="<?php echo base_url('assets/plugins/switchery/dist/switchery.min.js') ?>"></script>
          <script src="<?php echo base_url('assets/plugins/select2/dist/js/select2.full.min.js') ?>" type="text/javascript"></script>
          <script src="<?php echo base_url('assets/plugins/bootstrap-select/bootstrap-select.min.js') ?>" type="text/javascript"></script>
          <script src="<?php echo base_url('assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') ?>"></script>
          <script src="<?php echo base_url('assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js') ?>" type="text/javascript"></script>
          <script src="<?php echo base_url('assets/plugins/dff/dff.js') ?>" type="text/javascript"></script>
          <script type="text/javascript" src="<?php echo base_url('assets/plugins/multiselect/js/jquery.multi-select.js') ?>"></script>
          <script>
              jQuery(document).ready(function() {
                  // Switchery
                  var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
                  $('.js-switch').each(function() {
                      new Switchery($(this)[0], $(this).data());
                  });
                  // For select 2
                  $(".select2").select2();
                  $('.selectpicker').selectpicker();
                  //Bootstrap-TouchSpin
                  $(".vertical-spin").TouchSpin({
                      verticalbuttons: true
                  });
                  var vspinTrue = $(".vertical-spin").TouchSpin({
                      verticalbuttons: true
                  });
                  if (vspinTrue) {
                      $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
                  }
                  $("input[name='tch1']").TouchSpin({
                      min: 0,
                      max: 100,
                      step: 0.1,
                      decimals: 2,
                      boostat: 5,
                      maxboostedstep: 10,
                      postfix: '%'
                  });
                  $("input[name='tch2']").TouchSpin({
                      min: -1000000000,
                      max: 1000000000,
                      stepinterval: 50,
                      maxboostedstep: 10000000,
                      prefix: '$'
                  });
                  $("input[name='tch3']").TouchSpin();
                  $("input[name='tch3_22']").TouchSpin({
                      initval: 40
                  });
                  $("input[name='tch5']").TouchSpin({
                      prefix: "pre",
                      postfix: "post"
                  });
                  // For multiselect
                  $('#pre-selected-options').multiSelect();
                  $('#optgroup').multiSelect({
                      selectableOptgroup: true
                  });
                  $('#public-methods').multiSelect();
                  $('#select-all').click(function() {
                      $('#public-methods').multiSelect('select_all');
                      return false;
                  });
                  $('#deselect-all').click(function() {
                      $('#public-methods').multiSelect('deselect_all');
                      return false;
                  });
                  $('#refresh').on('click', function() {
                      $('#public-methods').multiSelect('refresh');
                      return false;
                  });
                  $('#add-option').on('click', function() {
                      $('#public-methods').multiSelect('addOption', {
                          value: 42,
                          text: 'test 42',
                          index: 0
                      });
                      return false;
                  });
                  $(".ajax").select2({
                      ajax: {
                          url: "https://api.github.com/search/repositories",
                          dataType: 'json',
                          delay: 250,
                          data: function(params) {
                              return {
                                  q: params.term, // search term
                                  page: params.page
                              };
                          },
                          processResults: function(data, params) {
                              // parse the results into the format expected by Select2
                              // since we are using custom formatting functions we do not need to
                              // alter the remote JSON data, except to indicate that infinite
                              // scrolling can be used
                              params.page = params.page || 1;
                              return {
                                  results: data.items,
                                  pagination: {
                                      more: (params.page * 30) < data.total_count
                                  }
                              };
                          },
                          cache: true
                      },
                      escapeMarkup: function(markup) {
                          return markup;
                      }, // let our custom formatter work
                      minimumInputLength: 1,
                      //templateResult: formatRepo, // omitted for brevity, see the source of this page
                      //templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
                  });
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