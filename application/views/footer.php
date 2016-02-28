</div> <!-- container -->

<footer class="footer">
  <div class="container">
    <p class="text-muted">BBT Digital Test 2016, All Rigths Reserved.</p>
  </div>
</footer>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?php echo base_url(); ?>assets/js/ie10-viewport-bug-workaround.js"></script>

 <!-- Modals -->
<div id="successModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header modal-header-success">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Success</h4>
      </div>
      <div class="modal-body">
        <p id="modal_content">Data has been saved.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="close_btn">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="errorModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header modal-header-danger">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Error</h4>
      </div>
      <div class="modal-body">
        <p id="modal_content">Company already taken.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="close_btn">Close</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>