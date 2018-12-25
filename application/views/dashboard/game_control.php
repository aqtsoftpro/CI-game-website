<div class="row">
	<div class="col-sm-12">

		<?php
		if(isset($this->session->msg)) echo $this->session->msg;
		if(isset($error)) echo alert($error, 'danger');
		?>

		<div class="card-box">
		<div class="row">	
		<div class="card-box table-responsive">
			<a href="<?php echo site_url('dashboard/gamecontrol/add/'); ?>" class="btn btn-sm btn-primary waves-effect waves-light pull-right">New Control<?php //echo $this->lang->line('newGame'); ?></a>
			<table id="datatable-colvid" class="table table-striped table-bordered">
				<thead>
					<tr>
					<th class="text-center">ID<?php //echo $this->lang->line('id'); ?></th>
					<th class="text-center">Control Name<?php //echo $this->lang->line('game'); ?></th>
					<th class="text-center">Image<?php //echo $this->lang->line('category'); ?></th>
					<th class="text-center">Action<?php //echo $this->lang->line('played'); ?></th>
					</tr>
				</thead>

				<tbody>
					<?php if(isset($controls)) echo $controls; ?>
				</tbody>
			</table>
		</div>



































			<!-----------------------------Loading Controls with pagination -------------->	

				<?php if($this->uri->segment(3, 0) === 'edit') { ?>
				<div class="col-sm-3">
					<form method="post" action="<?php echo current_url().'/'; ?>" role="form" enctype="multipart/form-data" accept-charset="utf-8">
						<div class="form-group m-b-20">
							<label class="control-label"><?php echo $this->lang->line('gameCover'); ?></label> <span class="text-muted">(.gif, .jpg, .png)</span>
							<input type="file" name="userImage" class="filestyle" data-buttontext="Select file" data-buttonname="btn-inverse" data-placeholder="<?php if(isset($image)) echo $image; ?>">
							<input type="hidden" name="hiddenImage">
						</div>
						<div class="form-group text-right m-b-0">
							<button class="btn btn-inverse waves-effect waves-light" type="submit"><?php echo $this->lang->line('submit'); ?></button>
						</div>
					</form>
					<form id="userFile" method="post" action="<?php echo current_url().'/'; ?>" role="form" enctype="multipart/form-data" accept-charset="utf-8" <?php if($type_game == 0) echo 'style="display:none;"' ?>>
						<div class="form-group m-b-20">
							<label class="control-label"><?php echo $this->lang->line('gameFile'); ?></label> <span class="text-muted">(<?php echo (($this->config->item('roms')) ? '.nes, .smc, .gen, .smd, .gb, .gbc, .gba' : '.swf'); ?>)</span>
							<input type="file" name="userFile" class="filestyle" data-buttontext="Select file" data-buttonname="btn-inverse" data-placeholder="<?php if(isset($file)) echo $file; ?>">
							<input type="hidden" name="hiddenFile">
						</div>
						<div class="form-group text-right m-b-0">
							<button class="btn btn-inverse waves-effect waves-light" type="submit"><?php echo $this->lang->line('submit'); ?></button>
						</div>
					</form>
				</div> <!-- End col -->
				<?php } ?>

			</div> <!-- End row -->
		</div> <!-- End card-box -->

	</div> <!-- End col -->
</div> <!-- End row -->

<script>
	window.onload = function() {
		$("select[name='type']").change(function() {
		    var str = $(this).val();
		    if(str == 1) {
		    	$("#embed").hide();
		    	$("#console").hide();
		    	$("#userFile").show();
		    } else if(str == 2) {
		    	$("#embed").hide();
		    	$("#console").show();
		    	$("#userFile").show();
		    } else {
		    	$("#embed").show();
		    	$("#console").hide();
		    	$("#userFile").hide();
		    }
		});
	};
</script>
