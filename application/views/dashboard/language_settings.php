<div class="row">
	<div class="col-sm-12">

		<?php if(isset($msg)) echo $msg; ?>

		<div class="card-box">

			<div class="row">					
				<div class="col-sm-6">			
					<form class="form" role="form" method="post" action="<?php echo base_url('settings/change_lang'); ?>">					
						<table>
					    <tr><th colspan="2"><h3>Select Language</h3></th></tr>
						<?php
						foreach($lang as $language){
							?>
								<tr>
									<td>
									<div class="form-group">
										<label for="language"><?php echo ucfirst($language->lang_name); ?></label>							
									</div>
								    </td>
								    <td>
								    	<div class="form-group">
								    	<input type="checkbox"  name="language[<?php echo $language->lang_id ?>]" <?php if($language->lang_flag==1){ echo "checked";} ?> value="<?php echo ucfirst($language->lang_name); ?>" >
								        </div>
								    </td>
								</tr>
							<?php
						}
						?>										
						</table>						

						<div class="form-group text-right m-b-0">
							<button class="btn btn-inverse waves-effect waves-light" type="submit"><?php echo $this->lang->line('submit'); ?></button>
							<button type="reset" class="btn btn-default waves-effect waves-light m-l-5"><?php echo $this->lang->line('cancel'); ?></button>
						</div>
					</form>
				</div> <!-- End col -->
			<div class="col-sm-6">
			</div>

			</div> <!-- End row -->

		</div> <!-- End card-box -->

	</div> <!-- End col -->
</div> <!-- End row -->
