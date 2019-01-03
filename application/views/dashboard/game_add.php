<div class="row">
	<div class="col-sm-12">

		<?php
		if(isset($msg)) echo $msg;
		if(isset($error)) echo alert($error, 'danger');
		?>

		<div class="card-box">
			<div class="row">

				<div class="col-sm-9">
					<form method="post" action="<?php echo current_url().'/'; ?>" enctype="multipart/form-data" role="form">
						<div class="form-group m-b-20">
							<label for="title"><?php echo $this->lang->line('gameTitle'); ?></label>
							<input type="text" class="form-control" name="title" placeholder="<?php echo $this->lang->line('gameTitle'); ?>" value="<?php if(isset($title_game)) echo $title_game; ?>">
						</div>
						<div class="form-group m-b-20">
							<label for="url"><?php echo $this->lang->line('gameUrl'); ?></label> <span class="text-muted">(<?php echo $this->lang->line('optional'); ?>)</span>
							<input type="text" class="form-control" name="url" placeholder="<?php echo $this->lang->line('gameUrl'); ?>" value="<?php if(isset($url_game)) echo $url_game; ?>">
						</div>
						<div class="form-group m-b-20">
							<label for="description"><?php echo $this->lang->line('gameDescription'); ?></label>
							<textarea type="text" class="form-control" name="description" placeholder="<?php echo $this->lang->line('gameDescription'); ?>" rows="7"><?php if(isset($description_game)) echo $description_game; ?></textarea>
						</div>
						<div class="form-group m-b-20">
							<label for="category"><?php echo $this->lang->line('gameCategory'); ?></label>
							<select class="form-control select2" name="category"> <?php if(isset($getCategories)) echo $getCategories; ?> </select>
						</div>
						<div class="form-group m-b-20">
							<label for="keywords"><?php echo $this->lang->line('gameKeywords'); ?></label>
							<select class="select2 select2-multiple select2-hidden-accessible" multiple="" data-placeholder="<?php echo $this->lang->line('choose'); ?> ..." tabindex="-1" aria-hidden="true" name="keywords[]">
								<?php if(isset($getKeywords)) echo $getKeywords; ?>
							</select>
						</div>
						<div class="form-group m-b-20">
							<label for="type"><?php echo $this->lang->line('gameType'); ?></label>
							<select class="form-control selectpicker show-tick" data-style="btn-white" name="type">
								<option value="1" <?php if(isset($type_game) && $type_game === '1') echo 'selected'; ?>><?php echo $this->lang->line('hostedFlashGame'); ?></option>
								<option value="0" <?php if(isset($type_game) && $type_game === '0') echo 'selected'; ?>><?php echo $this->lang->line('embedHtml5Game'); ?></option>
								<option value="2" <?php if(isset($type_game) && $type_game === '2') echo 'selected'; ?>><?php echo $this->lang->line('hostedRomGame'); ?></option>
							</select>						
						</div>
						<div id="embed" class="form-group m-b-20" <?php if(isset($type_game) && $type_game != 0) echo 'style="display:none;' ?>>
							<label for="embed_url"><?php echo $this->lang->line('externalGameUrl'); ?></label> <span class="text-muted">(embed)</span>
							<input type="text" class="form-control" name="embed" placeholder="External game URL" value="<?php if(isset($embed_url)) echo $embed_url; ?>">
						</div>
						<div id="console" class="form-group m-b-20" <?php if(isset($type_game) && $type_game != 2) echo 'style="display:none;' ?>>
							<label for="console"><?php echo $this->lang->line('console'); ?></label>
							<select class="form-control selectpicker show-tick" data-style="btn-white" name="console">
								<option value="gb" <?php if(isset($console) && $console === 'gb') echo 'selected'; ?>>Gameboy</option>
								<option value="gba" <?php if(isset($console) && $console === 'gba') echo 'selected'; ?>>Gameboy advance</option>
								<option value="nes" <?php if(isset($console) && $console === 'nes') echo 'selected'; ?>>Nes</option>
								<option value="snes" <?php if(isset($console) && $console === 'snes') echo 'selected'; ?>>SNes</option>
								<option value="sega" <?php if(isset($console) && $console === 'sega') echo 'selected'; ?>>Sega</option>
							</select>
						</div>
						<div class="form-group m-b-20">
							<label for="status"><?php echo $this->lang->line('gameStatus'); ?></label>
							<select class="form-control selectpicker show-tick" data-style="btn-white" name="status">
								<option value="1" <?php if($status_game === '1') echo 'selected'; ?>><?php echo $this->lang->line('active'); ?></option>
								<option value="0" <?php if($status_game === '0') echo 'selected'; ?>><?php echo $this->lang->line('inactive'); ?></option>
							</select>
						</div>
						<div class="form-group m-b-20">
							<label for="video_url"><?php echo $this->lang->line('videoURL'); ?></label> <span class="text-muted">(embed)</span>
							<input type="url" class="form-control" name="video_url" placeholder="Game Video URL" value="<?php if(isset($video_url)) echo $video_url; ?>">
							<input type="file" class="form-control" name="game_video">
						</div>
						<div class="form-group m-b-20">
							<label for="display_home"><?php echo $this->lang->line('displayHome'); ?></label>
							<br/>
							<input type="checkbox" <?php if($display_home==1){ echo "checked";} ?> name="display_home">
						</div>
						<div class="form-group m-b-20">
							<label for="video_url"><?php echo $this->lang->line('home_order'); ?></label>
							<input type="text" class="form-control" name="home_order" placeholder="Enter Number Display Place On Homepage" value="<?php if(isset($home_order)) echo $home_order; ?>">
						</div>
						<div class="form-group m-b-20">
							<label for="is_feature"><?php echo $this->lang->line('isFeature'); ?></label>
							<br/>
							<input type="checkbox" <?php if($is_feature==1){ echo "checked";} ?> name="is_feature">
						</div>
						<div class="form-group m-b-20">
							<label for="video_url"><?php echo $this->lang->line('feature_order'); ?></label>
							<input type="text" class="form-control" name="feature_order" placeholder="Enter Number Display Place On Homepage" value="<?php if(isset($feature_order)) echo $feature_order; ?>">
						</div>
					    <div class="form-group m-b-20">
							<label for="keywords"><?php echo $this->lang->line('game_controls'); ?></label>
							<select class="select2 select2-multiple select2-hidden-accessible" multiple="" data-placeholder="<?php echo $this->lang->line('choose'); ?> ..." tabindex="-1" aria-hidden="true" name="controls[]">
								<?php if(isset($controls))
								foreach ($controls as $control) {
								$select = (in_array($control->id,explode(",",$gControls))) ? 'selected' : '';
								
								echo '<option value="'.$control->id.'" class="gb-primary"'.$select.'>'.$control->control_name.'</option>';
								}
								; ?>
							</select>
						</div>					
				</div> <!-- End col -->

				<?php if($this->uri->segment(3, 0) === 'add') { ?>
				<div class="col-sm-3">				
						<div class="form-group m-b-20">
							<label class="control-label"><?php echo $this->lang->line('gameCover'); ?></label> <span class="text-muted">(.gif, .jpg, .png)</span>
							<input type="file" name="userImage" class="filestyle" data-buttontext="Select file" data-buttonname="btn-inverse" data-placeholder="<?php if(isset($image)) echo $image; ?>">
							<input type="hidden" name="hiddenImage">
						</div>			
						<div class="form-group m-b-20" id="userFile" >
							<label class="control-label"><?php echo $this->lang->line('gameFile'); ?></label> <span class="text-muted">(<?php echo (($this->config->item('roms')) ? '.nes, .smc, .gen, .smd, .gb, .gbc, .gba' : '.swf'); ?>)</span>
							<input type="file" name="userFile" class="filestyle" data-buttontext="Select file"  placeholder="<?php if(isset($file)) echo $file; ?>">
							<!-- <input type="hidden" name="hiddenFile"> -->
						</div>
							<div class="form-group text-right m-b-0">
							<button class="btn btn-inverse waves-effect waves-light" type="submit"><?php echo $this->lang->line('submit'); ?></button>
							<button type="reset" class="btn btn-default waves-effect waves-light m-l-5"><?php echo $this->lang->line('cancel'); ?></button>
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
		    console.log(str);		    
		    if(str == 1) {
		    	$("#embed").hide();
		    	$("#console").hide();
		    	$("#userFile").show();
		    	$("#gameCover").css("display","none");
		    } else if(str == 2) {
		    	$("#embed").hide();
		    	$("#console").show();
		    	$("#userFile").show();
		    	$("#gameCover").css("display","none");
		    } else {
		    	$("#embed").show();
		    	$("#gameCover").css("display","block");
		    	$("#console").hide();
		    	$("#userFile").hide();
		    }
		});
	};
</script>
