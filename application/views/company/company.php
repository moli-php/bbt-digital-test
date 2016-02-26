<?php 
$heading_title = 'Company Table';
if($id) {
$heading_title = 'Company Info';
}

?>
<div class="col-md-12">
	<h3><?php echo $heading_title; ?></h3>
</div>
<div class="col-md-12">
	<div class="col-md-6">
		<?php if($id) {  ?>

			<?php if(count($company)) { ?>

			<div class="jumbotron">
				<h1><?php echo $company->company; ?></h1>
				<p><?php echo $company->date; ?></p>
				<p><a class="btn btn-success" href="<?php echo base_url(); ?>">Go Back</a></p>
			</div>

			<?php }else{ ?>

			<div class="jumbotron">
				<h1>No record found.</h1>
				<p><a class="btn btn-success" href="<?php echo base_url(); ?>">Go Back</a></p>
			</div>

			<?php } ?>

		<?php }else{ ?>
		<table class="table table-bordered table-hover table-condensed">
		<colgroup>
			<col width="5px" />
			<col width="250px" />
			<col width="250px" />
		</colgroup>
		<thead>
				<tr>
					<th>#</th>
					<th>Company</th>
					<th>Date Created</th>

				</tr>
			</thead>
		<tbody>
			<?php

			if(count($company)){
				foreach($company as $k => $v) {
					$k++;
					?>
					<tr>
						<td><?php echo $k; ?></td>
						<td><a href="<?php echo base_url(); ?>company/<?php echo $v->id; ?>"><?php echo $v->company ?></a></td>
						<td><a href="<?php echo base_url(); ?>company/<?php echo $v->id; ?>"><?php echo $v->date ?></a></td>
					</tr>
					<?php
				}
			}else{
				echo '<tr><td colspan="3" align="center">No record found</td></tr>';
			}
			?>
		</tbody>
		</table>
		<?php } ?>
</div>
</div>