<script>
$(function(){

	$('#btn_save').click(function(){
		var form = $(this).simpleForm({all_errors:true});
		var company = $.trim($('#company').val());
		if(form){
			$.ajax({
				url : '<?php echo base_url(); ?>api/add',
				type : 'post',
				dataType : 'json',
				data : {company:company,action:'company'},
				success : function(data){
					if(data.response){
						$('#successModal').modal('show');
					}else{
						$('#errorModal').find('#modal_content').text('Company already taken.');
						$('#errorModal').modal('show');
					}
				}
			})
		}
	});

	$('#successModal').on('hidden.bs.modal', function () {
  		$('#company').val("");
	})

});
</script>
<div class="col-md-12">
	<h3 class="col-md-offset-1">Add Company</h3>
</div>
<form role="form" class="form-horizontal">
	<div class="form-group">
		<label class="col-sm-2 control-label" for="name">Company</label>
		<div class="col-sm-4">
			<input type="text" placeholder="Enter company name" class="form-control" id="company" simpleForm-required required-message="Company field is required">
		</div>
	</div>

	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-4 control-label">
			<button type="button" id="btn_save" class="btn btn-primary" type="submit">Save</button>
			<a href="<?php echo base_url(); ?>" class="btn btn-default">Cancel</a>
		</div>
	</div>
</form>