<div class="col-md-12">
	<h3>Employees Table</h3>
</div>
<div class="col-md-12">
	<div class="col-md-10">

		<table class="table table-bordered table-hover table-condensed">
		<colgroup>
			<col width="5px" />
			<col width="150px" />
			<col width="150px" />
			<col width="150px" />
			<col width="150px" />
			<col width="150px" />
			<col width="150px" />
		</colgroup>
		<thead>
				<tr>
					<th>#</th>
					<th>First name</th>
					<th>Last name</th>
					<th>Position</th>
					<th>Email</th>
					<th>Company</th>
					<th>Date Created</th>
					<th>Action</th>
				</tr>
			</thead>
		<tbody>
		<?php if($company_id) {  ?>

				<?php if(count($employees)) { ?>
						<?php foreach($employees as $k => $v) { $k++; ?>
						<tr>
							<td><?php echo $k; ?></td>
							<td><?php echo $v->first_name ?></td>
							<td><?php echo $v->last_name ?></td>
							<td><?php echo $v->position ?></td>
							<td><?php echo $v->email ?></td>
							<td><a href="<?php echo base_url(); ?>employees/<?php echo $v->company_id; ?>"><?php echo $v->company ?></a></td>
							<td><?php echo $v->date ?></td>
							<td><a href="<?php echo base_url(); ?>employees/<?php echo $v->company_id .'/'. $v->id; ?>">Update</a></td>
						</tr>

						<?php } ?>

				<?php }else{ ?>
					<tr><td colspan="8" align="center">No record found</td></tr>
				<?php } ?>
		

		<?php }else{ ?>

			<?php

			if(count($employees)){
				foreach($employees as $k => $v) {
					$k++;
					?>
					<tr>
						<td><?php echo $k; ?></td>
						<td><?php echo $v->first_name ?></td>
						<td><?php echo $v->last_name ?></td>
						<td><?php echo $v->position ?></td>
						<td><?php echo $v->email ?></td>
						<td><a href="<?php echo base_url(); ?>employees/<?php echo $v->company_id; ?>"><?php echo $v->company ?></a></td>
						<td><?php echo $v->date ?></td>
						<td><a href="<?php echo base_url(); ?>employees/<?php echo $v->company_id .'/'. $v->id; ?>">Update</a></td>
					</tr>
					<?php
				}
			}else{
				echo '<tr><td colspan="8" align="center">No record found</td></tr>';
			}
			?>
		</tbody>
		</table>
		<?php } ?>
</div>
</div>