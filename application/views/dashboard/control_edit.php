		<div class="row">
		<?php		
		if(isset($errors)){
			foreach ($errors as $error) {
			echo alert($error, 'danger');
			}		
		}
	
		?>

				<div class="col-sm-9">
					<div class="card-box">
					<form method="post" action="<?php echo base_url('gamecontrol/update_control/'.$this->uri->segment(4,0).''); ?>" enctype="multipart/form-data" role="form">
						<div class="form-group m-b-20">
							<label for="title">Control Title</label>
							<input type="text" class="form-control" name="control_title" placeholder="Game Control" value="<?php if(isset($control->control_name)) echo $control->control_name; ?>">
						</div>
						<div class="form-group m-b-20">
							<label for="url">Control Image</label> 
							<input type="file" class="form-control" name="control_image" placeholder="Control Image" >
						</div>					
						<div class="form-group text-right m-b-0">
							<button class="btn btn-inverse waves-effect waves-light" type="submit"><?php echo $this->lang->line('submit'); ?></button>
							<button type="reset" class="btn btn-default waves-effect waves-light m-l-5"><?php echo $this->lang->line('cancel'); ?></button>
						</div>
					</form>
				</div> <!-- End col -->				
			</div>
			<div class="col-sm-3">
			<div class="col-sm-12">
				<h3>Previouse Image</h3>
			</div>
					<img src="<?php echo base_url('uploads/controls/'.$control->image.'')?>" width="100px" />
				</div>
			</div>