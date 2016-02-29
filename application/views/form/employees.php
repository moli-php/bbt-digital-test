<?php
$first_name = '';
$last_name = '';
$position = '';
$email = '';
$company_id = '';
$button = 'Save';
$heading_title = 'Add Employee';
$ajax_url = base_url() . 'api/add';

if(isset($employee_id) && count($employee)){
	$first_name = $employee->first_name;
	$last_name = $employee->last_name;
	$position = $employee->position;
	$email = $employee->email;
	$company_id = $employee->company_id;
	$button = 'Update';
	$heading_title = 'Update Employee';
	$ajax_url = base_url() . 'api/update/' . $employee_id;
}
?>
<script>
$(function(){

	$('form').delegate('#btn_save', 'click', function(){
		var form = $(this).simpleForm({all_errors:true, get_data:true});
		
		if(form){
			form.action = 'employee';
			var url = 
			$.ajax({
				url : '<?php echo $ajax_url; ?>',
				type : 'post',
				dataType : 'json',
				data : form,
				success : function(data){
					if(data.response){
						$('#successModal').modal('show');
					}else{
						$('#errorModal').find('#modal_content').text('Internal error.');
						$('#errorModal').modal('show');
					}
				}
			})
		}
	});

	$('#successModal').on('hidden.bs.modal', function () {
  		window.location = '<?php echo base_url(); ?>employees';
	})

});
</script>
<div class="col-md-12">
	<h3 class="col-md-offset-1"><?php echo $heading_title; ?></h3>
</div>

<form role="form" class="form-horizontal">
	<div class="form-group">
		<label class="col-sm-2 control-label" for="name">First name</label>
		<div class="col-sm-4">
			<input type="text" placeholder="Enter first name" class="form-control" id="first_name" name="first_name" value="<?php echo $first_name; ?>" simpleForm-required required-message="First name field is required">
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label" for="name">Last name</label>
		<div class="col-sm-4">
			<input type="text" placeholder="Enter last name" class="form-control" id="last_name" name="last_name" value="<?php echo $last_name; ?>" simpleForm-required required-message="Last name field is required">
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label" for="name">Position</label>
		<div class="col-sm-4">
			<input type="text" placeholder="Enter position" class="form-control" id="position" name="position" value="<?php echo $position; ?>" simpleForm-required required-message="Position field is required">
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-2 control-label" for="email">Email</label>
		<div class="col-sm-4">
			<input type="email" placeholder="Enter email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" simpleForm-required required-message="Email field is required" simpleForm-email email-message="Email is invalid">
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-2 control-label" for="country">Company</label>
		<div class="col-sm-4">
			<select id="country" class="form-control" id="company_id" name="company_id" simpleForm-required>
				
				<?php if(count($company)) { ?>

					<?php foreach($company as $k => $v) { ?>

						<?php if(isset($employee_id)){ ?>
								<?php if($v->id == $company_id){ ?>
									<option selected value="<?php echo $v->id; ?>"><?php echo $v->company; ?></option>
								<?php }else{ ?>
									<option value="<?php echo $v->id; ?>"><?php echo $v->company; ?></option>
								<?php } ?>
						<?php }else{ ?>
									<option value="<?php echo $v->id; ?>"><?php echo $v->company; ?></option>
						<?php } ?>
						
					<?php } ?>

				<?php } ?>
			</select>
		</div>
	</div>
	
	<div class="form-group">
	
		<div class="col-sm-offset-2 col-sm-4 control-label">
			<button id="btn_save" class="btn btn-primary" type="button"><?php echo $button; ?></button>
			<a href="<?php echo base_url(); ?>employees" class="btn btn-default">Cancel</a>
		</div>
	</div>
</form>