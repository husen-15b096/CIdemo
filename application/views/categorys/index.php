<div class="row">
	<div class="col-lg-12">
		<h2>Category Crud
			<div class="pull-right">
				<a href="<?php echo base_url('categoryCreate') ?>" class="btn btn-primary">Create New</a>
			</div>
		</h2>
	</div>
</div>
<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Cat ID</th>
				<th>Category</th>
				<th>Category Logo</th>

				<th colspan="2">Action</th>

			</tr>
		</thead>

		<tbody>
			<?php
			foreach ($data as $d) { ?>
				<tr>
					<td><?php echo $d->cat_id; ?></td>
					<td><?php echo $d->cat_name; ?></td>
					<td><?php echo $d->cat_logo; ?></td>
					<td><a class="btn btn-primary" href="<?php echo base_url(); ?>categoryEdit/<?php echo $d->cat_id; ?>">Edit</a></td>
					<td><a class="btn btn-danger" href="<?php echo base_url(); ?>categoryDelete/<?php echo $d->cat_id;  ?>">Delete</a></td>

					<!-- <td><button href="javascript:void(0);" onclick="confirmDelete(<?php echo $d->cat_id; ?>);" class="btn btn-danger">Delete</button></td> -->
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</div>

<script>
	function confirmDelete(id) {
		var url = "<?php echo base_url(); ?>";
		bootbox.confirm({
			title: "Destroy planet?",
			message: "Do you want to activate the Deathstar now? This cannot be undone.",
			buttons: {
				cancel: {
					label: '<i class="fa fa-times"></i> Cancel'
				},
				confirm: {
					label: '<i class="fa fa-check"></i> Confirm'
				}
			},
			callback: function(result) {
				if (result) {
					console.log('This was logged in the callback: ' + result);
					window.location = url + "categoryDelete/" + id;
				} else {
					console.log('This was logged in the callback: ' + result);
					return false;
				}

			}
		});
	}
</script>
